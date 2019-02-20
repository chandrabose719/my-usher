<?php
	class Newfeature_m extends MY_Model{
		
		protected $_TABLE = 'newfeature_details';	
		protected $_ID = 'newfeature_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>