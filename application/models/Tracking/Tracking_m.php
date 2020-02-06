<?php
	class Tracking_m extends MY_Model{
		
		protected $_TABLE = 'tracking_details';	
		protected $_ID = 'tracking_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    	// Load Admin Database
        	$this->db = $this->load->database('admin_db', TRUE);

	    }

	    function insert_tracking_data($array){
	    	$this->db->insert($this->_TABLE, $array);
	    	return $this->db->insert_id();
	    }

	}
?>