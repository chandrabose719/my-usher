<?php
	class Design_m extends MY_Model{
		
		protected $_table = 'design_details';	
		protected $_id = 'design_id';	

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function get_ongoing_job(){
	    	$query = "SELECT * FROM design_details WHERE order_status = 'PROCESSING' OR order_status = 'ONGOING' OR order_status = 'SHIPPING' ORDER BY design_id DESC";
	    	$query = $this->db->query($query);
	        return $query->result();
	    }	    	

	    function get_completed_job(){
	    	$query = "SELECT * FROM design_details WHERE order_status = 'COMPLETED' OR order_status = 'CANCELLED' ORDER BY design_id DESC";
	        $query = $this->db->query($query);
	        return $query->result();
	    }

	}
?>