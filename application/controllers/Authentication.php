<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('authentication/register');
		$this->lang->load('authentication/forgot');
		$this->lang->load('authentication/change');

		// Session ID
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');

	}

	// Describe Project Page
	public function index(){
		$this->data['google_login_url']=$this->google->get_login_url();
		$this->data['title'] = $this->lang->line('register_title');
		$this->data['description'] = $this->lang->line('register_description');
		$this->data['keyword'] = $this->lang->line('register_keyword');
		$this->data['body'] = 'authentication/index';
		$this->load->view("main_layout",$this->data);
	}

	public function google_auth(){
		$google_data = $this->google->validate();
		$id_array['google_auth_id'] = $google_data['auth_id'];
		$google_array['google_auth_id'] = $google_data['auth_id'];
		$google_array['user_name'] = $google_data['user_name'];
		$google_array['user_email'] = $google_data['user_email'];
		$google_array['status'] = 'active';
		$google_array['date'] = time();
		$check_email['user_email'] = $google_data['user_email'];
		$check_user_data = $this->Usher_m->count($check_email);
		if($check_user_data == 0){
			$check_email_data = $this->Google_m->count($check_email);
			if($check_email_data == 0){
				$this->Google_m->insert($google_array);
				$this->Usher_m->insert($google_array);
			}else{
				$this->Google_m->update($google_array, $id_array);
				$this->Usher_m->update($google_array, $id_array);
			}
			$user_data = $this->Usher_m->get($id_array, TRUE);
			$this->session->set_userdata('usher_id', $user_data->user_id);
			$this->session->set_userdata('usher_name', $user_data->user_name);
			$this->session->set_userdata('usher_email', $user_data->user_email);
			$this->session->set_flashdata('success','Loggedin Successfully!');
			redirect(base_url('start-project'));
		}else{
			$this->session->set_flashdata('error','Email already exists, Use normal login instead!');
			redirect(base_url('register'));
		}
	}

	// Register Operation
	public function registeration(){
		if(isset($_POST['register-submit'])){
			$user_name = $this->input->post('user_name');
			$user_email = $this->input->post('user_email');
			$user_password = $this->input->post('user_password');
			$conf_password = $this->input->post('conf_password');
			$redirect_register = $this->input->post('redirect_register');
			$current_register = $this->input->post('current_register');
			if(!empty($user_name) && !empty($user_email) && !empty($user_password)){
				$check_email['user_email'] = $user_email;
				$exist_email = $this->Usher_m->count($check_email);
				if($exist_email == 0){
					$array['user_name'] = $user_name;	
					$array['user_email'] = $user_email;	
					$array['user_password'] = $user_password;	
					$array['status'] = 'active';
					$array['date'] = time();
					if ($this->Usher_m->insert($array)) {
						$login_data = $this->Usher_m->get($array, TRUE);
						// registerMail($login_data->user_name, $login_data->user_email);
						$this->session->set_userdata('usher_id', $login_data->user_id);
						$this->session->set_userdata('usher_name', $login_data->user_name);
						$this->session->set_userdata('usher_email', $login_data->user_email);
						$this->session->set_flashdata('success','Successfully Registered!');
						redirect(base_url($redirect_register));
					}else{
						$this->session->set_flashdata('error','Error occured, Try again!');
					}	
				}else{
					$this->session->set_flashdata('error','Email already exists, Login instead!');
				}	
			}else{
				$this->session->set_flashdata('error','Please fill all fields!');
			}
			redirect(base_url($current_register));
		}else{
			redirect(base_url());
		}
	}

	// Login Operation
	public function login(){
		if(isset($_POST['login-submit'])){
			$user_email = $this->input->post('login_user_email');
			$user_password = $this->input->post('login_user_password');
			$redirect_login = $this->input->post('redirect_login');
			$current_login = $this->input->post('current_login');
			if(!empty($user_email) && !empty($user_password)){
				$user_array['user_email'] = $user_email;
				$user_array['user_password'] = $user_password;
				$user_count = $this->Usher_m->count($user_array);
				if ($user_count == 1) {
					$user_data = $this->Usher_m->get($user_array, TRUE);
					if($user_data->user_email == $user_email && empty($user_data->google_auth_id)){
						if($user_data->user_email == $user_email && 
							$user_data->user_password == $user_password){
							$this->session->set_userdata('usher_id', $user_data->user_id);
							$this->session->set_userdata('usher_name', $user_data->user_name);
							$this->session->set_userdata('usher_email', $user_data->user_email);
							$this->session->set_flashdata('success','Loggedin Successfully!');
							redirect(base_url($redirect_login));	
						}else{
							$this->session->set_flashdata('error','Wrong E-mail ID or Password, Try Again!');
						}
					}else{
						$this->session->set_flashdata('error','Email already exists, Login through Google!');
					}	
				}else{
					$this->session->set_flashdata('error','E-mail ID and Password does not exist, Try different!');
				}
			}else{
				$this->session->set_flashdata('error','Please fill all fields!');
			}
			redirect(base_url($current_login));		
		}else{
			redirect(base_url());
		}
	}

	// Forgot Password
	public function forgot_password(){
		if (isset($_POST['forgot-password-submit'])) {
			$user_email = $this->input->post('user_email');
			if (!empty($user_email)) {
				$user_array['user_email'] = $user_email;
				$user_count = $this->Usher_m->count($user_array);
				if ($user_count == 1) {
					$user_data = $this->Usher_m->get($user_array, TRUE);
					if($user_email == $user_data->user_email){
						$user_id = $user_data->user_id;
	                    $user_name = $user_data->user_name;
	                    $user_email = $user_data->user_email;
	                    $this->forgotPasswordEmail($user_id, $user_name, $user_email);
	                    $this->session->set_flashdata('success','you will recieve an email with instructions about how to reset your password in a few minutes.');
					}else{
						$this->session->set_flashdata('error','There is no account with this e-mail. Please register a new account instead.');
					}	
				}else{
					$this->session->set_flashdata('error','There is no account with this e-mail. Please register a new account instead.');
				}	
            }else{
            	$this->session->set_flashdata('error','Please enter your Primary E-mail!');
			}
		}
		$this->data['title'] = $this->lang->line('forgot_title');
		$this->data['description'] = $this->lang->line('forgot_description');
		$this->data['keyword'] = $this->lang->line('forgot_keyword');
		$this->data['body'] = 'authentication/forgot_password';
		$this->load->view("main_layout",$this->data);		
	}

	// Change Password
	public function change_password(){
		$type = $this->uri->segment(2);
		$token = $this->uri->segment(3);
		if (empty($token) || $type != 'change') {
	        redirect(base_url('signout'));        
	    }else{    
	        $user_id = strtok($token, 'c');
	    }
	    if (isset($_POST['change-password-submit'])) {
	    	$user_password = $this->input->post('user_password');
	    	$conf_password = $this->input->post('conf_password');
	    	if (!empty($user_password) || !empty($conf_password)) {
	    		if ($user_password == $conf_password) {
	    			$array['user_password'] = $user_password;
	    			$id_array['user_id'] = $user_id;
	    			if ($this->Usher_m->update($array, $id_array)) {
	    				$this->session->set_flashdata('success','Password changed successfully, Please Login with new password.');
	    				redirect(base_url('register'));
	    			}else{
	    				$this->session->set_flashdata('error','Error occured, Try again!');
	    			}
	    		}else{
	    			$this->session->set_flashdata('error','Password does not match!');	
	    		}
	    	}else{
	    		$this->session->set_flashdata('error','Please enter all fields!');
	    	}
	    }
	    $user_array['user_id'] = $user_id;
	    $user_data = $this->Usher_m->get($user_array, TRUE);
	    $this->data['user_name'] = $user_data->user_name;
	    $this->data['user_email'] = $user_data->user_email;
		$this->data['title'] = $this->lang->line('change_title');
		$this->data['description'] = $this->lang->line('change_description');
		$this->data['keyword'] = $this->lang->line('change_keyword');
		$this->data['body'] = 'authentication/change_password';
		$this->load->view("main_layout",$this->data);
	}

	// Logout
	function logout(){
		$this->session->unset_userdata('usher_id');
		$this->session->unset_userdata('usher_name');
		$this->session->unset_userdata('usher_email');
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

