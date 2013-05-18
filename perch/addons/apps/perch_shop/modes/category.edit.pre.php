<?php
    
    $Categories = new PerchShop_Categories($API);

    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
	
    $message = false;
    
    
    if (isset($_GET['id']) && $_GET['id']!='') {
        $categoryID = (int) $_GET['id'];    
        $Category = $Categories->find($categoryID);
        $details = $Category->to_array();
    }else{
    	$Category = false;
        $categoryID = false;
        $details = array();
    }
    
    
    

    $Form->require_field('categoryTitle', 'Required');
	
    if(is_object($Category)) {
    	$Form->require_field('categorySlug', 'Required');
    }
    
    if ($Form->submitted()) {
		$postvars = array('categoryID','categoryTitle');
	    if(is_object($Category)) {
	    	$postvars[] = 'categorySlug';
	    }
		
    	$data = $Form->receive($postvars);
    	
    	if (is_object($Category)) {
    	
        	$result = $Category->update($data);
        	PerchUtil::redirect($API->app_path() .'/categories/edit/?id='.$Category->id().'&updated=1');
            
        }else{
	        
	    	if (isset($data['categoryID'])) unset($data['categoryID']);
	    	$new_category = $Categories->create($data);
	    	
	        if (is_object($new_category)) {
	            PerchUtil::redirect($API->app_path() .'/categories/edit/?id='.$new_category->id().'&created=1');
	        }else{
	            $message = $HTML->failure_message('Sorry, that category could not be created.');
	        }
        }
        
    	if ($result) {
            $message = $HTML->success_message('Your category has been successfully updated. Return to %scategory listing%s', '<a href="'.$API->app_path() .'">', '</a>');  
        }else{
            $message = $HTML->failure_message('Sorry, that category could not be updated.');
        }
        
        if (is_object($Category)) {
            $details = $Category->to_array();
        }else{
            $details = array();
        }
    }

    if (isset($_GET['created']) && !$message) {
        $message = $HTML->success_message('Your category has been successfully created. Return to %scategory listing%s', '<a href="'.$API->app_path() .'/categories">', '</a>');
    }
    
    if (isset($_GET['updated']) && !$message) {
        $message = $HTML->success_message('Your category has been successfully updated. Return to %scategory listing%s', '<a href="'.$API->app_path() .'/categories">', '</a>'); 
    }

?>