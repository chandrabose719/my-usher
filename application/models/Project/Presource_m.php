<?php
	class PResource_m extends MY_Model{
		
		protected $_TABLE = 'project_resource_details';	
		protected $_ID = 'resource_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }

	}
?>