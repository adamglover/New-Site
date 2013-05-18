<?php
    
    $Albums     = new PerchGallery_Albums($API);
    $Images     = new PerchGallery_Images($API);
    $Versions   = new PerchGallery_ImageVersions($API);

    $HTML       = $API->get('HTML');
    
    $Template   = $API->get('Template');
    $Template->set('gallery/image.html', 'gallery');
    
    if (!$CurrentUser->has_priv('perch_gallery.image.upload')) die('Your role does not have permission to upload images.');
    
    $message    = false;
        
    if (isset($_GET['album_id']) && $_GET['album_id']!='') {
        $albumID = (int) $_GET['album_id'];    
    }
    
    
    $Form = $API->get('Form');
    
    if ($Form->submitted()) {
        
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
    		
    		$data = array();
    		$data['imageAlt'] = PerchUtil::strip_file_extension($filename);
    		$data['albumID'] = $albumID;
    		$Image = $Images->create($data);
    		
    		if (is_object($Image)) {
    		    $Image->process_versions($filename, $Template);
    		}
    		
    		
    		
    		
    	}
        
    }
    
?>