<?php
	class PostProcess_m extends MY_Model{
		
		protected $_TABLE = 'post_process_details';	
		protected $_ID = 'post_process_id';	
		protected $_ORDER = 'desc';

	    function __construct() {
	        parent::__construct();
	        
	    }
	}
?>