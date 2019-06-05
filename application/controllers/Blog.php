<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('blog/index');
		
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

	public function customized_keychain(){
		$this->data['title'] = $this->lang->line('keychain_title');
		$this->data['description'] = $this->lang->line('keychain_description');
		$this->data['keyword'] = $this->lang->line('keychain_keyword');
		$this->data['body'] = 'blog/customized_keychain';
		$this->load->view("main_layout",$this->data);
	}
    
    public function personalized_jewelry(){
		$this->data['title'] = $this->lang->line('jewelry_title');
		$this->data['description'] = $this->lang->line('jewelry_description');
		$this->data['keyword'] = $this->lang->line('jewelry_keyword');
		$this->data['body'] = 'blog/personalized_jewelry';
		$this->load->view("main_layout",$this->data);
	}
	
	public function dental_implants(){
		$this->data['title'] = $this->lang->line('implants_title');
		$this->data['description'] = $this->lang->line('implants_description');
		$this->data['keyword'] = $this->lang->line('implants_keyword');
		$this->data['body'] = 'blog/dental_implants';
		$this->load->view("main_layout",$this->data);
	}
	
	public function customized_miniatures(){
		$this->data['title'] = $this->lang->line('miniatures_title');
		$this->data['description'] = $this->lang->line('miniatures_description');
		$this->data['keyword'] = $this->lang->line('miniatures_keyword');
		$this->data['body'] = 'blog/customized_miniatures';
		$this->load->view("main_layout",$this->data);
	}
	
	public function deathly_hallows(){
		$this->data['title'] = $this->lang->line('hallows_title');
		$this->data['description'] = $this->lang->line('hallows_description');
		$this->data['keyword'] = $this->lang->line('hallows_keyword');
		$this->data['body'] = 'blog/deathly_hallows';
		$this->load->view("main_layout",$this->data);
	}
	
	public function injection_molding(){
		$this->data['title'] = $this->lang->line('molding_title');
		$this->data['description'] = $this->lang->line('molding_description');
		$this->data['keyword'] = $this->lang->line('molding_keyword');
		$this->data['body'] = 'blog/injection_molding';
		$this->load->view("main_layout",$this->data);
	}
    
    public function personalized_gifts(){
		$this->data['title'] = $this->lang->line('gifts_title');
		$this->data['description'] = $this->lang->line('gifts_description');
		$this->data['keyword'] = $this->lang->line('gifts_keyword');
		$this->data['body'] = 'blog/personalized_gifts';
		$this->load->view("main_layout",$this->data);
	}
	
	public function printing_3d(){
		$this->data['title'] = $this->lang->line('printing_title');
		$this->data['description'] = $this->lang->line('printing_description');
		$this->data['keyword'] = $this->lang->line('printing_keyword');
		$this->data['body'] = 'blog/printing_3d';
		$this->load->view("main_layout",$this->data);
	}
	
	public function prosthetic_limbs(){
		$this->data['title'] = $this->lang->line('limbs_title');
		$this->data['description'] = $this->lang->line('limbs_description');
		$this->data['keyword'] = $this->lang->line('limbs_keyword');
		$this->data['body'] = 'blog/prosthetic_limbs';
		$this->load->view("main_layout",$this->data);
	}
	
	public function automotive_car(){
		$this->data['title'] = $this->lang->line('car_title');
		$this->data['description'] = $this->lang->line('car_description');
		$this->data['keyword'] = $this->lang->line('car_keyword');
		$this->data['body'] = 'blog/automotive_car';
		$this->load->view("main_layout",$this->data);
	}
	
	public function rapid_prototyping(){
		$this->data['title'] = $this->lang->line('prototyping_title');
		$this->data['description'] = $this->lang->line('prototyping_description');
		$this->data['keyword'] = $this->lang->line('prototyping_keyword');
		$this->data['body'] = 'blog/rapid_prototyping';
		$this->load->view("main_layout",$this->data);
	}
	
	public function silicon_mold(){
		$this->data['title'] = $this->lang->line('mold_title');
		$this->data['description'] = $this->lang->line('mold_description');
		$this->data['keyword'] = $this->lang->line('mold_keyword');
		$this->data['body'] = 'blog/silicon_mold';
		$this->load->view("main_layout",$this->data);
	}

	public function car_safety(){
		$this->data['title'] = $this->lang->line('safety_title');
		$this->data['description'] = $this->lang->line('safety_description');
		$this->data['keyword'] = $this->lang->line('safety_keyword');
		$this->data['body'] = 'blog/car_safety';
		$this->load->view("main_layout",$this->data);		
	}

	public function hospitals_research(){
		$this->data['title'] = $this->lang->line('research_title');
		$this->data['description'] = $this->lang->line('research_description');
		$this->data['keyword'] = $this->lang->line('research_keyword');
		$this->data['body'] = 'blog/hospitals_research';
		$this->load->view("main_layout",$this->data);		
	}	
	
	public function custom_wheels(){
		$this->data['title'] = $this->lang->line('wheels_title');
		$this->data['description'] = $this->lang->line('wheels_description');
		$this->data['keyword'] = $this->lang->line('wheels_keyword');
		$this->data['body'] = 'blog/custom_wheels';
		$this->load->view("main_layout",$this->data);		
	}

	public function photo_lithophane(){
		$this->data['title'] = $this->lang->line('photo_title');
		$this->data['description'] = $this->lang->line('photo_description');
		$this->data['keyword'] = $this->lang->line('photo_keyword');
		$this->data['body'] = 'blog/photo_lithophane';
		$this->load->view("main_layout",$this->data);		
	}

	public function modern_muggle(){
		$this->data['title'] = $this->lang->line('muggle_title');
		$this->data['description'] = $this->lang->line('muggle_description');
		$this->data['keyword'] = $this->lang->line('muggle_keyword');
		$this->data['body'] = 'blog/modern_muggle';
		$this->load->view("main_layout",$this->data);		
	}	

	public function valentine_day(){
		$this->data['title'] = $this->lang->line('valentine_title');
		$this->data['description'] = $this->lang->line('valentine_description');
		$this->data['keyword'] = $this->lang->line('valentine_keyword');
		$this->data['body'] = 'blog/valentine_day';
		$this->load->view("main_layout",$this->data);		
	}

	public function smartphone_cover(){
		$this->data['title'] = $this->lang->line('smartphone_title');
		$this->data['description'] = $this->lang->line('smartphone_description');
		$this->data['keyword'] = $this->lang->line('smartphone_keyword');
		$this->data['body'] = 'blog/smartphone_cover';
		$this->load->view("main_layout",$this->data);		
	}	

	public function action_figures(){
		$this->data['title'] = $this->lang->line('action_title');
		$this->data['description'] = $this->lang->line('action_description');
		$this->data['keyword'] = $this->lang->line('action_keyword');
		$this->data['body'] = 'blog/action_figures';
		$this->load->view("main_layout",$this->data);		
	}

	public function customised_awards(){
		$this->data['title'] = $this->lang->line('awards_title');
		$this->data['description'] = $this->lang->line('awards_description');
		$this->data['keyword'] = $this->lang->line('awards_keyword');
		$this->data['body'] = 'blog/customised_awards';
		$this->load->view("main_layout",$this->data);		
	}

	public function colour_jet(){
		$this->data['title'] = $this->lang->line('colour_title');
		$this->data['description'] = $this->lang->line('colour_description');
		$this->data['keyword'] = $this->lang->line('colour_keyword');
		$this->data['body'] = 'blog/colour_jet';
		$this->load->view("main_layout",$this->data);		
	}

	public function science_fair(){
		$this->data['title'] = $this->lang->line('fair_title');
		$this->data['description'] = $this->lang->line('fair_description');
		$this->data['keyword'] = $this->lang->line('fair_keyword');
		$this->data['body'] = 'blog/science_fair';
		$this->load->view("main_layout",$this->data);		
	}

}

