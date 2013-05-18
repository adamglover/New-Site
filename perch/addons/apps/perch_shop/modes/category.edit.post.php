<?php

    
    
    # Side panel
    echo $HTML->side_panel_start();
    echo $HTML->para('Add a new shop category here.');
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 
    include('_subnav.php');

    echo $HTML->heading1('Editing a Category');
    
    if ($message) echo $message;
    
    echo $HTML->heading2('Category details');
        
    
    echo $Form->form_start();
    
        echo $Form->text_field('categoryTitle', 'Title',isset($details['categoryTitle'])?$details['categoryTitle']:false);
         if(is_object($Category)) {
	    	echo $Form->text_field('categorySlug', 'URL Slug',isset($details['categorySlug'])?$details['categorySlug']:false);
	    }
		echo $Form->hidden('categoryID', isset($details['categoryID'])?$details['categoryID']:false);
        
        

        echo $Form->submit_field('btnSubmit', 'Save', $API->app_path().'/categories/');

    
    echo $Form->form_end();
    
    echo $HTML->main_panel_end();

?>