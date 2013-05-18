<?php

    define('PERCH_LICENSE_KEY', 'P21303-BAM624-JNF799-ESF692-UUG001');

    define("PERCH_DB_USERNAME", 'sfls_admin');
    define("PERCH_DB_PASSWORD", 'h4u4n4d4');
    define("PERCH_DB_SERVER", "localhost");
    define("PERCH_DB_DATABASE", "SFLS_2013");
    define("PERCH_DB_PREFIX", "perch2_");
    
    define('PERCH_TZ', 'GB');

    define('PERCH_EMAIL_METHOD', 'smtp');
    define('PERCH_EMAIL_HOST', 'mail.sfls.org.uk');
    define('PERCH_EMAIL_AUTH', true);
    define('PERCH_EMAIL_USERNAME', 'website@sfls.org.uk');
    define('PERCH_EMAIL_PASSWORD', 'h4u4n4d4');
    
    define('PERCH_EMAIL_FROM', 'website@sfls.org.uk');
    define('PERCH_EMAIL_FROM_NAME', 'Webmaster');

    define('PERCH_LOGINPATH', '/perch');
    define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', dirname(__FILE__)));
    define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');

    define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
    define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');
    
    define('PERCH_HTML5', true);

    define('PERCH_DEBUG', true);
  
?>