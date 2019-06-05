<?php
	class Project_m extends MY_Model{
		
		protected $_TABLE = 'project_details';	
		protected $_ID = 'project_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function insert_project_data($array){
	    	$this->db->insert($this->_TABLE, $array);
	    	return $this->db->insert_id();
	    }

	}
?>