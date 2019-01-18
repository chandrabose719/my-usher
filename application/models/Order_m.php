<?php
	class Order_m extends MY_Model{
		
		protected $_TABLE = 'order_details';	
		protected $_ID = 'order_id';	
		protected $_ORDER = 'desc';

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function get_order_id(){
	    	$query = "SELECT * FROM order_details WHERE MONTH(FROM_UNIXTIME(order_date)) = MONTH(CURDATE()) AND YEAR(FROM_UNIXTIME(order_date))= YEAR(CURDATE())";
	        $query = $this->db->query($query);
	    	return $query->num_rows();
	    }

	}
?>