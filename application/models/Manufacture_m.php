<?php
	class Manufacture_m extends MY_Model{
		
		protected $_table = 'file_details';	
		protected $_id = 'file_id';	

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function get_ongoing_job(){
	    	$query = "SELECT * FROM file_details WHERE file_status = 'PROCESSING' OR file_status = 'ONGOING' OR file_status = 'SHIPPING' ORDER BY file_id DESC";
	    	$query = $this->db->query($query);
	        return $query->result();
	    }	    	

	    function get_completed_job(){
	    	$query = "SELECT * FROM file_details WHERE file_status = 'COMPLETED' OR file_status = 'CANCELLED' ORDER BY file_id DESC";
	        $query = $this->db->query($query);
	        return $query->result();
	    }

	}
?>