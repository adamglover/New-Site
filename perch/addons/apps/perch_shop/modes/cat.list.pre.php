<?php
    
    $Categories = new PerchShop_Categories($API);

    $HTML = $API->get('HTML');

    $categories = $Categories->all();
    
   

?>