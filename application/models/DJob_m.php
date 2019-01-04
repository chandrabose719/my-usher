<?php
	class DJob_m extends MY_Model{
		
		protected $_table = 'design_job_details';	
		protected $_id = 'design_job_id';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('partner_db', TRUE);
	        
	    }

	    function get_complete_job($partner_id){
	        $query = $this->db->query("SELECT * FROM design_job_details WHERE partner_id = '$partner_id' AND ( order_status = 'SHIPPING' OR order_status = 'COMPLETED' ) ORDER BY design_job_id DESC");
	        return $query->result();
	    }

	    function design_job_count($partner_id){
	        $query = $this->db->query("SELECT * FROM design_job_details WHERE partner_id = '$partner_id' AND ( job_status = 'STARTED' OR job_status = 'COMPLETED' ) ORDER BY design_job_id DESC");
	        return $query->num_rows();
	    }

	}
?>