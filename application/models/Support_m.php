<?php
	class Support_m extends MY_Model{
		
		protected $_table = 'support_details';	
		protected $_id = 'support_id';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('partner_db', TRUE);
	        
	    }
	}
?>