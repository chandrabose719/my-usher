<?php
	class Precision_m extends MY_Model{
		
		protected $_TABLE = 'precision_details';	
		protected $_ID = 'precision_id';	
		protected $_ORDER = 'desc';

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>