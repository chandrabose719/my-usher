<?php
	class Order_m extends MY_Model{
		
		protected $_table = 'order_details';	
		protected $_id = 'order_id';	

	    function __construct() {
	        parent::__construct();
	        
	    }

	}
?>