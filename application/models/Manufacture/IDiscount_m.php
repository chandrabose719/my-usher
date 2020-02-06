<?php
	class IDiscount_m extends MY_Model{
		
		protected $_TABLE = 'discount_details';	
		protected $_ID = 'discount_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	    
	}
?>