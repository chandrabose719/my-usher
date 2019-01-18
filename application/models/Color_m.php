<?php
	class Color_m extends MY_Model{
		
		protected $_TABLE = 'color_details';	
		protected $_ID = 'color_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>