<?php
	class Admin_m extends MY_Model{
		
		protected $_table = 'admin_details';	
		protected $_id = 'admin_id';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('partner_db', TRUE);
	        
	    }

	    // get Pagination Data
	    function get_pagination_data($array){
	        $query = $this->db->get($this->_table, $array['per_page'], $array['page']);
	        return $query->result();
	    }
	    
	}
?>