<?php
	class Usher_m extends MY_Model{
		
		protected $_table = 'users_details';	
		protected $_id = 'user_id';	

	    function __construct() {
	        parent::__construct();
	        
	    }

	    // get Pagination Data
	    function get_pagination_data($array){
	        $query = $this->db->get($this->_table, $array['per_page'], $array['page']);
	        return $query->result();
	    }

	}
?>