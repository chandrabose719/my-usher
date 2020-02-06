<?php
	class CDetails_m extends MY_Model{
		
		protected $_TABLE = 'calc_details';	
		protected $_ID = 'calc_id';
		protected $_ORDER = 'asc';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('admin_db', TRUE);
	        
	    }
	    
	}
?>