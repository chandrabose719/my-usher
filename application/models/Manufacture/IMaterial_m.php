<?php
	class IMaterial_m extends MY_Model{
		
		protected $_TABLE = 'instant_material';	
		protected $_ID = 'material_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>