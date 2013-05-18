<?php
    
    $Products = new PerchShop_Products($API);
    $message = false;
    $Categories = new PerchShop_Categories($API);
    $categories = $Categories->all();

    $HTML = $API->get('HTML');

    if (isset($_GET['id']) && $_GET['id']!='') {
        $productID = (int) $_GET['id'];    
        $Product = $Products->find($productID, true);
        $details = $Product->to_array();
        
        $heading1 = 'Editing a Product';
        $heading2 = 'Edit Product';
        
    }else{
        $Product = false;
        $productID = false;
        $details = array();
        
        $heading1 = 'Creating a Product';
        $heading2 = 'Add Product';
    }

    $Template   = $API->get('Template');
    $Template->set('shop/product.html', 'shop');


    $result = false;

    $Form = $API->get('Form');

    $Form->require_field('productTitle', 'Required');
    $Form->require_field('productCode', 'Required');
    $Form->require_field('productDescRaw', 'Required');
    $Form->require_field('productCount', 'Required');
    $Form->require_field('productPrice', 'Required');
    if(is_object($Product)) {
    	$Form->require_field('productSlug', 'Required');
    }
    
    $Form->set_required_fields_from_template($Template);

    if ($Form->submitted()) {
    	        
        $postvars = array('productID','productTitle','productDescRaw','cat_ids','productCount','productStatus','productPrice','productCode');
	    if(is_object($Product)) {
	    	$postvars[] = 'productSlug';
	    }
		
    	$data = $Form->receive($postvars);
    	
    	$dynamic_fields = $Form->receive_from_template_fields($Template, $details);
    	$data['productDynamicFields'] = PerchUtil::json_safe_encode($dynamic_fields);
    	
    	if (is_object($Product)) {
    	    
    		//deal with options. A new option first.
    	    if(isset($_POST['optionKey']) && isset($_POST['optionValues'])) {
    	    	$key = $_POST['optionKey'];
    	    	$value = $_POST['optionValues'];
    	    	
    	    	$Product->add_option($key,$value);
    	    }
    		
    		//loop through options, update. If checked, delete
    		$options = $Product->get_product_options();
    		if(is_array($options)) {
    			foreach($options as $row) {
    				//are we deleting?
    				if(isset($_POST['delete_'.$row['optionID']])) {
    					$Product->delete_option($row['optionID']);
    				}
    				
    				if(isset($_POST['optionKey_'.$row['optionID']]) && isset($_POST['optionValues_'.$row['optionID']])) {
		    	    	$key = $_POST['optionKey_'.$row['optionID']];
		    	    	$value = $_POST['optionValues_'.$row['optionID']];
		    	    	
		    	    	$Product->update_option($row['optionID'],$key,$value);
		    	    }
    			}
    		}
    		
    		$result = $Product->update($data);
    	    PerchUtil::redirect($API->app_path() .'/edit/?id='.$Product->id().'&updated=1');
    	    
    	    
    	}else{
    	    if (isset($data['productID'])) unset($data['productID']);
    	    $new_product = $Products->create($data);
    	    if ($new_product) {
    	        $result = true;
    	        PerchUtil::redirect($API->app_path() .'/edit/?id='.$new_product->id().'&created=1');
    	    }else{
    	        $message = $HTML->failure_message('Sorry, that product could not be updated.');
    	    }
    	}
    	
    	
        if ($result) {
            $message = $HTML->success_message('Your product has been successfully updated. Return to %sproduct listing%s', '<a href="'.$API->app_path() .'">', '</a>');  
        }else{
            $message = $HTML->failure_message('Sorry, that product could not be updated.');
        }
        
        if (is_object($Product)) {
            $details = $Product->to_array();
        }else{
            $details = array();
        }
        
    }
    
    if (isset($_GET['created']) && !$message) {
        $message = $HTML->success_message('Your product has been successfully created. Return to %sproduct listing%s', '<a href="'.$API->app_path() .'">', '</a>'); 
    }
    
    if (isset($_GET['updated']) && !$message) {
        $message = $HTML->success_message('Your product has been successfully updated. Return to %sproduct listing%s', '<a href="'.$API->app_path() .'">', '</a>'); 
    }
?>
