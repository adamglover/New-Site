<?php

    # Side panel
    echo $HTML->side_panel_start();
    
        echo $HTML->para('This page lists your orders. You can filter them by status.');   
    
    
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start();
    include('_subnav.php');

    echo $HTML->heading1('Listing Orders');
    
    if (isset($message)) echo $message;


        /* ----------------------------------------- SMART BAR ----------------------------------------- */
        
        ?>
        <ul class="smartbar">
            <li class="<?php echo ($filter=='new'?'selected':''); ?>"><a href="<?php echo $HTML->encode($API->app_path().'/orders/'); ?>"><?php echo $Lang->get('New'); ?></a></li>           
            <li class="<?php echo ($filter=='dispatched'?'selected':''); ?>"><a href="<?php echo $HTML->encode($API->app_path().'/orders/'); ?>?status=dispatched"><?php echo $Lang->get('Dispatched'); ?></a></li>           
        </ul>
        <?php echo $Alert->output(); ?>
        <?php

        /* ----------------------------------------- /SMART BAR ----------------------------------------- */





    
    if (PerchUtil::count($orders)) {
?>
    <table>
        <thead>
            <tr>
                <th><?php echo $Lang->get('Transaction ID'); ?></th>
                
                <th><?php echo $Lang->get('Payment'); ?></th>
                <th><?php echo $Lang->get('Name'); ?></th>
                <th><?php echo $Lang->get('Email'); ?></th>
                <th><?php echo $Lang->get('Value'); ?></th>
                <th><?php echo $Lang->get('Date'); ?></th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($orders as $Order) {
?>
            <tr>
                <td class="primary"><a href="<?php echo $HTML->encode($API->app_path()); ?>/orders/view/?id=<?php echo $HTML->encode(urlencode($Order->id())); ?>" class="edit"><?php echo $HTML->encode($Order->orderTxnID()); ?></a></td>
                
                <td><?php echo $HTML->encode($Order->orderPaymentStatus()); ?></td>   
                <td><?php echo $HTML->encode($Order->orderFirstName().' '.$Order->orderLastName()); ?></td>
                <td><?php echo $HTML->encode($Order->orderPayerEmail()); ?></td>
                <td><?php echo $HTML->encode($Order->orderTotal()); ?></td>   
                <td><?php echo $HTML->encode(strftime('%d %B %Y, %l:%M %p', strtotime($Order->orderDate()))); ?></td>
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
        echo $HTML->warning_message('You don\'t have any orders to show.'); 
    } // if pages
    
    echo $HTML->main_panel_end();
?>