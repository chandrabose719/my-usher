<?php
	class Temperature_m extends MY_Model{
		
		protected $_table = 'temperature_details';	
		protected $_id = 'temperature_id';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>