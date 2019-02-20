<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industry extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('industry/industry');
		
		// Model
		// $this->load->model('');

		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');
	}

	// Aerospace Page
	public function aerospace(){
		$this->data['title'] = $this->lang->line('aerospace_title');
		$this->data['description'] = $this->lang->line('aerospace_description');
		$this->data['keyword'] = $this->lang->line('aerospace_keyword');
		$this->data['body'] = 'industry/aerospace';
		$this->load->view("main_layout",$this->data);
	}

	// Architecture Page
	public function architecture(){
		$this->data['title'] = $this->lang->line('architecture_title');
		$this->data['description'] = $this->lang->line('architecture_description');
		$this->data['keyword'] = $this->lang->line('architecture_keyword');
		$this->data['body'] = 'industry/architecture';
		$this->load->view("main_layout",$this->data);
	}

	// Automotive Page
	public function automotive(){
		$this->data['title'] = $this->lang->line('automotive_title');
		$this->data['description'] = $this->lang->line('automotive_description');
		$this->data['keyword'] = $this->lang->line('automotive_keyword');
		$this->data['body'] = 'industry/automotive';
		$this->load->view("main_layout",$this->data);
	}

	// Education Page
	public function education(){
		$this->data['title'] = $this->lang->line('education_title');
		$this->data['description'] = $this->lang->line('education_description');
		$this->data['keyword'] = $this->lang->line('education_keyword');
		$this->data['body'] = 'industry/education';
		$this->load->view("main_layout",$this->data);
	}

	// Gifting Page
	public function gifting(){
		$this->data['title'] = $this->lang->line('gifting_title');
		$this->data['description'] = $this->lang->line('gifting_description');
		$this->data['keyword'] = $this->lang->line('gifting_keyword');
		$this->data['body'] = 'industry/gifting';
		$this->load->view("main_layout",$this->data);
	}

	// Manufacturing Page
	public function manufacturing(){
		$this->data['title'] = $this->lang->line('manufacturing_title');
		$this->data['description'] = $this->lang->line('manufacturing_description');
		$this->data['keyword'] = $this->lang->line('manufacturing_keyword');
		$this->data['body'] = 'industry/manufacturing';
		$this->load->view("main_layout",$this->data);
	}

	// Medtech Page
	public function medtech(){
		$this->data['title'] = $this->lang->line('medtech_title');
		$this->data['description'] = $this->lang->line('medtech_description');
		$this->data['keyword'] = $this->lang->line('medtech_keyword');
		$this->data['body'] = 'industry/medtech';
		$this->load->view("main_layout",$this->data);
	}

	// Product Design Research Page
	public function product_design_research(){
		$this->data['title'] = $this->lang->line('product_design_title');
		$this->data['description'] = $this->lang->line('product_design_description');
		$this->data['keyword'] = $this->lang->line('product_design_keyword');
		$this->data['body'] = 'industry/product_design_research';
		$this->load->view("main_layout",$this->data);
	}

}

