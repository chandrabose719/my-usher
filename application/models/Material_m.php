<?php
	class Material_m extends MY_Model{
		
		protected $_TABLE = 'material_details';	
		protected $_ID = 'material_id';	
		protected $_ORDER = 'desc';

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>