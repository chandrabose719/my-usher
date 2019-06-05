<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('project/index');

		// Session ID
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');

	}

	// Project Page
	public function index(){
		$this->data['title'] = $this->lang->line('project_title');
		$this->data['description'] = $this->lang->line('project_description');
		$this->data['keyword'] = $this->lang->line('project_keyword');
		$this->data['body'] = 'project/index';
		$this->load->view("main_layout", $this->data);
	}

	// Store Project
	public function store_session(){
		$project_name = $this->input->post('project_name');
		$project_usage = $this->input->post('project_usage');
		$project_description = $this->input->post('project_description');
		$project_technology = $this->input->post('project_technology');
		$project_finish = $this->input->post('project_finish');
		$project_tolerance = $this->input->post('project_tolerance');
		$project_material = $this->input->post('project_material');
		$project_qty = $this->input->post('project_qty');
		$project_location = $this->input->post('project_location');
		$unserialize_psq = $this->input->post('psq');
		$psq = serialize($unserialize_psq);
		$award_date = $this->input->post('award_date');
		$needed_by = $this->input->post('needed_by');
		$project_instruction = $this->input->post('project_instruction');
		$project_info = $this->input->post('project_info');
		$resource_type = $this->input->post('resource_type');
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_company = $this->input->post('user_company');
		$user_mobile = $this->input->post('user_mobile');
		$user_address = $this->input->post('user_address');

		// Check Files
        if (!empty($_FILES['project_resource'])) {
            for($i = 0; $i < count($_FILES['project_resource']['name']); $i++) {
                $img = $_FILES['project_resource']['name'][$i];
                $tmp = $_FILES['project_resource']['tmp_name'][$i];
                $size = $_FILES['project_resource']['size'][$i];
                $status = 'active';
                $resource_date = time();
                // File Path
                $path = 'assets/images/project_file/'.time().'_'.$img;
                move_uploaded_file($tmp, $path);
                $project_file_data = array(
                    "$img" => array(
                        'resource_type' => $resource_type,
                        'resource_name' => $img,
                        'resource_path' => $path,
                        'resource_size' => $size
                    )
                );
                $session_file_data = $this->session->userdata('project_file_data');
            	if (empty($session_file_data)) {
            		$session_file_data = $project_file_data;			
            		$this->session->set_userdata('project_file_data', $session_file_data);
            	}else{
            		$session_file_data = array_merge($session_file_data, $project_file_data);
            		$this->session->set_userdata('project_file_data', $session_file_data);
            	}
            }
        }else{
        	$this->session->set_userdata('project_file_data', '');
        }
        
        // Store in Session
        $project_data = array(
            'project_name' => $project_name,
            'project_usage' => $project_usage,
            'project_description' => $project_description,
            'project_technology' => $project_technology,
            'project_finish' => $project_finish,
            'project_tolerance' => $project_tolerance,
            'project_material' => $project_material,
            'project_qty' => $project_qty,
            'project_location' => $project_location,
            'psq' => $psq,
            'award_date' => $award_date,
            'needed_by' => $needed_by,
            'project_instruction' => $project_instruction,
            'project_info' => $project_info,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_company' => $user_company,
            'user_mobile' => $user_mobile,
            'user_address' => $user_address
        );
        $this->session->set_userdata('project_data', $project_data);
        $data = 'success';
        echo $data;
	}

	// Confirmation Page
	public function project_confirmation(){
		$project_data = $this->session->userdata('project_data');
		$project_file_data = $this->session->userdata('project_file_data');
		if (!empty($project_data)) {
			// Getting Order  
	        $order_count = $this->Project_m->count();
	        $order_no = 100 + $order_count;
	        $order = 'P0'.$order_no;
	        $project_status = 'PROCESSING';
	        $status = 'active';
	        $project_date = time();
	        // User Details
	        $user_array['user_name'] = $project_data['user_name'];
	        $user_array['user_email'] = $project_data['user_email'];
	        $user_array['user_address'] = $project_data['user_address'];
	        $user_array['user_company'] = $project_data['user_company'];
	        $user_array['user_mobile'] = $project_data['user_mobile'];
			$user_array['status'] = $status;
			$user_array['user_date'] = $project_date;
			$user_id = $this->Puser_m->insert_user_data($user_array);
			// Project Details
			$project_array['user_id'] = $user_id;
			$project_array['project_name'] = $project_data['project_name'];
			$project_array['project_usage'] = $project_data['project_usage'];
			$project_array['project_description'] = $project_data['project_description'];
			$project_array['project_technology'] = $project_data['project_technology'];
			$project_array['project_finish'] = $project_data['project_finish'];
			$project_array['project_tolerance'] = $project_data['project_tolerance'];
			$project_array['project_material'] = $project_data['project_material'];
			$project_array['project_qty'] = $project_data['project_qty'];
			$project_array['project_location'] = $project_data['project_location'];
			$project_array['psq'] = $project_data['psq'];
			$project_array['award_date'] = $project_data['award_date'];
			$project_array['needed_by'] = $project_data['needed_by'];
			$project_array['project_instruction'] = $project_data['project_instruction'];
			$project_array['project_info'] = $project_data['project_info'];
			$project_array['order'] = $order;
			$project_array['project_status'] = $project_status;
			$project_array['status'] = $status;
			$project_array['project_date'] = $project_date;
			$project_id = $this->Project_m->insert_project_data($project_array);
			// Resource File
			if (!empty($project_file_data)) {
                foreach($project_file_data as $pkey => $pvalue){
					$resource_array['project_id'] = $project_id;
                    $resource_array['resource_type'] = $project_file_data[$pkey]['resource_type'];
                    $resource_array['resource_name'] = $project_file_data[$pkey]['resource_name'];
                    $resource_array['resource_path'] = $project_file_data[$pkey]['resource_path'];
                    $resource_array['resource_size'] = $project_file_data[$pkey]['resource_size'];
                    $resource_array['status'] = $status;
                    $resource_array['resource_date'] = $project_date;
                    $this->Presource_m->insert($resource_array);
                }
			}
			$this->session->set_flashdata('success','RFQ Submitted Successfully');
			$this->projectOrderEmail($project_data['user_name'], $project_data['user_email'], $project_data['project_name'], $order);
			$this->PRFQRemainderEmail($project_data['user_name'], $project_data['user_email']);
			$this->session->unset_userdata('project_data');
			$this->session->unset_userdata('project_file_data');
			$this->data['title'] = $this->lang->line('confirm_title');
			$this->data['description'] = $this->lang->line('confirm_description');
			$this->data['keyword'] = $this->lang->line('confirm_keyword');
			$this->data['body'] = 'project/project_confirmation';
			$this->load->view("main_layout",$this->data);			
		}else{
			redirect(base_url('project'));
		}
	}

}

