<?php
	class IConfig_m extends MY_Model{
		
		protected $_TABLE = 'config_details';	
		protected $_ID = 'config_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>