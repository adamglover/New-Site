<?php
    
    $GalleryAlbums = new PerchGallery_Albums($API);
    $Images = new PerchGallery_Images($API);
    $PerchGallery_ImageVersions = new PerchGallery_ImageVersions($API);
    $message = false;
    $new_image = false;

    $HTML = $API->get('HTML');

    if (isset($_GET['album_id']) && $_GET['album_id']!='') {
        $albumID = (int) $_GET['album_id'];    
    }
    
    if (isset($_GET['id']) && $_GET['id']!='') {
        $imageID = (int) $_GET['id'];    
        $Image = $Images->find($imageID);
        $details = $Image->to_array();
        
        $heading1 = 'Editing an Image';
        $heading2 = 'Edit Image';
        
    }else{
        $Image = false;
        $imageID = false;
        $details = array();
        $details['albumID'] = $albumID;
        
        $heading1 = 'Adding a New Image';
        $heading2 = 'Add image';
    }

    $Template   = $API->get('Template');
    $Template->set('gallery/image.html', 'gallery');


    $result = false;

    $Form = $API->get('Form');

    $Form->require_field('imageAlt', 'Required');
    
    $Form->set_required_fields_from_template($Template);

    if ($Form->submitted()) {
    	        
        $postvars = array('albumID','imageAlt','imageOrder');
		
    	$data = $Form->receive($postvars);
    	
    	$dynamic_fields = $Form->receive_from_template_fields($Template, $details);
    	$data['imageDynamicFields'] = PerchUtil::json_safe_encode($dynamic_fields);
    	
    	if (is_object($Image)) {
    	    $result = $Image->update($data);
    	}else{
    	    if (isset($data['imageID'])) unset($data['imageID']);
    	    $result = $Images->create($data);
    	    if ($result) {  
    	        $new_image = true;
    	        $Image = $result;
    	    }else {
    	    	$message = $HTML->failure_message('Sorry, that image could not be updated.');
    	    }
    	}
    	
    	
        if ($result) {
        	
            $image_folder_writable = is_writable(PERCH_RESFILEPATH);
            $filesize = 0;

            if (isset($_FILES['upload'])) {
            	$file = $_FILES['upload']['name'];
            	$filesize = $_FILES['upload']['size'];
            }

        	// if file is greater than 0 process it into resources
        	if($filesize > 0) {

        		if($image_folder_writable && isset($file)) {
        			$filename = PerchUtil::tidy_file_name($file);
        			if(strpos($filename,'.php')!==false) $filename.='.txt'; //checking for naughty uploading of php files.
        			$target = PERCH_RESFILEPATH.DIRECTORY_SEPARATOR.$filename;
        			if(file_exists($target)) {
                        $ext = strrpos($filename, '.');
                        $fileName_a = substr($filename, 0, $ext);
                        $fileName_b = substr($filename, $ext);

                        $count = 1;
                        while (file_exists(PERCH_RESFILEPATH.DIRECTORY_SEPARATOR.$fileName_a.'_'.$count.$fileName_b)) {
                            $count++;
                        }

                        $filename = $fileName_a . '_' . $count . $fileName_b;
                        $target = PERCH_RESFILEPATH.DIRECTORY_SEPARATOR.$filename;
        			}
        		}

        		PerchUtil::move_uploaded_file($_FILES['upload']['tmp_name'], $target);

        		if (is_object($Image)) {
        		    $Image->process_versions($filename, $Template);
        		}
        	}
        	
        	if($new_image) {
        		PerchUtil::redirect($API->app_path() .'/images/edit/?album_id='.$albumID.'&id='.$result->id().'&created=1');
        	}else{
            	$message = $HTML->success_message('Your image has been successfully updated. Return to %simage listing%s', '<a href="'.$API->app_path() .'/images/?id='.$albumID.'">', '</a>');  
        	}
        }else{
            $message = $HTML->failure_message('Sorry, that image could not be updated.');
        }
        
        if (is_object($Image)) {
            $details = $Image->to_array();
        }else{
            $details = array();
        }
        
    }
    
    if (isset($_GET['created']) && !$message) {
        $message = $HTML->success_message('Your image has been successfully created. Return to %simage listing%s', '<a href="'.$API->app_path() .'/images/?id='.$albumID.'">', '</a>'); 
    }
?>