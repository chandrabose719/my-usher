<?php
	class Temperature_m extends MY_Model{
		
		protected $_TABLE = 'temperature_details';	
		protected $_ID = 'temperature_id';
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>