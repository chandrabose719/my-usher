<?php
	class Technical_m extends MY_Model{
		
		protected $_TABLE = 'technical_details';	
		protected $_ID = 'technical_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>