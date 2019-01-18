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

	// FRP page
	public function frp(){
		$this->data['title'] = $this->lang->line('frp_title');
		$this->data['description'] = $this->lang->line('frp_description');
		$this->data['keyword'] = $this->lang->line('frp_keyword');
		$this->data['body'] = 'resources/frp';
		$this->load->view("main_layout",$this->data);
	}

	// DMLS page
	public function dmls(){
		$this->data['title'] = $this->lang->line('dmls_title');
		$this->data['description'] = $this->lang->line('dmls_description');
		$this->data['keyword'] = $this->lang->line('dmls_keyword');
		$this->data['body'] = 'resources/dmls';
		$this->load->view("main_layout",$this->data);
	}

	// SLA page
	public function sla(){
		$this->data['title'] = $this->lang->line('sla_title');
		$this->data['description'] = $this->lang->line('sla_description');
		$this->data['keyword'] = $this->lang->line('sla_keyword');
		$this->data['body'] = 'resources/sla';
		$this->load->view("main_layout",$this->data);
	}

	// VC page
	public function vc(){
		$this->data['title'] = $this->lang->line('vc_title');
		$this->data['description'] = $this->lang->line('vc_description');
		$this->data['keyword'] = $this->lang->line('vc_keyword');
		$this->data['body'] = 'resources/vc';
		$this->load->view("main_layout",$this->data);
	}

}

