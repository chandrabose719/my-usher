<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('home/index');
		$this->lang->load('home/about');
		$this->lang->load('home/faq');
		$this->lang->load('home/contact');
		$this->lang->load('home/project');
		
		// Model
		// $this->load->model('');
	
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');
		
	}

	// Home Page
	public function index(){
		$this->data['title'] = $this->lang->line('home_title');
		$this->data['description'] = $this->lang->line('home_description');
		$this->data['keyword'] = $this->lang->line('home_keyword');
		$this->data['body'] = 'home/index';
		$this->load->view("main_layout",$this->data);
	}

	// Start Project
	public function start_project(){
		$this->data['title'] = $this->lang->line('project_title');
		$this->data['description'] = $this->lang->line('project_description');
		$this->data['keyword'] = $this->lang->line('project_keyword');
		$this->data['body'] = 'home/start_project';
		$this->load->view("main_layout",$this->data);
	}

	// About Us Page
	public function about_us(){
		$this->data['title'] = $this->lang->line('about_title');
		$this->data['description'] = $this->lang->line('about_description');
		$this->data['keyword'] = $this->lang->line('about_keyword');
		$this->data['body'] = 'home/about_us';
		$this->load->view("main_layout",$this->data);
	}

	// FAQ Page
	public function faq(){
		$this->data['title'] = $this->lang->line('faq_title');
		$this->data['description'] = $this->lang->line('faq_description');
		$this->data['keyword'] = $this->lang->line('faq_keyword');
		$this->data['body'] = 'home/faq';
		$this->load->view("main_layout",$this->data);
	}

	// Contact Us Page
	public function contact_us(){
		$this->data['title'] = $this->lang->line('contact_title');
		$this->data['description'] = $this->lang->line('contact_description');
		$this->data['keyword'] = $this->lang->line('contact_keyword');
		$this->data['body'] = 'home/contact_us';
		$this->load->view("main_layout",$this->data);
	}

}

