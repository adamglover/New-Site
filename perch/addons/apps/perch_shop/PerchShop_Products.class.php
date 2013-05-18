<?php

class PerchShop_Products extends PerchAPI_Factory
{
    protected $table     = 'shop_products';
	protected $pk        = 'productID';
	protected $singular_classname = 'PerchShop_Product';
	
	protected $default_sort_column = 'productTitle';
	
	public $static_fields   = array('productTitle', 'productSlug', 'productStatus', 'productDescRaw', 'productDescHTML', 'productCount','productPrice','productFoxyCategory','productCode');
	
    function __construct($api=false) 
    {
        $this->cache = array();
        parent::__construct($api);
    }
    
    public function all($Paging=false)
    {
        if ($Paging && $Paging->enabled()) {
            $sql = $Paging->select_sql();
        }else{
            $sql = 'SELECT';
        }
        
        $sql .= ' * 
                FROM ' . $this->table;
                
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

    
    /*
        Get a single post by its ID
    */
    public function find($productID, $is_admin=false) 
    {
        $Cache = PerchShop_Cache::fetch();
        
        if ($Cache->exists('p'.$productID)) {
            return $Cache->get('p'.$productID);
        }else{
            $sql = 'SELECT * FROM '.PERCH_DB_PREFIX.'shop_products WHERE productID='.$this->db->pdb($productID);
            
            if (!$is_admin) {
                $sql .= ' AND productStatus=\'Live\' AND productCount>=1';
            }

            $row = $this->db->get_row($sql);

            if(is_array($row)) {
                $sql = 'SELECT categoryID FROM '.PERCH_DB_PREFIX.'shop_products_to_categories WHERE productID = '.$this->db->pdb($productID);
                $result = $this->db->get_rows($sql);
                $a = array();
                if(is_array($result)) {
                    foreach($result as $cat_row) {
                        $a[] = $cat_row['categoryID'];
                    }
                }
                $row['cat_ids'] = $a;
            }

            $r = $this->return_instance($row);
            
            $Cache->set('p'.$productID, $r);
            
            return $r;
        }
        
        return false;
    }
    
    /*
        Get a single post by its Slug
    */
    public function find_by_slug($productSlug) 
    {
        $Cache = PerchShop_Cache::fetch();
        
        if ($Cache->exists('p'.$productSlug)) {
            return $Cache->get('p'.$productSlug);
        }else{
            $sql = 'SELECT * FROM '.PERCH_DB_PREFIX.'shop_products WHERE productStatus=\'Live\' AND productCount>=1 AND productSlug= '.$this->db->pdb($productSlug);
        
            $row = $this->db->get_row($sql);
        
            if(is_array($row)) {
                $sql = 'SELECT categoryID FROM '.PERCH_DB_PREFIX.'shop_products_to_categories WHERE productID = '.$this->db->pdb($row['productID']);
                $result = $this->db->get_rows($sql);
                $a = array();
                if(is_array($result)) {
                    foreach($result as $cat_row) {
                        $a[] = $cat_row['categoryID'];
                    }
                }
                $row['cat_ids'] = $a;
            }
        
            $r = $this->return_instance($row);
            
            $Cache->set('p'.$productSlug, $r);
            
            return $r;
        }
        
        return false;
    }
    
/*
        Get a single post by its productCode
    */
    public function find_by_code($productCode) 
    {
        
            $sql = 'SELECT * FROM '.PERCH_DB_PREFIX.'shop_products WHERE productCode= '.$this->db->pdb($productCode) .' LIMIT 1';
        
            $row = $this->db->get_row($sql);
        
            if(is_array($row)) {
               
        
            	$r = $this->return_instance($row);
            
            
            
            	return $r;
        	}
        
        return false;
    }
    
   
    
    
	/**
	* takes the post data and inserts it as a new row in the database.
	*/
    public function create($data)
    {
        if(isset($data['productDescRaw'])) {
            $Text = $this->api->get('Text');
            $data['productDescHTML'] = $Text->text_to_html($data['productDescRaw']);
        }else{
            $data['productDescHTML'] = false;
        }
        
        if (isset($data['productTitle'])) {
             $slug = PerchUtil::urlify($data['productTitle']);
             $data['productSlug'] = $this->get_unique_slug($slug);
        }
        
        if (isset($data['cat_ids']) && is_array($data['cat_ids'])) {
            $cat_ids = $data['cat_ids'];
        }else{
            $cat_ids = false;
        }
        
        unset($data['cat_ids']);
        
        $productID = $this->db->insert($this->table, $data);
       
		if ($productID) {
			if(is_array($cat_ids)) {
				for($i=0; $i<sizeOf($cat_ids); $i++) {
				    $tmp = array();
				    $tmp['productID'] = $productID;
				    $tmp['categoryID'] = $cat_ids[$i];
				    $this->db->insert(PERCH_DB_PREFIX.'shop_products_to_categories', $tmp);
				}
			}
			
			
			
            return $this->find($productID, true);
		}				
        return false;
	}
	
	
 
    public function get_display($type='latest', $opts)
    {
        // options
        $categories = false;
        $templates = array();
        
        if (is_array($opts)) {
            
            // categories
            if (isset($opts['category'])) {
                if (is_array($opts['category'])) {
                    $categories = $opts['category'];
                }else{
                    $categories = array($opts['category']);
                }
            }
            
            
            
            // templates
            
            if (isset($opts['shop_product-template'])) {
                $templates['shop-product'] = $opts['shop-product-template'];
            }
            
           
        }
        
        $products = $this->get_latest($count=false);
        
        switch($type) {
        	default:
                $DisplayListing = new PerchShop_DisplayListing($this->api);
                $DisplayListing->set_products($products);

            	$r = $DisplayListing->display($templates);
                break;
                
            
        }
        
    	
    	return $r;
    }
    
    
    
    public function get_custom($opts)
    {
        $posts = array();
        $Post = false;
        $single_mode = false;
        $where = array();
        $order = array();
        $limit = '';
        
        
        // find specific _id
	    if (isset($opts['_id'])) {
	        $single_mode = true;
	        $Post = $this->find($opts['_id']);
	    }else{        
	        // if not picking an _id, check for a filter
	        if (isset($opts['filter']) && isset($opts['value'])) {
	            
	            
	            $key = $opts['filter'];
	            $raw_value = $opts['value'];
	            $value = $this->db->pdb($opts['value']);
	            
	            $match = isset($opts['match']) ? $opts['match'] : 'eq';
                switch ($match) {
                    case 'eq': 
                    case 'is': 
                    case 'exact': 
                        $where[] = $key.'='.$value;
                        break;
                    case 'neq': 
                    case 'ne': 
                    case 'not': 
                        $where[] = $key.'!='.$value;
                        break;
                    case 'gt':
                        $where[] = $key.'>'.$value;
                        break;
                    case 'gte':
                        $where[] = $key.'>='.$value;
                        break;
                    case 'lt':
                        $where[] = $key.'<'.$value;
                        break;
                    case 'lte':
                        $where[] = $key.'<='.$value;
                        break;
                    case 'contains':
                        $v = str_replace('/', '\/', $raw_value);
                        $where[] = $key." REGEXP '/\b".$v."\b/i'";
                        break;
                    case 'regex':
                    case 'regexp':
                        $v = str_replace('/', '\/', $raw_value);
                        $where[] = $key." REGEXP '".$v."'";
                        break;
                    case 'between':
                    case 'betwixt':
                        $vals  = explode(',', $raw_value);
                        if (PerchUtil::count($vals)==2) {
                            $where[] = $key.'>'.trim($this->db->pdb($vals[0]));
                            $where[] = $key.'<'.trim($this->db->pdb($vals[1]));
                        }
                        break;
                    case 'eqbetween':
                    case 'eqbetwixt':
                        $vals  = explode(',', $raw_value);
                        if (PerchUtil::count($vals)==2) {
                            $where[] = $key.'>='.trim($this->db->pdb($vals[0]));
                            $where[] = $key.'<='.trim($this->db->pdb($vals[1]));
                        }
                        break;
                    case 'in':
                    case 'within':
                        $vals  = explode(',', $raw_value);
                        $tmp = array();
                        if (PerchUtil::count($vals)) {
                            foreach($vals as $value) {
                                if ($item[$key]==trim($value)) {
                                    $tmp[] = $item;
                                    break;
                                }
                            }
                            $where[] = $key.' IN '.$this->implode_for_sql_in($tmp);
                            
                        }
                        break;
                }
	        }
	    }
    
	    // sort
	    if (isset($opts['sort'])) {
	        $desc = false;
	        if (isset($opts['sort-order']) && $opts['sort-order']=='DESC') {
	            $desc = true;
	        }else{
	            $desc = false;
	        }
	        $order[] = $opts['sort'].' '.($desc ? 'DESC' : 'ASC');
	    }
    
	    if (isset($opts['sort-order']) && $opts['sort-order']=='RAND') {
            $order[] = 'RAND()';
        }
    
	    // limit
	    if (isset($opts['count'])) {
	        $count = (int) $opts['count'];
        
	        if (isset($opts['start'])) {
                $start = (((int) $opts['start'])-1). ',';
	        }else{
	            $start = '';
	        }
        
	        $limit = $start.$count;
	    }
	    
	    if ($single_mode){
	        $posts = array($Post);
	    }else{
	        
	        // Paging
	        $Paging = $this->api->get('Paging');
	        if (!isset($count) || !$count) {
	            $Paging->disable();
	        }else{
	            $Paging->set_per_page($count);
	            if (isset($start) && $start!='') {
	                $Paging->set_start_position($start);
	            }
	        }
	        
    	    $sql = $Paging->select_sql() . ' p.* FROM '.$this->table.' p ';
	    
            // categories
            if (isset($opts['category'])) {
                $cats = $opts['category'];
                if (!is_array($cats)) $cats = array($cats);
        
                if (is_array($cats)) {
                    $sql = $Paging->select_sql() . ' p.*
                            FROM '.$this->table.' p, '.PERCH_DB_PREFIX.'shop_products_to_categories p2c, '.PERCH_DB_PREFIX.'shop_categories c ';
                    $where[] =  'p.productID=p2c.productID AND p2c.categoryID=c.categoryID AND categorySlug IN ('.$this->implode_for_sql_in($cats).') ';
                }
            }
            
            
	    	
	    	$sql .= ' WHERE  productStatus=\'Live\' ';
	    	$Settings = $this->api->get('Settings');
	    	
	    	$show_oos = $Settings->get('perch_shop_display_oos')->settingValue();

	    	if(!$show_oos == true) {
	    		$sql .= '  AND productCount>=1';
	    	}
	    	
    	    if (count($where)) {
    	        $sql .= ' AND ' . implode(' AND ', $where);
    	    }
	    
    	    if (count($order)) {
    	        $sql .= ' ORDER BY '.implode(', ', $order);
    	    }
	        
	        if ($Paging->enabled()) {
	            $sql .= ' '.$Paging->limit_sql();
	        }else{
	            if ($limit!='') {
        	        $sql .= ' LIMIT '.$limit;
        	    }
	        }
	        	    	    
    	    $rows    = $this->db->get_rows($sql);
    	    
    	    PerchUtil::debug($rows);
    	    
    	    if ($Paging->enabled()) {
    	        $Paging->set_total($this->db->get_count($Paging->total_count_sql()));
    	    }
    	    
    	    
    	        	    
    	    $posts  = $this->return_instances($rows);
    	    
    	    //get options
    	   
    	    for($i=0;$i<sizeOf($posts);$i++) {
    	    	$product_opts = $posts[$i]->get_product_options();
    	    	if(is_array($product_opts)) {
    	    		
    	    		$template = 'shop/product_options.html';
    	    		$Template = $this->api->get("Template");
				    $Template->set($template, 'shop');
				    $productOptions_html = $Template->render_group($product_opts, true);
				    PerchUtil::debug($productOptions_html);
			        $posts[$i]->squirrel('productOptions_html',$productOptions_html);
    	    	}
    	    }

        }
	    
	    
        if (isset($opts['skip-template']) && $opts['skip-template']==true) {
            
            if ($single_mode) return $Post;
            
            $out = array();
            if (PerchUtil::count($posts)) {
                foreach($posts as $Post) {
                    $out[] = $Post->to_array();
                }
            }
            return $out; 
	    }
	    
	    // template
	    if (isset($opts['template'])) {
	        $template = $opts['template'];
	    }else{
	        $template = 'shop/product.html';
	    }
	    
	    if (isset($Paging) && $Paging->enabled()) {
            $paging_array = $Paging->to_array();
            // merge in paging vars
    	    if (PerchUtil::count($posts)) {
    	        foreach($posts as &$Post) {
    	            foreach($paging_array as $key=>$val) {
    	                $Post->squirrel($key, $val);
    	            }
    	        }
    	    }
        }
        	    
	    $Template = $this->api->get("Template");
	    $Template->set($template, 'shop');
	    
        $html = $Template->render_group($posts, true);

	    return $html;
    }
    
    /**
     * gets the listing by category
     * @param varchar $slug
     */
    public function get_by_category_slug($slug)
    {
        $sql = 'SELECT p.*
                FROM '.$this->table.' p, '.PERCH_DB_PREFIX.'shop_categories c, '.PERCH_DB_PREFIX.'shop_products_to_categories p2c
                WHERE p.productID=p2c.productID AND p2c.categoryID=c.categoryID
                    AND c.categorySlug='.$this->db->pdb($slug).'
                    AND p.productStatus=\'Live\'
                    AND p.productCount>=1  
                ORDER BY '.$this->default_sort_column;

        $rows   = $this->db->get_rows($sql);

        return $this->return_instances($rows);
    }
 
    private function implode_for_sql_in($rows)
    {
        foreach($rows as &$item) {
            $item = $this->db->pdb($item);
        }
        
        return implode(', ', $rows);
    }
    
    /**
     * 
     * Test that we have a unique slug for the product. Must be used on create and update as admins can update the slug.
     * @param string $slug
     * @param int $count
     */
	public function get_unique_slug($slug, $count=0, $productID=false)
    {
        if ($count>0) {
        	
            $slug = $slug.'-'.$count;
        }
        
        //check to see if this exists in products
        $sql = 'SELECT * FROM '.PERCH_DB_PREFIX.'shop_products WHERE productSlug= '.$this->db->pdb($slug);
        
        if($productID) {
        	$sql.= ' AND productID != '.$this->db->pdb($productID);
        }
       
        
        $row = $this->db->get_row($sql);
        
        if(is_array($row)) {
            $count++;
            return $this->get_unique_slug($slug, $count);
        }else{
            return $slug;
        }
    }
    
    public function log_ipn($data) {
    	$this->db->insert('perch2_shop_log',$data);
    	return true;
    }
    
    public function update_log($logTransaction,$res) {
    	$sql = 'UPDATE perch2_shop_log SET logVerify ='.$this->db->pdb($res) .' WHERE logTransaction = '.$this->db->pdb($logTransaction);
    	$this->db->execute($sql);
    }
    
}

?>