<?php
	class IQuestion_m extends MY_Model{
		
		protected $_TABLE = 'question_details';	
		protected $_ID = 'question_id';	
		protected $_ORDER = 'asc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>