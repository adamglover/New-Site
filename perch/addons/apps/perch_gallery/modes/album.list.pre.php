<?php
    
    $HTML = $API->get('HTML');
    
    $GalleryAlbums = new PerchGallery_Albums($API);
   
    
    $albums = $GalleryAlbums->return_all();
    
	
    // Install
    if ($albums == false) {
    	$GalleryAlbums->attempt_install();
    }
       
    

?>