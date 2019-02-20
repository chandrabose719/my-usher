<?php
	class Blogupdate_m extends MY_Model{
		
		protected $_TABLE = 'blogupdate_details';	
		protected $_ID = 'blogupdate_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>