<?php
	class Testorder_m extends MY_Model{
		
		protected $_TABLE = 'test_orders';	
		protected $_ID = 'order_id';	
		protected $_ORDER = 'desc';

	    function __construct() {
	        parent::__construct();
	        
	    }

	    function get_order($user_id){
	    	
	    	$this->db->where('user_id', $user_id);
	    	$this->db->group_start();
			$this->db->or_where('order_status','REQUESTING');
			$this->db->or_where('order_status','PAYMENT');
			$this->db->group_end();
			$this->db->order_by('order_id', $this->_ORDER);
			$query = $this->db->get($this->_TABLE);
			return $query->result();
	    }

	    function get_order_id(){
	    	$query = "SELECT * FROM test_orders WHERE MONTH(FROM_UNIXTIME(order_date)) = MONTH(CURDATE()) AND YEAR(FROM_UNIXTIME(order_date))= YEAR(CURDATE())";
	        $query = $this->db->query($query);
	    	return $query->num_rows();
	    }

	}
?>