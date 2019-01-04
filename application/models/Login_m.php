<?php
	class Login_m extends MY_Model{
		
		protected $_table = 'admin_details';	
		protected $_id = 'admin_id';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('partner_db', TRUE);
	        
	    }

	    // Login
	    function login($array){
			$this->db->where('admin_email', $array['admin_email']);
			$this->db->where('admin_password', $array['admin_password']);
			$query = $this->db->get('admin_details');
			if ($query->num_rows() == 1 ) {
				return true;
			}
			else{
				return false;
			}
		}
	}
?>