<?php
	class ITechnology_m extends MY_Model{
		
		protected $_TABLE = 'technology_details';	
		protected $_ID = 'technology_id';	
		protected $_ORDER = 'asc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>