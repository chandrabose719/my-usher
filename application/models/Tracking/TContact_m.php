<?php
	class TContact_m extends MY_Model{
		
		protected $_TABLE = 'contact_details';	
		protected $_ID = 'contact_id';
		protected $_ORDER = 'asc';		

	    function __construct() {
	        parent::__construct();
	        
	    	// Load Admin Database
        	$this->db = $this->load->database('admin_db', TRUE);

	    }

	}
?>