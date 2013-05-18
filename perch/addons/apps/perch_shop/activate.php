<?php
    // Prevent running directly:
    if (!defined('PERCH_DB_PREFIX')) exit;

    // Let's go
    $sql = "
    CREATE TABLE IF NOT EXISTS `__PREFIX__shop_products` (
      `productID` int(11) NOT NULL AUTO_INCREMENT,
      `productCode` varchar(255) NOT NULL DEFAULT '',
      `productTitle` varchar(255) NOT NULL DEFAULT '',
      `productSlug` varchar(255) NOT NULL DEFAULT '',
      `productDescRaw` text DEFAULT '',
      `productDescHTML` text DEFAULT '',
      `productDynamicFields` text DEFAULT '',
      `productStatus` enum('Live','Draft') NOT NULL DEFAULT 'Live',
      `productCount` INT(10),
      `productPrice` DECIMAL(8,2),
      PRIMARY KEY (`productID`),
      FULLTEXT KEY `idx_search` (`productTitle`,`productDescRaw`)
    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
    
    CREATE TABLE IF NOT EXISTS `__PREFIX__shop_categories` (
      `categoryID` int(11) NOT NULL AUTO_INCREMENT,
      `categoryTitle` varchar(255) NOT NULL DEFAULT '',
      `categorySlug` varchar(255) NOT NULL DEFAULT '',
      PRIMARY KEY (`categoryID`),
      KEY `idx_slug` (`categorySlug`)
    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
    
    CREATE TABLE IF NOT EXISTS `__PREFIX__shop_products_to_categories` (
      `productID` int(11) NOT NULL DEFAULT '0',
      `categoryID` int(11) NOT NULL DEFAULT '0',
      PRIMARY KEY (`productID`,`categoryID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;
    
    CREATE TABLE IF NOT EXISTS `__PREFIX__shop_product_options` (
      `optionID` int(11) NOT NULL AUTO_INCREMENT,
      `productID` int(11) NOT NULL DEFAULT '0',
      `optionKey` varchar(255) NOT NULL DEFAULT '',
      `optionValues` text DEFAULT '',
      PRIMARY KEY (`optionID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
    
    CREATE TABLE IF NOT EXISTS `__PREFIX__shop_log` (
      `logID` int(11) NOT NULL AUTO_INCREMENT,
      `logData` text DEFAULT '',
      `logDateTime` datetime,
      `logTransaction` varchar(255) DEFAULT '',
      `logVerify` varchar(255) DEFAULT '',
      PRIMARY KEY (`logID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
    
    CREATE TABLE IF NOT EXISTS `__PREFIX__shop_orders` (
      `orderID` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `orderTxnID` varchar(32) DEFAULT NULL,
      `orderDate` datetime DEFAULT NULL,
      `orderPayerEmail` varchar(255) DEFAULT NULL,
      `orderPayerID` varchar(64) DEFAULT NULL,
      `orderPaymentStatus` varchar(64) DEFAULT NULL,
      `orderCurrency` char(3) NOT NULL,
      `orderFee` float(10,2) NOT NULL DEFAULT '0.00',
      `orderTax` float(10,2) NOT NULL DEFAULT '0.00',
      `orderShipping` float(10,2) NOT NULL DEFAULT '0.00',
      `orderTotal` float(10,2) NOT NULL DEFAULT '0.00',
      `orderTotalItems` int(10) unsigned NOT NULL DEFAULT '0',
      `orderFirstName` varchar(255) DEFAULT NULL,
      `orderLastName` varchar(255) DEFAULT NULL,
      `orderAddressName` varchar(255) DEFAULT NULL,
      `orderAddressStreet` varchar(255) DEFAULT NULL,
      `orderAddressCity` varchar(255) DEFAULT NULL,
      `orderAddressState` varchar(255) DEFAULT NULL,
      `orderAddressCountry` varchar(255) DEFAULT NULL,
      `orderAddressZIP` varchar(255) DEFAULT NULL,
      `orderItems` text,
      `orderStatus` enum('New','Dispatched') NOT NULL DEFAULT 'New',
      PRIMARY KEY (`orderID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
  
    ";
    
    $sql = str_replace('__PREFIX__', PERCH_DB_PREFIX, $sql);
    
    $statements = explode(';', $sql);
    foreach($statements as $statement) {
        $statement = trim($statement);
        if ($statement!='') $this->db->execute($statement);
    }


    $API = new PerchAPI(1.0, 'perch_shop');
    $UserPrivileges = $API->get('UserPrivileges');
    $UserPrivileges->create_privilege('perch_shop', 'Access shop');
    $UserPrivileges->create_privilege('perch_shop.categories.manage', 'Manage categories');


        
    $sql = 'SHOW TABLES LIKE "'.$this->table.'"';
    $result = $this->db->get_value($sql);
    
    return $result;

?>