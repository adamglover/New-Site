<?php
    # include the API
    include('../../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'perch_shop');
    $Lang = $API->get('Lang');

    # include your class files
    include('../PerchShop_Products.class.php');
    include('../PerchShop_Product.class.php');
    include('../PerchShop_Categories.class.php');
    include('../PerchShop_Category.class.php');
    
    # Set the page title
    $Perch->page_title = $Lang->get('Manage Categories');

    $Perch->add_css($API->app_path().'/assets/css/shop.css');
    

    # Do anything you want to do before output is started
    include('../modes/cat.list.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('../modes/cat.list.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
?>
