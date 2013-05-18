<?php
    
    $HTML = $API->get('HTML');
     
    
    $Orders = new PerchShop_Orders($API);
    
    $Paging = $API->get('Paging');
    $Paging->set_per_page(10);
   
    $orders = array();
	
    $filter = 'new';
    

    if (isset($_GET['status']) && $_GET['status'] != '') {
        $filter = $_GET['status'];
    }
    
    $orders = $Orders->get_by_status($filter, $Paging);


    if ($orders == false) {
        $Orders->attempt_install();
    }

?>