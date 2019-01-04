<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('location');
		$this->lang->load('locationIndia');
		
		// Model
		// $this->load->model('');

		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');
	}

	// India Page
	public function india(){
		$this->data['title'] = $this->lang->line('india_title');
		$this->data['description'] = $this->lang->line('india_description');
		$this->data['keyword'] = $this->lang->line('india_keyword');
		$this->data['body'] = 'location/india';
		$this->load->view("main_layout",$this->data);
	}
	
}

