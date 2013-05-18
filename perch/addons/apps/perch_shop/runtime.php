<?php
   
    PerchSystem::register_search_handler('PerchShop_SearchHandler');
   
    include('PerchShop_Cache.class.php');
    include('PerchShop_Products.class.php');
    include('PerchShop_Product.class.php');
    include('PerchShop_Categories.class.php');
    include('PerchShop_Category.class.php');
    include('PerchShop_SearchHandler.class.php');

    
    function perch_shop_product($id_or_slug, $return=false)
    {
        $opts = array(
            'template'=>'shop/product.html'
            );

        if (is_numeric($id_or_slug)) {
            $opts['_id'] = intval($id_or_slug);            
        }else{
            $opts['filter'] = 'productSlug';
            $opts['match']  = 'eq';
            $opts['value']  = $id_or_slug;
        }
        
        $r = perch_shop_custom($opts, $return);
        if ($return) return $r;
        echo $r;
    }
    
    /**
     * 
     * Get the content of a specific field
     * @param mixed $id_or_slug the id or slug of the product
     * @param string $field the name of the field you want to return
     * @param bool $return
     */
    function perch_shop_product_field($id_or_slug, $field, $return=false)
    {
        $API  = new PerchAPI(1.0, 'perch_shop');
        $Products = new PerchShop_Products($API);
        
        $r = false;
        
        if (is_numeric($id_or_slug)) {
            $productID = intval($id_or_slug);
            $Product = $Products->find($productID);
        }else{
            $Product = $Products->find_by_slug($id_or_slug);
        }
        
        if (is_object($Product)) {
            $r = $Product->$field();
        }
        
        if ($return) return $r;
        
        $HTML = $API->get('HTML');
        echo $HTML->encode($r);
    }
	
    /**
     * 
     * Gets the categories used for a product to display 
     * @param string $id_or_slug id or slug of the current product
     * @param string $template template to render the categories
     * @param bool $return if set to true returns the output rather than echoing it
     */
    function perch_shop_product_categories($id_or_slug, $template='product_category_link.html',$return=false)
    {
        $API  = new PerchAPI(1.0, 'perch_shop');
        $Products = new PerchShop_Products($API);
        
        $productID = false;
        
        if (is_numeric($id_or_slug)) {
            $productID = intval($id_or_slug); 
        }else{
            $Product = $Products->find_by_slug($id_or_slug);
            if (is_object($Product)) {
                $productID = $Product->id();
            }
        }
        
        if ($productID!==false) {
            $Categories = new PerchShop_Categories($API);
            $cats   = $Categories->get_for_product($productID);
            
            $Template = $API->get('Template');
            $Template->set('shop/'.$template, 'shop');

            $r = $Template->render_group($cats, true);
            
            if ($return) return $r;
            echo $r;
        }
        
        return false;
    }
	
    
    
    function perch_shop_custom($opts=false, $return=false)
    {
        if (isset($opts['skip-template']) && $opts['skip-template']==true) $return = true; 
        
        $API  = new PerchAPI(1.0, 'perch_shop');
        
        $Products = new PerchShop_Products($API);
        
        $r = $Products->get_custom($opts);
        
	    if (strpos($r, '<perch:')!==false) {
		    $Template = $API->get("Template");
    		$r = $Template->apply_runtime_post_processing($r);
    		
    		
    		
		}
        
    	if ($return) return $r;
    	
    	echo $r;
    }
    
    /**
     * 
     * Pass in a category id or slug and get back a list of products for the category display page.
     * @param int or string $id_or_slug
     * @param string $template
     * @param bool $return
     */
    function perch_shop_products_by_category($id_or_slug, $count=10, $template='product_in_list.html', $return=false) 
    {
    	if($id_or_slug) {
	    	    		
    		$opts = array(
	        	'category'=>$id_or_slug,
    			'template'=>'shop/'.$template,
    			'count'=>$count
	        );
	        
	        perch_shop_custom($opts, $return);
    	}
    }
    
    /**
     * 
     * Builds a listing of categories. Echoes out the resulting mark-up and content
     * This used to accept a string template, have updated to expect an opts array (which would include a template)
     * For backwards compatibility reasons, if we have a string, treat it as a template.
     * @param string $template
     * @param bool $return if set to true returns the output rather than echoing it
     */
    function perch_shop_categories($opts=false, $return=false)
    {
    	if(!is_array($opts)) {
    		//treat as a string
    		if($opts) {
    			$template = $opts;
    		}else{
    			$template='category_link.html';
    		}
    	}else{
    		
    		if(isset($opts['template'])) {
    			$template = $opts['template'];
    		} else {
    			$template='category_link.html';
    		}
    	}
    	
    	$API      = new PerchAPI(1.0, 'perch_shop');
        $Products = new PerchShop_Products($API);
        
        $Categories = new PerchShop_Categories($API);
        $cats       = $Categories->all_in_use();
        
        if (isset($opts['skip-template']) && $opts['skip-template']==true) {
        	return $cats;
        }
        
        $Template = $API->get('Template');
        $Template->set('shop/'.$template, 'shop');

        $r = $Template->render_group($cats, true);
        
        if ($return) return $r;
        echo $r;
        
        return false;
    }
    
    /**
     * Get the title of the given category
     *
     * @param string $id_or_slug 
     * @param string $return 
     */
    function perch_shop_category($id_or_slug, $return=false)
    {
        $Categories = new PerchShop_Categories();
        if (is_numeric($id_or_slug)) {
            $Category = $Categories->find($id_or_slug);
        }else{
            $Category = $Categories->find_by_slug($id_or_slug);
        }
        
        if (is_object($Category)) {
            if ($return) return $Category->categoryTitle();
            echo PerchUtil::html($Category->categoryTitle());
        }
        
        return '';
    }
    
    /**
     * Get the cart URL
     */
    function perch_shop_cart_url($return=false)
    {
        $API  = new PerchAPI(1.0, 'perch_shop');
        $Settings = $API->get('Settings');
		$url = $Settings->get('perch_shop_foxy_url')->settingValue();
		
		if ($return) return $url;
		
		echo $url;
    }
    
    function perch_shop_cart_subdomain($return=false)
    {
        $url = perch_shop_cart_url(true);
        if ($url) {
            $parts = parse_url($url);
            $host = $parts['host'];
            if ($host) {
                $hostparts = explode('.', $host);
                if ($return) return $hostparts[0];
                echo $hostparts[0];
            }
        }
        
        return false;
    }

?>