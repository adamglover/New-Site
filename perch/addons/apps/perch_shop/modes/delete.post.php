<?php
   
    
    # Side panel
    echo $HTML->side_panel_start();
    echo $HTML->heading3('Delete Product');
    echo $HTML->para('Delete a product here.');
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 

    include('_subnav.php');
    
    echo $HTML->heading1('Deleting a Product');


    echo $Form->form_start();
    
    if ($message) {
        echo $message;
    }else{
        echo $HTML->warning_message('Are you sure you wish to delete the product %s?', $details['productTitle']);
        echo $Form->form_start();
        echo $Form->hidden('productID', $details['productID']);
		echo $Form->submit_field('btnSubmit', 'Delete', $API->app_path());


        echo $Form->form_end();
    }
    
    echo $HTML->main_panel_end();

?>