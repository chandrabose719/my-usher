<?php
	class Assembly_m extends MY_Model{
		
		protected $_TABLE = 'assembly_details';	
		protected $_ID = 'assembly_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>