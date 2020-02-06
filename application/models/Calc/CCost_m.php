<?php
	class CCost_m extends MY_Model{
		
		protected $_TABLE = 'calc_cost';	
		protected $_ID = 'cost_id';
		protected $_ORDER = 'desc';	

	    function __construct() {
	        parent::__construct();

	        // Load Partner Database
        	$this->db = $this->load->database('admin_db', TRUE);
	        
	    }

	    function get_cost($array){
	    	$this->db->group_start();
			$this->db->or_where('weight', $array['num_weight']);
			$this->db->or_where('weight', $array['deci_weight']);
			$this->db->group_end();
			$query = $this->db->get($this->_TABLE);
			$res = $query->result();
	    	if(!empty($res)){
	    		$result = $res[0];
	    		return $result;
	    	}else{
	    		return FALSE;
	    	}
	    }

	    function get_last_row(){
	    	$this->db->select('*');
    		$this->db->from($this->_TABLE);
    		$this->db->order_by($this->_ID, $this->_ORDER);
    		$this->db->limit(1);
    		$query = $this->db->get();
    		$res = $query->result();
			if (!empty($res)) {
				$result = $res[0];
				return $result;
			}else{
				return FALSE;
			}
	    }
	    
	}
?>