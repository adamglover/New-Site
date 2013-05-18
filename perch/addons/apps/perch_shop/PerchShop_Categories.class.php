<?php

class PerchShop_Categories extends PerchAPI_Factory
{
    protected $table     = 'shop_categories';
	protected $pk        = 'categoryID';
	protected $singular_classname = 'PerchShop_Category';
	
	protected $default_sort_column = 'categoryTitle';
	
	function __construct($api=false)
	{
		$this->cache = array();
		parent::__construct($api);
	}
	
	public function find_by_slug($slug)
	{
	    $sql = 'SELECT *
                FROM '.PERCH_DB_PREFIX.'shop_categories c
                WHERE categorySlug='.$this->db->pdb($slug).'
                LIMIT 1';
		
		$row   = $this->db->get_row($sql);

    	$r = $this->return_instance($row);
    	    
    	return $r;
	}
	
	/**
	 * fetch the cats for a given product
	 * @param int $productID
	 */
	public function get_for_product($productID)
	{
	    $Cache = PerchShop_Cache::fetch();
	    
	    if ($Cache->exists('cats_for_product'.$productID)) {
	        return $Cache->get('cats_for_product'.$productID);
	    }else{
	        $sql = 'SELECT c.*
    	            FROM '.$this->table.' c, '.PERCH_DB_PREFIX.'shop_products_to_categories p2c
    	            WHERE c.categoryID=p2c.categoryID
    	                AND p2c.productID='.$this->db->pdb($productID);
    	    $rows   = $this->db->get_rows($sql);

    	    $r = $this->return_instances($rows);
    	    
    	    $Cache->set('cats_for_product'.$productID, $r);
    	    
    	    return $r;
	    }
	    
	    return false;
	}
	
	
	/**
	 * 
	 * retrieves all categories used by products along with a count of number of products for each category.
	 */
	 public function all_in_use() {
		$sql = 'SELECT c.categoryID, c.categoryTitle, c.categorySlug, COUNT(p2c.productID) AS qty
                FROM '.PERCH_DB_PREFIX.'shop_categories c, '.PERCH_DB_PREFIX.'shop_products_to_categories p2c, '.PERCH_DB_PREFIX.'shop_products p
                WHERE p2c.categoryID=c.categoryID AND p2c.productID=p.productID
                    AND p.productStatus=\'Live\' ';
                    
					$Settings = $this->api->get('Settings');
		
					$show_oos = $Settings->get('perch_shop_display_oos')->settingValue();
		
	 				if(!$show_oos == true) {
	    				$sql .= '  AND p.productCount>=1';
	    			}  
                $sql.= ' GROUP BY c.categoryID
                ORDER BY c.categoryTitle ASC
		';
		
		$rows   = $this->db->get_rows($sql);
		
		

    	$r = $this->return_instances($rows);
    	    
    	return $r;
	}
	
	/**
	* takes the post data and inserts it as a new row in the database.
	*/
    public function create($data)
    {
        if (isset($data['categoryTitle'])) {
             $slug = PerchUtil::urlify($data['categoryTitle']);
             $data['categorySlug'] = $this->get_unique_slug($slug);
        }
        
        return parent::create($data);				
        
        return false;
	}
	
	
	/**
     * 
     * Test that we have a unique slug for the category. Must be used on create and update as admins can update the slug.
     * @param string $slug
     * @param int $count
     */
	public function get_unique_slug($slug, $count=0, $categoryID=false)
    {
        if ($count > 0) {
            $slug = $slug.'-'.$count;
        }
        
        //check to see if this exists in products
        $sql = 'SELECT * FROM '.PERCH_DB_PREFIX.'shop_categories WHERE categorySlug= '.$this->db->pdb($slug);
       
    	if($categoryID) {
        	$sql.= ' AND categoryID != '.$this->db->pdb($categoryID);
        }
        
        $row = $this->db->get_row($sql);
        
        if(is_array($row)) {
            $count++;
            return $this->get_unique_slug($slug, $count);
        }else{
            return $slug;
        }
    }
    
}

?>