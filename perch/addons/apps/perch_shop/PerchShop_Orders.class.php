<?php

class PerchShop_Orders extends PerchAPI_Factory
{
    protected $table     = 'shop_orders';
	protected $pk        = 'orderID';
	protected $singular_classname = 'PerchShop_Order';
	
	protected $default_sort_column = 'orderDate';
	
	
	public function get_by_status($status='new', $Paging=false)
	{
		if ($Paging && $Paging->enabled()) {
            $sql = $Paging->select_sql();
        }else{
            $sql = 'SELECT';
        }
        
        $sql .= ' * 
                FROM ' . $this->table;

        $sql .= ' WHERE orderStatus='.$this->db->pdb(ucfirst($status));
                
        if (isset($this->default_sort_column)) {
            $sql .= ' ORDER BY ' . $this->default_sort_column . ' DESC';
        }
        
        if ($Paging && $Paging->enabled()) {
            $sql .=  ' '.$Paging->limit_sql();
        }
        
        $results = $this->db->get_rows($sql);
        
        if ($Paging && $Paging->enabled()) {
            $Paging->set_total($this->db->get_count($Paging->total_count_sql()));
        }
        
        return $this->return_instances($results);
	}

}

?>