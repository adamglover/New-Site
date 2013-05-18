<?php

    # Side panel
    echo $HTML->side_panel_start();
    
        echo $HTML->para('This page lists your products. You can filter them by category.');   
    
    
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start();
    include('_subnav.php');

    echo '<a class="add button" href="'.$HTML->encode($API->app_path().'/edit/').'">'.$Lang->get('Add Product').'</a>';


    echo $HTML->heading1('Listing Products');
    
    if (isset($message)) echo $message;


        /* ----------------------------------------- SMART BAR ----------------------------------------- */
        
        ?>
        <ul class="smartbar">
            <li class="<?php echo ($filter=='all'?'selected':''); ?>"><a href="<?php echo $HTML->encode($API->app_path().''); ?>"><?php echo $Lang->get('All'); ?></a></li>           
            <?php
                if (PerchUtil::count($categories)) {
                    $items = array();
                    foreach($categories as $Category) {
                        $items[] = array(
                                'arg'=>'category',
                                'val'=>$Category->categorySlug(),
                                'label'=>$Category->categoryTitle(),
                                'path'=>$API->app_path()
                            );
                    }
                    echo PerchUtil::smartbar_filter('cf', 'By Category', 'Filtered by ‘%s’', $items, 'folder', $Alert, "You are viewing products in ‘%s’", $API->app_path());
                }
            ?>
        </ul>
         <?php echo $Alert->output(); ?>


        <?php

        /* ----------------------------------------- /SMART BAR ----------------------------------------- */













    
    if (PerchUtil::count($products)) {
?>
    <table>
        <thead>
            <tr>
                <th><?php echo $Lang->get('Product'); ?></th>
                <th><?php echo $Lang->get('Price'); ?></th>
                <th><?php echo $Lang->get('Quantity'); ?></th>
                <th class="action"></th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($products as $Product) {
?>
            <tr>
                <td class="primary"><a href="<?php echo $HTML->encode($API->app_path()); ?>/edit/?id=<?php echo $HTML->encode(urlencode($Product->id())); ?>" class="edit"><?php echo $HTML->encode($Product->productTitle()); ?></a></td>
                <td><?php echo $HTML->encode($Product->productPrice()); ?></td>
                <td><?php echo $HTML->encode($Product->productCount()); ?></td>
                
                <td><a href="<?php echo $HTML->encode($API->app_path()); ?>/delete/?id=<?php echo $HTML->encode(urlencode($Product->id())); ?>" class="delete"><?php echo $Lang->get('Delete'); ?></a></td>
            </tr>

<?php   
    }
?>
        </tbody>
    </table>
<?php    
        if ($Paging->enabled()) {
            echo $HTML->paging($Paging);
        }
    

    }else{
        echo $HTML->warning_message('You don\'t have any products to list. Start by adding a product.'); 
    } // if pages
    
    echo $HTML->main_panel_end();
?>