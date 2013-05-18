<?php
	if ($CurrentUser->logged_in() && $CurrentUser->has_priv('perch_members')) {
	    $this->register_app('perch_members', 'Members', 2, 'Manage site members', '1.0.1');
	    $this->require_version('perch_members', '2.2');
	    $this->add_setting('perch_members_login_page', 'Login page path', 'text', '/members/login.php?r={returnURL}');
	}
?>