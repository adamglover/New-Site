<?php
   
    
    # Side panel
    echo $HTML->side_panel_start();
    echo $HTML->para('These are the order details, as sent back by PayPal.');
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 
    include('_subnav.php');
    
        echo $HTML->heading1('Order details');


        if ($message) echo $message;    
    
        
    
        echo $Form->form_start('content-edit', 'magnetic-save-bar');
    
            $fields = array();
            $fields['orderTxnID']           = 'Transaction ID';
            $fields['orderDate']            = 'Date';
            $fields['orderFirstName']       = 'Customer first name';
            $fields['orderLastName']        = 'Customer last name';
            $fields['orderPayerEmail']      = 'Customer Email';
            $fields['orderPayerID']         = 'Customer ID';
            $fields['orderPaymentStatus']   = 'Payment Status';
            $fields['orderCurrency']        = 'Currency';
            $fields['orderFee']             = 'Fee';
            $fields['orderTax']             = 'Tax';
            $fields['orderShipping']        = 'Shipping';
            $fields['orderTotal']           = 'Total';
            $fields['orderTotalItems']      = 'Items';

            echo '<table class="order-details">';

            foreach($fields as $field=>$label) {
                echo '<tr>';
                    echo '<th>'.$Lang->get($label).'</th>';
                    echo '<td>'.$HTML->encode($Order->$field()).'</t>';
                echo '</tr>';
            }

            echo '</table>';

            echo '<div class="address">';
                echo '<h2>'.$Lang->get('Ship to:').'</h2>';
                echo '<p>';
                echo $HTML->encode($Order->orderAddressName()).'<br />';
                echo $HTML->encode($Order->orderAddressStreet()).'<br />';
                echo $HTML->encode($Order->orderAddressCity()).'<br />';
                echo $HTML->encode($Order->orderAddressState()).'<br />';
                echo $HTML->encode($Order->orderAddressCountry()).'<br />';
                echo $HTML->encode($Order->orderAddressZIP());
                echo '</p>';
            echo '</div>';

            
    		echo $HTML->heading2('Product details');
            

            $products = PerchUtil::json_safe_decode($Order->orderItems());

            if (PerchUtil::count($products)) {
                echo '<table class="order-items">';
                echo '<thead><tr>';
                echo '<th>'.$Lang->get("Code").'</th>';
                echo '<th>'.$Lang->get("Title").'</th>';
                echo '<th>'.$Lang->get("Quantity").'</th>';
                echo '</tr></thead>';

                foreach($products as $Product) {
                    echo '<tr>';
                        echo '<td>'.$HTML->encode($Product->productCode).'</td>';
                        echo '<td>'.$HTML->encode($Product->productName).'</td>';
                        echo '<td>'.$HTML->encode($Product->qty).'</td>';
                    echo '</tr>';
                }

                echo '</table>';
            }

            if ($Order->orderStatus() != 'Dispatched') echo $Form->submit_field('btnSubmit', 'Mark as dispatched', $API->app_path().'/orders/');

        echo $Form->form_end();
    
        
    echo $HTML->main_panel_end();

    
?>  