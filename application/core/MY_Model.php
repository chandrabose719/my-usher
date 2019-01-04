<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	protected $_table = '';
	protected $_id = '';

    function __construct() {
        parent::__construct();
    }

    // Get Data
    function get($array = NULL, $single = FALSE){
    	if ($array == NULL && $single == FALSE) {
    		$this->db->order_by($this->_id, "desc");
    		$query = $this->db->get($this->_table);
			$result = $query->result();
			if (!empty($result)) {
				return $result;
			}else{
				return FALSE;
			}
		}
		if ($array != NULL && $single == FALSE) {
			$this->db->order_by($this->_id, "desc");
			$query = $this->db->get_where($this->_table, $array);
			$result = $query->result();
			if (!empty($result)) {
				return $result;
			}else{
				return FALSE;
			}
		}
		if ($array != NULL && $single != FALSE) {
			$query = $this->db->get_where($this->_table, $array);
			$res = $query->result();
			if (!empty($res)) {
				$result = $res[0];
				return $result;
			}else{
				return FALSE;
			}
		}
	}

	// Insert Data
    function insert($array){
		$query = $this->db->insert($this->_table, $array);
		return $query;
	}

	// Update Data
    function update($array, $id_array){
		$this->db->where($id_array);
		$query = $this->db->update($this->_table, $array);
		return $query;
	}

	// Delete Data
    function delete($array){
		$query = $this->db->delete($this->_table, $array);
		return $query;
	}

	// Count Record
	function count($array = NULL){
		$query = $this->db->get_where($this->_table, $array);
		return $query->num_rows();
	}
}