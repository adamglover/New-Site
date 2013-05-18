<?php
	if ($CurrentUser->logged_in() && $CurrentUser->has_priv('perch_gallery')) {
	    $this->register_app('perch_gallery', 'Gallery', 1, 'Basic image gallery', '2.6');
	    $this->add_setting('perch_gallery_basicUpload', 'Use basic uploader', 'checkbox', false);
	    $this->require_version('perch_gallery', '2.0.7');
	}
?>