<?php
	class LayerHeight_m extends MY_Model{
		
		protected $_TABLE = 'layer_height_details';	
		protected $_ID = 'layer_height_id';
		protected $_ORDER = 'desc';		

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>