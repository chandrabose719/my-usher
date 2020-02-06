<?php
	class Usher_m extends MY_Model{
		
		protected $_TABLE = 'user_details';	
		protected $_ID = 'user_id';	
		protected $_ORDER = 'desc';

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