<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('resources/index');
		
		// Model
		// $this->load->model('');
		
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');
	}

	// Resources Page
	public function index(){
		$this->data['title'] = $this->lang->line('resources_title');
		$this->data['description'] = $this->lang->line('resources_description');
		$this->data['keyword'] = $this->lang->line('resources_keyword');
		$this->data['body'] = 'resources/index';
		$this->load->view("main_layout",$this->data);
	}

	// FDM Page
	public function fdm(){
		$this->data['title'] = $this->lang->line('fdm_title');
		$this->data['description'] = $this->lang->line('fdm_description');
		$this->data['keyword'] = $this->lang->line('fdm_keyword');
		$this->data['body'] = 'resources/fdm';
		$this->load->view("main_layout",$this->data);
	}

	// SLS Page
	public function sls(){
		$this->data['title'] = $this->lang->line('sls_title');
		$this->data['description'] = $this->lang->line('sls_description');
		$this->data['keyword'] = $this->lang->line('sls_keyword');
		$this->data['body'] = 'resources/sls';
		$this->load->view("main_layout",$this->data);
	}

}

