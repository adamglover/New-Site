<?php

class PerchShop_Order  extends PerchAPI_Base
{
    protected $table  = 'shop_orders';
    protected $pk     = 'orderID';
    
    public function mark_as_dispatched()
    {
    	$data = array('orderStatus'=>'Dispatched');
    	$this->update($data);
    }
}

?>