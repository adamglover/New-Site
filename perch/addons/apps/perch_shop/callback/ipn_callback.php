<?php
/* this script is called by PayPal after payment has been made. Currently all we do is update the product quantity so you have a basic level of stock control.
 * PayPal sends the data back as a POST
 * 
 * */

$log = true;

$success = false;

if ($log) {
	$fp = fopen('ipn.'.date('Y-m-d-H-i-s').'.txt', 'w');
	fwrite($fp, 'start:'."\n");
	$line = str_repeat('-', 72)."\n";
	fwrite($fp, $line.'POST:'."\n".print_r($_POST, true)."\n".$line);
}

// get post
function get_post($key) {
	if (isset($_POST[$key])) return $_POST[$key];
	return false;
}


// check we have some data

if($_POST) {

	include(dirname(__FILE__) . '/../../../../config/config.php');
	include(PERCH_CORE . '/inc/loader.php');
	$Perch  = PerchAdmin::fetch();

    
    if ($log) fwrite($fp, 'have POST:'."\n");
    $API  = new PerchAPI(1.0, 'perch_shop');
    include('../PerchShop_Cache.class.php');
    include('../PerchShop_Products.class.php');
    include('../PerchShop_Product.class.php');
    include('../PerchShop_Categories.class.php');
    include('../PerchShop_Category.class.php');
    include('../PerchShop_Orders.class.php');
    include('../PerchShop_Order.class.php');
    
    $Products = new PerchShop_Products();
    
    $raw_post_data = file_get_contents('php://input');
    //log to db
    $ipn_array = array(
    	'logTransaction'=>$_POST['txn_id'],
    	'logDateTime'=>date('Y-m-d h:i:s'),
    	'logData'=>$raw_post_data		
    );
    
    $Products->log_ipn($ipn_array);
    
	
    //send response back to PayPal
    
    $raw_post_array = explode('&', $raw_post_data);
    $myPost = array();
    foreach ($raw_post_array as $keyval) {
    	$keyval = explode ('=', $keyval);
    	if (count($keyval) == 2)
    		$myPost[$keyval[0]] = urldecode($keyval[1]);
    }
    // read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    if(function_exists('get_magic_quotes_gpc')) {
    	$get_magic_quotes_exists = true;
    }
    foreach ($myPost as $key => $value) {
    	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
    		$value = urlencode(stripslashes($value));
    	} else {
    		$value = urlencode($value);
    	}
    	$req .= "&$key=$value";
    }
    
    
    // STEP 2: Post IPN data back to paypal to validate
    
    $ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    
    // In wamp like environments that do not come bundled with root authority certificates,
    // please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
    // of the certificate as shown below.
    // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
    if( !($res = curl_exec($ch)) ) {
    	error_log("Got " . curl_error($ch) . " when processing IPN data");
    	curl_close($ch);
    	exit;
    }
    curl_close($ch);
    
    
    // STEP 3: Inspect IPN validation result and act accordingly
    
    if (strcmp($res, "VERIFIED") == 0) {
    	if ($log)  fwrite($fp, 'verified'."\n");
    	$Products->update_log($_POST['txn_id'],$res);
	    // get post data
		
	    //basic details of order
	    $ipn    = array();
	    $ipn['payment_type']   = get_post('payment_type');
	    $ipn['payment_date']   = get_post('payment_date');
	    $ipn['payment_status'] = get_post('payment_status');
	    $ipn['payer_email']    = get_post('payer_email');
	    $ipn['txn_type']       = get_post('txn_type');
	    $ipn['mc_gross']       = get_post('mc_gross');
	    $ipn['mc_fee']         = get_post('mc_fee');
		
		//check for completed payments.
	    if ($ipn['payment_status'] == 'Completed') {
			
	    	$products = array();
	    	foreach($_POST as $key=>$value) {
	    		if (substr($key, 0, 11)=='item_number') {
	    			$index = str_replace('item_number','',$key);
	    			$products[] = array(
	    				'productName' => get_post('item_name'.$index),
	    				'productCode' => $value,
	    				'qty' => (int) get_post('quantity'.$index)
	    			);
	    		}
	    	}

	    	if ($log) fwrite($fp, $line.'Current products array:'."\n".print_r($products, true)."\n".$line);
	    	
	    	if ($log) fwrite($fp, 'number of products: '.PerchUtil::count($products)."\n");
					
			//update the Perch product tables.
			if(PerchUtil::count($products)>0) {
				foreach($products as $product) {
											
					$Product = $Products->find_by_code($product['productCode']);
						
										
					if (is_object($Product)) {
						if ($log) fwrite($fp, 'product: '.$product['productCode']."\n");
						$data = array();
					
					
						$data['productCount'] = (int)$Product->productCount() - (int)$product['qty'];
						$data['productSlug'] = $Product->productSlug();
						if ($log) fwrite($fp, 'new count: '.$data['productCount']."\n");
						if ($log) fwrite($fp, $line.print_r($data, true)."\n".$line);
					
						$result = $Product->update($data,false,false);
						$success = true;
					}else{
						if ($log) fwrite($fp, 'Something went wrong. Could not find that product. '.$product['productCode']."\n");
						if ($log) fwrite($fp, print_r($product, true)."\n");
						
					}
				}


				$order = array();
				$order['orderTxnID'] 			= get_post('txn_id');
				$order['orderDate'] 			= date('Y-m-d H:i:s', strtotime(get_post('payment_date')));
				$order['orderPayerEmail'] 		= get_post('payer_email');
				$order['orderPayerID'] 			= get_post('payer_id');
				$order['orderPaymentStatus'] 	= get_post('payment_status');
				$order['orderCurrency'] 		= get_post('mc_currency');
				$order['orderFee'] 				= get_post('mc_fee');
				$order['orderTax'] 				= get_post('tax');
				$order['orderShipping'] 		= get_post('mc_shipping');
				$order['orderTotal'] 			= get_post('mc_gross');
				$order['orderTotalItems'] 		= get_post('num_cart_items');
				$order['orderFirstName'] 		= get_post('first_name');
				$order['orderLastName'] 		= get_post('last_name');
				$order['orderAddressName'] 		= get_post('address_name');
				$order['orderAddressStreet'] 	= get_post('address_street');
				$order['orderAddressCity'] 		= get_post('address_city');
				$order['orderAddressState'] 	= get_post('address_state');
				$order['orderAddressCountry'] 	= get_post('address_country');
				$order['orderAddressZIP'] 		= get_post('address_zip');
				$order['orderItems'] 			= PerchUtil::json_safe_encode($products);
				$order['orderStatus'] 			= 'New';

				$Orders = new PerchShop_Orders;

				$Order = $Orders->get_one_by('orderTxnID', $order['orderTxnID']);

				if (is_object($Order)) {
					$Order->update($order);
				}else{
					$Order = $Orders->create($order);	
				}

				



			}else{
				if ($log) error_log("Shop app: No products in array");
				if ($log) fwrite($fp, "Shop app: No products in array"."\n");
			}		
			
					
		}
	}else{
		echo 'Not verified. ';
		if ($log) fwrite($fp, "Not verified."."\n");
	}
	 


	
	
}else{
	echo 'No post data sent.';
	if ($log) fwrite($fp, "No post data sent."."\n");
}


if ($success) {
	echo 'success'; // like a boss
	if ($log) fwrite($fp, $line."success"."\n".$line);
}


if ($log) fclose($fp);
?>