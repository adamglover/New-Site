<?php
    
    $HTML = $API->get('HTML');
        
    $Orders = new PerchShop_Orders($API);
    
    $Order = $Orders->find($_GET['id']);

    $message = false;

    $Form = $API->get('Form', 'dispatch');

    if ($Form->submitted()) {
    	$Order->mark_as_dispatched();
    	$message = $HTML->success_message('The order has been marked as dispatched.');
    }

?>