<?php
	class Google_m extends MY_Model{
		
		protected $_TABLE = 'google_details';	
		protected $_ID = 'google_auth_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }

	}
?>