<?php

class PerchGallery_ImageVersions extends PerchAPI_Factory
{
    protected $table     = 'gallery_image_versions';
	protected $pk        = 'versionID';
	protected $singular_classname = 'PerchGallery_ImageVersion';
	
	private $version_cache = array();
	
	public $static_fields   = array('versionPath', 'versionHeight', 'versionWidth', 'versionKey');
    
    function __construct($api=false) 
    {
        $this->cache = array();
        parent::__construct($api);
    }
    
    /**
     * Preload and cache images for the entire album, saving db calls
     *
     * @param string $albumID 
     * @return void
     * @author Drew McLellan
     */
    public function preload_for_album($albumID) 
    {
        $sql = 'SELECT v.* FROM '.$this->table.' v, '.PERCH_DB_PREFIX.'gallery_images i WHERE v.imageID=i.imageID AND i.albumID='.$this->db->pdb($albumID);
        $rows = $this->db->get_rows($sql);
        
        $cache = array();
        
        if (PerchUtil::count($rows)) {
            foreach($rows as $row) {
                if (!isset($cache[$row['imageID']])) $cache[$row['imageID']] = array();
                $cache[$row['imageID']][] = $row;
            }
        }
        
        $this->version_cache = $cache;
    }
    
    public function preload_all()
    {
        $sql = 'SELECT * FROM '.$this->table;
        $rows = $this->db->get_rows($sql);
        
        $cache = array();
        
        if (PerchUtil::count($rows)) {
            foreach($rows as $row) {
                if (!isset($cache[$row['imageID']])) $cache[$row['imageID']] = array();
                $cache[$row['imageID']][] = $row;
            }
        }
        
        $this->version_cache = $cache;
    }
    
    /**
     * 
     * get the image versions for this image
     * @param int $setID
     */
    public function get_for_image($imageID) {
        
        if (array_key_exists($imageID, $this->version_cache)) {
            $rows = $this->version_cache[$imageID];
        }else{
            $sql = 'SELECT * FROM '.PERCH_DB_PREFIX.'gallery_image_versions WHERE imageID = '.$imageID;
        	$rows = $this->db->get_rows($sql);
        }
	    
        if(is_array($rows)) {
            $r = $this->return_instances($rows);
            return $r;
        }
    
        return false;
    	
    }
    
    
	/**
     * 
     * get an image object by its key
     * @param string versionKey
     */
    public function get_by_key($imageID, $versionKey) {
    	
    	if (array_key_exists($imageID, $this->version_cache)) {
            $image_row = $this->version_cache[$imageID];
            if (PerchUtil::count($image_row)) {
                foreach($image_row as $row) {
                    if ($row['versionKey'] == $versionKey) break;
                }
            }
        }else{
            $sql = 'SELECT * FROM '.PERCH_DB_PREFIX.'gallery_image_versions WHERE imageID='.$imageID.' AND versionKey = '.$this->db->pdb($versionKey);
        	$row = $this->db->get_row($sql);
        }
        
        if(is_array($row)) {
            $r = $this->return_instance($row);
            return $r;
        }
        
        return false;
    	
    }
    
}

?>
