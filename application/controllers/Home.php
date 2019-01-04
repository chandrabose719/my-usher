<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('home');
		$this->lang->load('about');
		$this->lang->load('resources');
		$this->lang->load('faq');
		$this->lang->load('contact');
		
		// Model
		// $this->load->model('');
	}

	// Home Page
	public function index(){
		$this->data['title'] = $this->lang->line('home_title');
		$this->data['description'] = $this->lang->line('home_description');
		$this->data['keyword'] = $this->lang->line('home_keyword');
		$this->data['body'] = 'home/index';
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

	// Resources Page
	public function resources(){
		$this->data['title'] = $this->lang->line('resources_title');
		$this->data['description'] = $this->lang->line('resources_description');
		$this->data['keyword'] = $this->lang->line('resources_keyword');
		$this->data['body'] = 'home/resources';
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

