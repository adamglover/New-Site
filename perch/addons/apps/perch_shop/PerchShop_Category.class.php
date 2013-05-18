<?php

class PerchShop_Category  extends PerchAPI_Base
{
    protected $table  = 'shop_categories';
    protected $pk     = 'categoryID';
    
    
    public function delete()
    {
        $this->db->delete(PERCH_DB_PREFIX.'shop_products_to_categories', 'categoryID', $this->id());
        parent::delete();
    }
    
    
	public function update($data)
    {
        $PerchShop_Categories = new PerchShop_Categories();
       
        /* on update the admin can modify the generated slug - we still check this for uniqueness */
        $slug = PerchUtil::urlify($data['categorySlug']);
        
        $data['categorySlug'] = $PerchShop_Categories->get_unique_slug($slug,0,$this->id());

        // Update the category itself
        parent::update($data);

 		return true;
    }
}

?>