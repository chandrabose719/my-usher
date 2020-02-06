<?php
	class IAnswer_m extends MY_Model{
		
		protected $_TABLE = 'answer_details';	
		protected $_ID = 'answer_id';	
		protected $_ORDER = 'asc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>