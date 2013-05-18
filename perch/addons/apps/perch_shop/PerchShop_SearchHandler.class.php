<?php

class PerchShop_SearchHandler implements PerchAPI_SearchHandler
{
    
    private static $tmp_url_vars = false;
    
    public static function get_search_sql($key)
    {
        $API = new PerchAPI(1.0, 'perch_shop');
        $db = $API->get('DB');
        
        $sql = 'SELECT "'.__CLASS__.'" AS source, MATCH(productTitle, productDescRaw) AGAINST('.$db->pdb($key).') AS score, productTitle, productSlug, productPrice, productDescHTML, productID, "", "", ""
	            FROM '.PERCH_DB_PREFIX.'shop_products 
	            WHERE productStatus=\'Live\'
	                AND MATCH(productTitle, productDescRaw) AGAINST('.$db->pdb($key).')';
	    return $sql;
    }
    
    public static function get_backup_search_sql($key)
    {
        $API = new PerchAPI(1.0, 'perch_blog');
        $db = $API->get('DB');
        
        $sql = 'SELECT "'.__CLASS__.'" AS source, productPrice AS score, productTitle, productSlug, productPrice, productDescHTML, productID, "", "", ""
	            FROM '.PERCH_DB_PREFIX.'shop_products 
	            WHERE productStatus=\'Live\'
	                AND ( 
	                    productTitle REGEXP '.$db->pdb('[[:<:]]'.$key.'[[:>:]]').' 
                    OR  productDescRaw REGEXP '.$db->pdb('[[:<:]]'.$key.'[[:>:]]').'    
	                    ) ';
	    
	    return $sql;
    }
    
    public static function format_result($key, $options, $result)
    {
        $result['productTitle']    = $result['col1'];
        $result['productSlug']     = $result['col2'];
        $result['productPrice']    = $result['col3'];
        $result['productDescHTML'] = $result['col4'];
        $result['productID']       = $result['col5'];
        $result['_id']          = $result['col5'];
        
        $Settings   = PerchSettings::fetch();
        
        $html = PerchUtil::excerpt_char($result['productDescHTML'], $options['excerpt_chars'], true);
        // keyword highlight
        $html = preg_replace('/('.$key.')/i', '<span class="keyword">$1</span>', $html);
                        
        $match = array();
        
        $match['url']     = $Settings->get('perch_shop_product_url')->settingValue();
        self::$tmp_url_vars = $result;
        $match['url'] = preg_replace_callback('/{([A-Za-z0-9_\-]+)}/', array('self', "substitute_url_vars"), $match['url']);
        self::$tmp_url_vars = false;
        
        $match['title']   = $result['productTitle'];
        $match['excerpt'] = $html;
        $match['key']     = $key;
        return $match;
    }
    
    private static function substitute_url_vars($matches)
	{
	    $url_vars = self::$tmp_url_vars;
    	if (isset($url_vars[$matches[1]])){
    		return $url_vars[$matches[1]];
    	}
	}
    
}

?>