<?php
	class Finishing_m extends MY_Model{
		
		protected $_TABLE = 'finishing_details';	
		protected $_ID = 'finishing_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>