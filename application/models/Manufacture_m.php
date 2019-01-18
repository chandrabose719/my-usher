<?php
	class Manufacture_m extends MY_Model{
		
		protected $_TABLE = 'file_details';	
		protected $_ID = 'file_id';
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function insert_file_data($file_array){
	    	$this->db->insert('file_details', $file_array);
	    	return $this->db->insert_id();
	    }

	    // function get_ongoing_job(){
	    // 	$query = "SELECT * FROM file_details WHERE file_status = 'PROCESSING' OR file_status = 'ONGOING' OR file_status = 'SHIPPING' ORDER BY file_id DESC";
	    // 	$query = $this->db->query($query);
	    //     return $query->result();
	    // }	    	

	    // function get_completed_job(){
	    // 	$query = "SELECT * FROM file_details WHERE file_status = 'COMPLETED' OR file_status = 'CANCELLED' ORDER BY file_id DESC";
	    //     $query = $this->db->query($query);
	    //     return $query->result();
	    // }

	}
?>