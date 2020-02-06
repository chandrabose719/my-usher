<?php
	class Industry_m extends MY_Model{
		
		protected $_TABLE = 'industry_details';	
		protected $_ID = 'industry_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>