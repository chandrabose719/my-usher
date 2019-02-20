<?php
	class Event_m extends MY_Model{
		
		protected $_TABLE = 'event_details';	
		protected $_ID = 'event_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>