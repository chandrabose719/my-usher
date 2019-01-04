<?php
	class Machine_m extends MY_Model{
		
		protected $_table = 'machine_details';	
		protected $_id = 'machine_id';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('partner_db', TRUE);
	        
	    }
	}
?>