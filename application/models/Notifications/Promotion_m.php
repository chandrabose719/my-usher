<?php
	class Promotion_m extends MY_Model{
		
		protected $_TABLE = 'promotion_details';	
		protected $_ID = 'promotion_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>