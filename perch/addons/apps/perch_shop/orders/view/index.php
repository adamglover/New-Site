<?php
    # include the API
    include('../../../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'perch_shop');
    $Lang = $API->get('Lang');

    # include your class files
    include('../../PerchShop_Products.class.php');
    include('../../PerchShop_Product.class.php');
    include('../../PerchShop_Categories.class.php');
    include('../../PerchShop_Category.class.php');
    include('../../PerchShop_Orders.class.php');
    include('../../PerchShop_Order.class.php');
    
    # Set the page title
    $Perch->page_title = $Lang->get('View Order');

    $Perch->add_css($API->app_path().'/assets/css/shop.css');
    

    # Do anything you want to do before output is started
    include('../../modes/orders.detail.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('../../modes/orders.detail.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
?>
