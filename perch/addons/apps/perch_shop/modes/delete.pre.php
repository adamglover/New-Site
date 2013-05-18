<?php
    
    $Products = new PerchShop_Products($API);

    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
	$Form->require_field('productID', 'Required');
	
	$message = false;
	
	if (isset($_GET['id']) && $_GET['id']!='') {
	    $Product = $Products->find($_GET['id'], true);
	}else{
	    PerchUtil::redirect($API->app_path());
	}
	

    if ($Form->submitted()) {
    	$postvars = array('productID');
		
    	$data = $Form->receive($postvars);
    	
    	$Product = $Products->find($data['productID']);
    	
    	if (is_object($Product)) {
    	    $Product->delete();
            PerchUtil::redirect($API->app_path());
        }else{
            $message = $HTML->failure_message('Sorry, that product could not be deleted.');
        }
    }

    
    
    $details = $Product->to_array();



?>