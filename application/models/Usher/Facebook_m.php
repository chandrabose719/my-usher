<?php
	class Facebook_m extends MY_Model{
		
		protected $_TABLE = 'facebook_details';	
		protected $_ID = 'facebook_auth_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }

	}
?>