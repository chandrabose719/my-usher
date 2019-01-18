<?php
	class DMaterial_m extends MY_Model{
		
		protected $_TABLE = 'design_material_details';	
		protected $_ID = 'design_material_id';	
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>