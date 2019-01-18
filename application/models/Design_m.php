<?php
	class Design_m extends MY_Model{
		
		protected $_TABLE = 'design_details';	
		protected $_ID = 'design_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function insert_design_data($design_array){
	    	$this->db->insert('design_details', $design_array);
	    	return $this->db->insert_id();
	    }

	    function get_order_id(){
	    	$query = "SELECT * FROM design_details WHERE MONTH(FROM_UNIXTIME(design_date)) = MONTH(CURDATE()) AND YEAR(FROM_UNIXTIME(design_date))= YEAR(CURDATE())";
	        $query = $this->db->query($query);
	    	return $query->num_rows();
	    }

	    // function get_ongoing_job(){
	    // 	$query = "SELECT * FROM design_details WHERE order_status = 'PROCESSING' OR order_status = 'ONGOING' OR order_status = 'SHIPPING' ORDER BY design_id DESC";
	    // 	$query = $this->db->query($query);
	    //     return $query->result();
	    // }	    	

	    // function get_completed_job(){
	    // 	$query = "SELECT * FROM design_details WHERE order_status = 'COMPLETED' OR order_status = 'CANCELLED' ORDER BY design_id DESC";
	    //     $query = $this->db->query($query);
	    //     return $query->result();
	    // }

	}
?>