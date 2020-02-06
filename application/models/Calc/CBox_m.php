<?php
	class CBox_m extends MY_Model{
		
		protected $_TABLE = 'box_details';	
		protected $_ID = 'box_id';
		protected $_ORDER = 'asc';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('admin_db', TRUE);
	        
	    }
	    
	}
?>