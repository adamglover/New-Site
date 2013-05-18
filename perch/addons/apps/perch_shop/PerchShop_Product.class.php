<?php

class PerchShop_Product extends PerchAPI_Base
{
    protected $table  = 'shop_products';
    protected $pk     = 'productID';


    public function __call($method, $arguments)
	{
		if (isset($this->details[$method])) {
			return $this->details[$method];
		}else{
            // look in dynamic fields
            $dynamic_fields = PerchUtil::json_safe_decode($this->productDynamicFields(), true);
            if (isset($dynamic_fields[$method])) {
                return $dynamic_fields[$method];
            }

            // try database
		    PerchUtil::debug('Looking up missing property ' . $method, 'notice');
		    if (isset($this->details[$this->pk])){
		        $sql    = 'SELECT ' . $method . ' FROM ' . $this->table . ' WHERE ' . $this->pk . '='. $this->db->pdb($this->details[$this->pk]);
		        $this->details[$method] = $this->db->get_value($sql);
		        return $this->details[$method];
		    }
		}
		
		return false;
	}

    public function update($data, $do_cats=true, $do_tags=true)
    {
        $PerchShop_Products = new PerchShop_Products();
        
        if (isset($data['productDescRaw'])) {
            $API = new PerchAPI(1.0, 'perch_shop');
            $Text = $API->get('Text');
            $data['productDescHTML'] = $Text->text_to_html($data['productDescRaw']);

        }
       
        /* on update the admin can modify the generated slug - we still check this for uniqueness */
        $slug = PerchUtil::urlify($data['productSlug']);
        
        $data['productSlug'] = $PerchShop_Products->get_unique_slug($slug,0, $this->id());
        

        if (isset($data['cat_ids'])) {
            $catIDs = $data['cat_ids'];
            unset($data['cat_ids']);
        }else{
            $catIDs = false;
        }

        // Update the product itself
        parent::update($data);
	
        if ($do_cats) {
            // Delete existing categories
            $this->db->delete(PERCH_DB_PREFIX.'shop_products_to_categories', $this->pk, $this->id());

     		// Add new categories
     		if (is_array($catIDs)) {
     			for($i=0; $i<sizeOf($catIDs); $i++) {
     			    $tmp = array();
     			    $tmp['productID'] = $this->id();
     			    $tmp['categoryID'] = $catIDs[$i];
     			    $this->db->insert(PERCH_DB_PREFIX.'shop_products_to_categories', $tmp);
     			}
     		}
        }
       
    	
 		return true;
    }
    
    public function delete()
    {
        parent::delete();
        $this->db->delete(PERCH_DB_PREFIX.'shop_products_to_categories', $this->pk, $this->id());
    }
    
    public function date()
    {
        return date('Y-m-d', strtotime($this->postDateTime()));
    }

    public function to_array()
    {
        $out = parent::to_array();
        
        $Categories = new PerchShop_Categories();
        $cats   = $Categories->get_for_product($this->id());
        
        $out['category_slugs'] = '';
        $out['category_names'] = '';
        
        if (PerchUtil::count($cats)) {
            $slugs = array();
            $names = array();
            foreach($cats as $Category) {
                $slugs[] = $Category->categorySlug();
                $names[] = $Category->categoryTitle();
                
                // for template
                $out[$Category->categorySlug()] = true;
            }
            
            $out['category_slugs'] = implode(' ', $slugs);
            $out['category_names'] = implode(', ', $names);
        }
        
        if ($out['productDynamicFields'] != '') {
            $dynamic_fields = PerchUtil::json_safe_decode($out['productDynamicFields'], true);
            if (PerchUtil::count($dynamic_fields)) {
                foreach($dynamic_fields as $key=>$value) {
                    $out['perch_'.$key] = $value;
                }
            }
            $out = array_merge($dynamic_fields, $out);
        }
        
        return $out;
    }
    
    public function get_product_options() {
    	$sql = 'SELECT optionID, optionKey, optionValues FROM '. PERCH_DB_PREFIX.'shop_product_options WHERE productID = '.$this->id();
    	
    	
    	
    	return $this->db->get_rows($sql);
    	
    }
    
    /** 
     * 
     * add an option to the current product
     * @param string $key
     * @param string $value
     */
    public function add_option($key,$value) {
    	$tmp = array();
		$tmp['productID'] = $this->id();
		$tmp['optionKey'] = $key;
		$tmp['optionValues'] = $value;
		if($key !='' && $value != '') {
			$this->db->insert(PERCH_DB_PREFIX.'shop_product_options', $tmp);
		
			return true;
		}
    }
    
    /**
     * 
     * updates an option
     * @param int $optionID
     * @param string $key
     * @param string $value
     */
    public function update_option($optionID, $key, $value) {
    	$tmp = array();
		$tmp['optionKey'] = $key;
		$tmp['optionValues'] = $value;
    	$this->db->update(PERCH_DB_PREFIX.'shop_product_options', $tmp, 'optionID', $optionID);
    }
    
    /**
     * 
     * deletes an option from the product
     * @param int $optionID
     */
    public function delete_option($optionID) {
    	
    	$this->db->delete(PERCH_DB_PREFIX.'shop_product_options','optionID',$optionID);
    	
    }
    

}

?>