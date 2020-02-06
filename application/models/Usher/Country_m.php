<?php
	class Country_m extends MY_Model{
		
		protected $_TABLE = 'country_details';	
		protected $_ID = 'country_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>