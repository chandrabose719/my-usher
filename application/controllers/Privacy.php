<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('privacy/privacy');
		$this->lang->load('privacy/terms');
		
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');
		
	}

	// Home Page
	public function privacy_policy(){
		$this->data['title'] = $this->lang->line('privacy_title');
		$this->data['description'] = $this->lang->line('privacy_description');
		$this->data['keyword'] = $this->lang->line('privacy_keyword');
		$this->data['body'] = 'privacy/privacy_policy';
		$this->load->view("main_layout",$this->data);
	}

	// Start Project
	public function terms_of_use(){
		$this->data['title'] = $this->lang->line('terms_title');
		$this->data['description'] = $this->lang->line('terms_description');
		$this->data['keyword'] = $this->lang->line('terms_keyword');
		$this->data['body'] = 'privacy/terms_of_use';
		$this->load->view("main_layout",$this->data);
	}

}

