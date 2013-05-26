<?php
	if ($CurrentUser->logged_in() && $CurrentUser->has_priv('perch_shop')) {
		$this->register_app('perch_shop', 'Shop', 1, 'Simple product shop', '1.1.1');
	    $this->require_version('perch_shop', '2.2.5');
	    
	    $this->add_setting('perch_shop_paypal_email', 'Your PayPal email address', 'text', false, false, 'This is the email address linked to your account');
	    
	    $this->add_setting('perch_shop_product_url', 'Product page path', 'text', '/shop/product.php?s={productSlug}');	
	    $this->add_setting('perch_shop_display_oos', 'Display out of stock products', 'checkbox', "true",false,"If checked out of stock products will remain in the listings");
	    $this->add_create_page('perch_shop', 'edit');
	}
?>