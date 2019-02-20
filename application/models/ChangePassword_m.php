<?php
	class ChangePassword_m extends MY_Model{
		
		protected $_TABLE = 'change_password_details';	
		protected $_ID = 'change_password_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>