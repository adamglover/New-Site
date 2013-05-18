<?php
    
    $HTML = $API->get('HTML');
    
    // Try to update
    if (file_exists('update.php')) include('update.php');

    
    
    
    
    $Products = new PerchShop_Products($API);
    
    $Paging = $API->get('Paging');
    $Paging->set_per_page(10);
    
    $Categories = new PerchShop_Categories($API);
    $categories = $Categories->all();
   
    $products = array();
	
    $filter = 'all';
    

    if (isset($_GET['category']) && $_GET['category'] != '') {
        $filter = 'category';
        $category = $_GET['category'];
    }
    
    
    switch ($filter) {
        
        case 'category':
            $products = $Products->get_by_category_slug($category);
            break;

        default:
            $products = $Products->all($Paging);
            
            // Install
            if ($products == false) {
                $Products->attempt_install();
            }
            
            break;
    }

?>