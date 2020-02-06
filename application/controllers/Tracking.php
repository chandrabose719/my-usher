<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('tracking/index');

		// Session ID
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');

	}

	// Order Tacking
	public function order_tracking(){
		$tracking_id = '';
		$tracking_data = '';
		$get_tracking = $this->input->get('tracking_id');
		if(!empty($get_tracking)){
			$tracking_id = $this->input->get('tracking_id');
		}
		if(!empty($tracking_id)){
			$tracking_arr['order_id'] = $tracking_id;
			$tracking_data = $this->Tracking_m->get($tracking_arr, TRUE);
			if(empty($tracking_data)){
				$this->session->set_flashdata('error','Order id is not exists, try different!');
				redirect(base_url('order-tracking'));	
			}
		}
		$this->data['tracking_id'] = $tracking_id;
		$this->data['tracking_data'] = $tracking_data;
		$this->data['title'] = $this->lang->line('tracking_title');
		$this->data['description'] = $this->lang->line('tracking_description');
		$this->data['keyword'] = $this->lang->line('tracking_keyword');
		$this->data['body'] = 'tracking/order_tracking';
		$this->load->view("main_layout", $this->data);
	}

	// Order Tacking
	public function order_tracking_old(){
		$tracking_id = '';
		$tracking_data = '';
		$get_tracking = $this->input->get('tracking_id');
		if(!empty($get_tracking)){
			$tracking_id = $this->input->get('tracking_id');
		}
		if(!empty($tracking_id)){
			$tracking_arr['order_id'] = $tracking_id;
			$tracking_data = $this->Tracking_m->get($tracking_arr, TRUE);
			if(empty($tracking_data)){
				$this->session->set_flashdata('error','Order id is not exists, try different!');
				redirect(base_url('order-tracking'));	
			}
		}
		$this->data['tracking_id'] = $tracking_id;
		$this->data['tracking_data'] = $tracking_data;
		$this->data['title'] = $this->lang->line('tracking_title');
		$this->data['description'] = $this->lang->line('tracking_description');
		$this->data['keyword'] = $this->lang->line('tracking_keyword');
		$this->data['body'] = 'tracking/order_tracking1';
		$this->load->view("main_layout", $this->data);
	}

	// Order Tacking
	// public function order_tracking(){
	// 	$tracking_id = '';
	// 	$tracking_data = '';
	// 	$tracking_id = $this->session->userdata('tracking_id');
	// 	$this->data['title'] = $this->lang->line('tracking_title');
	// 	$this->data['description'] = $this->lang->line('tracking_description');
	// 	$this->data['keyword'] = $this->lang->line('tracking_keyword');
	// 	if(!empty($tracking_id)){
	// 		$tracking_arr['order_id'] = $tracking_id;
	// 		$tracking_data = $this->Tracking_m->get($tracking_arr, TRUE);
	// 		if(empty($tracking_data)){
	// 			$this->session->set_flashdata('error','Order id is not exists, try different!');
	// 			$this->session->unset_userdata('tracking_id');
	// 			redirect(base_url('order-tracking'));	
	// 		}
	// 	}
	// 	$this->data['tracking_id'] = $tracking_id;
	// 	$this->data['tracking_data'] = $tracking_data;
	// 	$this->data['body'] = 'tracking/order_tracking';
	// 	$this->load->view("main_layout", $this->data);
	// }

	// Tacking Submit
	public function tracking_submit(){
		if(isset($_POST['tracking-submit'])){
			$tracking_id = $this->input->post('tracking_id');
			$this->session->set_userdata('tracking_id', $tracking_id);
		}
		redirect(base_url('order-tracking'));
	}
	
}

