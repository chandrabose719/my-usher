<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Check Session
		$usher_id = $this->session->userdata('usher_id');
		if (empty($usher_id)) {
			redirect(base_url());
		}

		// Language
		// Dashboard
		$this->lang->load('dashboard/account');
		$this->lang->load('dashboard/manufactureComplete');
		$this->lang->load('dashboard/manufactureIncomplete');
		$this->lang->load('dashboard/designComplete');
		$this->lang->load('dashboard/setting');
		$this->lang->load('dashboard/needhelp');

		// Session ID
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');

	}

	// Account Page
	public function account(){
		$this->data['title'] = $this->lang->line('account_title');
		$this->data['description'] = $this->lang->line('account_description');
		$this->data['keyword'] = $this->lang->line('account_keyword');
		$this->data['body'] = 'dashboard/account';
		$this->load->view("dashboard_layout",$this->data);
	}

	// Setting Page
	public function manufacture_complete(){
		$user_id = $this->session->userdata('usher_id');
		$order_array['user_id'] = $user_id;
		$order_result = $this->Order_m->get($order_array);
		$this->data['order_result'] = $order_result;
		$this->data['title'] = $this->lang->line('complete_title');
		$this->data['description'] = $this->lang->line('complete_description');
		$this->data['keyword'] = $this->lang->line('complete_keyword');
		$this->data['body'] = 'dashboard/manufacture_complete';
		$this->load->view("dashboard_layout",$this->data);
	}

	// Incomplete Page
	public function manufacture_incomplete(){
		$user_id = $this->session->userdata('usher_id');
		$file_array['user_id'] = $user_id;
		$file_array['file_status'] = '';
		$file_result = $this->Manufacture_m->get($file_array);
		$this->data['file_result'] = $file_result;
		$this->data['title'] = $this->lang->line('incomplete_title');
		$this->data['description'] = $this->lang->line('incomplete_description');
		$this->data['keyword'] = $this->lang->line('incomplete_keyword');
		$this->data['body'] = 'dashboard/manufacture_incomplete';
		$this->load->view("dashboard_layout",$this->data);
	}

	// Setting Page
	public function design_complete(){
		$user_id = $this->session->userdata('usher_id');
		$design_array['user_id'] = $user_id;
		$design_result = $this->Design_m->get($design_array);
		$this->data['design_result'] = $design_result;
		$this->data['title'] = $this->lang->line('design_title');
		$this->data['description'] = $this->lang->line('design_description');
		$this->data['keyword'] = $this->lang->line('design_keyword');
		$this->data['body'] = 'dashboard/design_complete';
		$this->load->view("dashboard_layout",$this->data);
	}

	// Setting Page
	public function setting(){
		$user_id = $this->session->userdata('usher_id');
		if (isset($_POST['setting-submit'])) {
			$user_name = $this->input->post('user_name');
	        $user_mobile = $this->input->post('user_mobile');
	        $billing_address = $this->input->post('billing_address');
	        $billing_address1 = $this->input->post('billing_address1');
	        $billing_city = $this->input->post('billing_city');
	        $billing_state = $this->input->post('billing_state');
	        $billing_country = $this->input->post('billing_country');
	        $billing_zipcode = $this->input->post('billing_zipcode');
	        if (!empty($user_name) && !empty($user_mobile) && !empty($billing_address) && !empty($billing_address1) && !empty($billing_city) && !empty($billing_state) && !empty($billing_country) && !empty($billing_zipcode)) {
	            if (!preg_match('/^\d{10}$/', $user_mobile)) {
	                $this->session->set_flashdata('error','Phone number should be 10 digit only!');
	            }elseif (!preg_match('/^\d{6}$/', $billing_zipcode)){
	                $this->session->set_flashdata('error','Postal/Zipcode should be 5 or 6 digit!');
	            }else{
	                $id_array['user_id'] = $user_id;
	                $array['user_name'] = $user_name;
	                $array['user_mobile'] = $user_mobile;
	                $array['billing_address'] = $billing_address;
	                $array['billing_address1'] = $billing_address1;
	                $array['billing_city'] = $billing_city;
	                $array['billing_state'] = $billing_state;
	                $array['billing_country'] = $billing_country;
	                $array['billing_zipcode'] = $billing_zipcode;
	            	if ($this->Usher_m->update($array, $id_array)) {
	            		$this->session->set_flashdata('success','Billing address updated successfully');
						redirect(base_url('account'));
					}else{
						$this->session->set_flashdata('error','Error occured, Try again!');
					}
	            }
	        }else{
	            $this->session->set_flashdata('error','Please fill all field!');
	        }	
		}
		$user_array['user_id'] = $user_id;
		$user_data = $this->Usher_m->get($user_array, TRUE);
		$this->data['user_data'] = $user_data;
		$this->data['title'] = $this->lang->line('setting_title');
		$this->data['description'] = $this->lang->line('setting_description');
		$this->data['keyword'] = $this->lang->line('setting_keyword');
		$this->data['body'] = 'dashboard/setting';
		$this->load->view("dashboard_layout",$this->data);
	}

	public function need_help(){
		$type = $this->uri->segment(2);
		$order_id = $this->uri->segment(3);
		if (isset($_POST['support-submit'])) {
			$user_id = $this->session->userdata('usher_id');
			$order_type = $this->input->post('type');
			$order_id = $this->input->post('order_id');
			$support_query = $this->input->post('support_query');
			$array['user_id'] = $user_id;
        	$array['order_id'] = $order_id;
        	$array['order_type'] = $order_type;
        	$array['help_message'] = $support_query;
        	$array['status'] = 'active';
        	$array['date'] = time();
        	if ($this->Needhelp_m->insert($array)) {
				$this->session->set_flashdata('success','We will get in touch with you shortly.');
				redirect(base_url('account'));
			}else{
				$this->session->set_flashdata('error','Error occured, Try again!');
			}
		}
		$this->data['type'] = $type;
		$this->data['order_id'] = $order_id;
		$this->data['title'] = $this->lang->line('needhelp_title');
		$this->data['description'] = $this->lang->line('needhelp_description');
		$this->data['keyword'] = $this->lang->line('needhelp_keyword');
		$this->data['body'] = 'dashboard/need_help';
		$this->load->view("main_layout",$this->data);
	}

}

