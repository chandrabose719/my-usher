<?php
	class Testmanu_m extends MY_Model{
		
		protected $_TABLE = 'test_files';	
		protected $_ID = 'file_id';
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function insert_file_data($file_array){
	    	$this->db->insert('test_files', $file_array);
	    	return $this->db->insert_id();
	    }

	}
?>