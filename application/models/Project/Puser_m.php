<?php
	class PUser_m extends MY_Model{
		
		protected $_TABLE = 'project_user_details';	
		protected $_ID = 'user_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function insert_user_data($array){
	    	$this->db->insert($this->_TABLE, $array);
	    	return $this->db->insert_id();
	    }

	}
?>