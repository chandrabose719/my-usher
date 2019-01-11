<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('blog/index');
		
		// Model
		// $this->load->model('');

		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');
	}

	// Blog Page
	public function index(){
		$this->data['title'] = $this->lang->line('blog_title');
		$this->data['description'] = $this->lang->line('blog_description');
		$this->data['keyword'] = $this->lang->line('blog_keyword');
		$this->data['body'] = 'blog/index';
		$this->load->view("main_layout",$this->data);
	}

	// Blog Detail Page
	public function customized_keychain(){
		$this->data['title'] = $this->lang->line('keychain_title');
		$this->data['description'] = $this->lang->line('keychain_description');
		$this->data['keyword'] = $this->lang->line('keychain_keyword');
		$this->data['body'] = 'blog/customized_keychain';
		$this->load->view("main_layout",$this->data);
	}

}

