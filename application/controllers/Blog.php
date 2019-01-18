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
    // Blog Detail page
	public function personalized_jewelry(){
		$this->data['title'] = $this->lang->line('jewelry_title');
		$this->data['description'] = $this->lang->line('jewelry_description');
		$this->data['keyword'] = $this->lang->line('jewelry_keyword');
		$this->data['body'] = 'blog/personalized_jewelry';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function dental_implants(){
		$this->data['title'] = $this->lang->line('implants_title');
		$this->data['description'] = $this->lang->line('implants_description');
		$this->data['keyword'] = $this->lang->line('implants_keyword');
		$this->data['body'] = 'blog/dental_implants';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function customized_miniatures(){
		$this->data['title'] = $this->lang->line('miniatures_title');
		$this->data['description'] = $this->lang->line('miniatures_description');
		$this->data['keyword'] = $this->lang->line('miniatures_keyword');
		$this->data['body'] = 'blog/customized_miniatures';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function deathly_hallows(){
		$this->data['title'] = $this->lang->line('hallows_title');
		$this->data['description'] = $this->lang->line('hallows_description');
		$this->data['keyword'] = $this->lang->line('hallows_keyword');
		$this->data['body'] = 'blog/deathly_hallows';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function injection_molding(){
		$this->data['title'] = $this->lang->line('molding_title');
		$this->data['description'] = $this->lang->line('molding_description');
		$this->data['keyword'] = $this->lang->line('molding_keyword');
		$this->data['body'] = 'blog/injection_molding';
		$this->load->view("main_layout",$this->data);
	}
    // Blog Detail page
	public function personalized_gifts(){
		$this->data['title'] = $this->lang->line('gifts_title');
		$this->data['description'] = $this->lang->line('gifts_description');
		$this->data['keyword'] = $this->lang->line('gifts_keyword');
		$this->data['body'] = 'blog/personalized_gifts';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function printing_3d(){
		$this->data['title'] = $this->lang->line('printing_title');
		$this->data['description'] = $this->lang->line('printing_description');
		$this->data['keyword'] = $this->lang->line('printing_keyword');
		$this->data['body'] = 'blog/printing_3d';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function prosthetic_limbs(){
		$this->data['title'] = $this->lang->line('limbs_title');
		$this->data['description'] = $this->lang->line('limbs_description');
		$this->data['keyword'] = $this->lang->line('limbs_keyword');
		$this->data['body'] = 'blog/prosthetic_limbs';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function automotive_car(){
		$this->data['title'] = $this->lang->line('car_title');
		$this->data['description'] = $this->lang->line('car_description');
		$this->data['keyword'] = $this->lang->line('car_keyword');
		$this->data['body'] = 'blog/automotive_car';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function rapid_prototyping(){
		$this->data['title'] = $this->lang->line('prototyping_title');
		$this->data['description'] = $this->lang->line('prototyping_description');
		$this->data['keyword'] = $this->lang->line('prototyping_keyword');
		$this->data['body'] = 'blog/rapid_prototyping';
		$this->load->view("main_layout",$this->data);
	}
	// Blog Detail page
	public function silicon_mold(){
		$this->data['title'] = $this->lang->line('mold_title');
		$this->data['description'] = $this->lang->line('mold_description');
		$this->data['keyword'] = $this->lang->line('mold_keyword');
		$this->data['body'] = 'blog/silicon_mold';
		$this->load->view("main_layout",$this->data);
	}

}

