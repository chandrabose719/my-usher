<?php
	class MJob_m extends MY_Model{
		
		protected $_table = 'job_details';	
		protected $_id = 'job_id';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('partner_db', TRUE);
	        
	    }

	}
?>