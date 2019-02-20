<?php
	class Subscription_m extends MY_Model{
		
		protected $_TABLE = 'subscription_details';	
		protected $_ID = 'subscription_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>