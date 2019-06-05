<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		// Design
		$this->lang->load('design/describe');
		$this->lang->load('design/detail');
		$this->lang->load('design/overview');
		$this->lang->load('design/confirm');

		// Authentication
		$this->lang->load('authentication/register');

		// Session ID
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');

	}

	// Describe Project Page
	public function describe_project(){
		$this->data['title'] = $this->lang->line('describe_title');
		$this->data['description'] = $this->lang->line('describe_description');
		$this->data['keyword'] = $this->lang->line('describe_keyword');
		$this->data['body'] = 'design/describe_project';
		$this->load->view("main_layout",$this->data);
	}

	// Project Detail Page
	public function project_details(){
		$industry_id = $this->uri->segment(2);
		if (!empty($industry_id)) {
			$this->data['title'] = $this->lang->line('detail_title');
			$this->data['description'] = $this->lang->line('detail_description');
			$this->data['keyword'] = $this->lang->line('detail_keyword');
			$this->data['industry_id'] = $industry_id;
			$this->data['body'] = 'design/project_details';
			$this->load->view("main_layout",$this->data);
		}else{
			redirect('describe-project');
		}	
	}

	// Project Detail Page
	public function store_session(){
		$industry_id = $this->input->post('industry_id');
		$design_name = $this->input->post('design_name');
		$design_description = $this->input->post('design_description');
		$design_usage = $this->input->post('design_usage');
		$design_assembly = $this->input->post('design_assembly');
		$design_precision = $this->input->post('design_precision');
		$design_finishing = $this->input->post('design_finishing');
		$design_finishing_custom = $this->input->post('design_finishing_custom');
		$design_material = $this->input->post('design_material');
		$design_material_custom = $this->input->post('design_material_custom');
		$design_temperature = $this->input->post('design_temperature');
		$design_temperature_custom = $this->input->post('design_temperature_custom');
		$design_resource = $this->input->post('design_resource');

		// Check Files
        if (!empty($_FILES['design_resource'])) {
            for($i = 0; $i < count($_FILES['design_resource']['name']); $i++) {
                $img = $_FILES['design_resource']['name'][$i];
                $tmp = $_FILES['design_resource']['tmp_name'][$i];
                $size = $_FILES['design_resource']['size'][$i];
                $status = 'active';
                $resource_date = time();
                // File Path
                $path = 'assets/images/design_file/'.time().'_'.$img;
                move_uploaded_file($tmp, $path);
                $design_file_data = array(
                    "$img" => array(
                        'file_name' => $img,
                        'file_path' => $path,
                        'file_size' => $size,
                        'status' => $status,
                        'resource_date' => $resource_date
                    )
                );
                $session_file_data = $this->session->userdata('design_file_data');
            	if (empty($session_file_data)) {
            		$session_file_data = $design_file_data;			
            		$this->session->set_userdata('design_file_data', $session_file_data);
            	}else{
            		$session_file_data = array_merge($session_file_data, $design_file_data);
            		$this->session->set_userdata('design_file_data', $session_file_data);
            	}
            }
        }else{
        	$this->session->set_userdata('design_file_data', '');
        }
        
        // Store in Session
        $design_data = array(
            'industry_id' => $industry_id,
            'design_name' => $design_name,
            'design_description' => $design_description,
            'design_usage' => $design_usage,
            'design_precision' => $design_precision,
            'design_assembly' => $design_assembly,
            'design_finishing' => $design_finishing,
            'design_finishing_custom' => $design_finishing_custom,
            'design_material' => $design_material,
            'design_material_custom' => $design_material_custom,
            'design_temperature' => $design_temperature,
            'design_temperature_custom' => $design_temperature_custom
        );
        $this->session->set_userdata('design_data', $design_data);
        $data = 'success';
        echo $data;
	}

	// Overview Page
	public function project_overview(){
		$this->session->set_userdata('social_redirect', 'design-order-overview');
		$design_data = $this->session->userdata('design_data');
		if(!empty($design_data)){
			$this->data['title'] = $this->lang->line('overview_title');
			$this->data['description'] = $this->lang->line('overview_description');
			$this->data['keyword'] = $this->lang->line('overview_keyword');
			$this->data['design_data'] = $design_data;
			$this->data['body'] = 'design/project_overview';
			$this->load->view("main_layout",$this->data);
		}else{
			redirect(base_url('describe-project'));
		}	
	}

	// Confirm Page
	public function project_confirm(){
		$usher_id = $this->session->userdata('usher_id');
		$design_data = $this->session->userdata('design_data');
		$design_file_data = $this->session->userdata('design_file_data');
		if (!empty($usher_id) && !empty($design_data)) {
			$user_id = $usher_id;
			$industry_id = $design_data['industry_id'];
            $design_name = $design_data['design_name'];
            $design_description = $design_data['design_description'];
            $design_usage = $design_data['design_usage'];
            $design_assembly = $design_data['design_assembly'];
            $design_precision = $design_data['design_precision'];
            $design_finishing = $design_data['design_finishing'];
            $design_finishing_custom = $design_data['design_finishing_custom'];
            $design_material = $design_data['design_material'];
            $design_material_custom = $design_data['design_material_custom'];
            $design_temperature = $design_data['design_temperature'];
            $design_temperature_custom = $design_data['design_temperature_custom'];
            // Getting Order Details  
	        $getdesign_count = $this->Design_m->get_order_id();
	        $design_no = intval($getdesign_count) + 100;
	        $year = substr(date('y'), -1);
	        $order_id = 'DO'.date('m').$year.$design_no;
	        $order_status = 'PROCESSING';
	        $status = 'active';
	        $design_date = time();

			$design_array['user_id'] = $user_id;
			$design_array['industry_id'] = $industry_id;
			$design_array['design_name'] = $design_name;
			$design_array['design_description'] = $design_description;
			$design_array['design_usage'] = $design_usage;
			$design_array['design_assembly'] = $design_assembly;
			$design_array['design_precision'] = $design_precision;
			$design_array['design_finishing'] = $design_finishing;
			$design_array['design_finishing_custom'] = $design_finishing_custom;
			$design_array['design_material'] = $design_material;
			$design_array['design_material_custom'] = $design_material_custom;
			$design_array['design_temperature'] = $design_temperature;
			$design_array['design_temperature_custom'] = $design_temperature_custom;
			$design_array['order_id'] = $order_id;
			$design_array['order_status'] = $order_status;
			$design_array['status'] = $status;
			$design_array['design_date'] = $design_date;
			$design_id = $this->Design_m->insert_design_data($design_array);
			if (!empty($design_file_data)) {
                foreach($design_file_data as $designkey => $designvalue){
					$design_resource_name = $design_file_data[$designkey]['file_name'];
                    $design_resource_path = $design_file_data[$designkey]['file_path'];
                    $design_resource_size = $design_file_data[$designkey]['file_size'];
                    $status = $design_file_data[$designkey]['status'];
                    $design_resource_date = $design_file_data[$designkey]['resource_date'];
                    $resource_array['design_id'] = $design_id;
                    $resource_array['design_resource_name'] = $design_resource_name;
                    $resource_array['design_resource_path'] = $design_resource_path;
                    $resource_array['design_resource_size'] = $design_resource_size;
                    $resource_array['status'] = $status;
                    $resource_array['design_resource_date'] = $design_resource_date;
                    $this->DResource_m->insert($resource_array);
                }
			}
			$this->session->set_flashdata('success','Order Placed Successfully!');
			$this->designOrderEmail($order_id, $design_name);
			$this->session->unset_userdata('design_data');
			$this->session->unset_userdata('design_file_data');
			$this->data['title'] = $this->lang->line('confirm_title');
			$this->data['description'] = $this->lang->line('confirm_description');
			$this->data['keyword'] = $this->lang->line('confirm_keyword');
			$this->data['body'] = 'design/project_confirm';
			$this->load->view("main_layout",$this->data);			
		}else{
			redirect(base_url('design-order-overview'));
		}
	}

}

