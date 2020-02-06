<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('authentication/register');

		// Session ID
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');

	}

	// Register Account
	public function register(){
		$usher_id = $this->session->userdata('usher_id');
		if (empty($usher_id)) {
			$this->data['title'] = $this->lang->line('register_title');
			$this->data['description'] = $this->lang->line('register_description');
			$this->data['keyword'] = $this->lang->line('register_keyword');
			$this->data['body'] = 'authentication/register';
			$this->load->view("auth_layout",$this->data);
		}else{
			redirect(base_url());
		}
	}

	// Login Account
	public function login(){
		$this->session->set_userdata('social_redirect', 'start-project');
		$usher_id = $this->session->userdata('usher_id');
		if (empty($usher_id)) {
			$this->data['title'] = $this->lang->line('login_title');
			$this->data['description'] = $this->lang->line('login_description');
			$this->data['keyword'] = $this->lang->line('login_keyword');
			$this->data['body'] = 'authentication/login';
			$this->load->view("auth_layout",$this->data);
		}else{
			redirect(base_url());
		}

	}

	// Register Operation
	public function register_operation(){
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
					$array['user_mode'] = 'live';
					$array['user_name'] = $user_name;	
					$array['user_email'] = $user_email;	
					$array['user_password'] = $user_password;	
					$array['status'] = 'active';
					$array['date'] = time();
					if ($this->Usher_m->insert($array)) {
						$login_data = $this->Usher_m->get($array, TRUE);
						$this->registerEmail($login_data->user_name, $login_data->user_email);
						$this->notifications($login_data->user_id);						
						$this->session->set_userdata('usher_id', $login_data->user_id);
						$this->session->set_userdata('usher_name', $login_data->user_name);
						$this->session->set_userdata('usher_email', $login_data->user_email);
						$this->session->set_flashdata('success', $this->lang->line('register_success'));
						redirect(base_url($redirect_register));
					}else{
						$this->session->set_flashdata('error', $this->lang->line('register_error'));
					}	
				}else{
					$this->session->set_flashdata('error', $this->lang->line('register_email_exist'));
				}	
			}else{
				$this->session->set_flashdata('error', $this->lang->line('register_fill_all'));
			}
			redirect(base_url($current_register));
		}else{
			redirect(base_url());
		}
	}

	// Login Operation
	public function login_operation(){
		if(isset($_POST['login-submit'])){
			$user_email = $this->input->post('login_user_email');
			$user_password = $this->input->post('login_user_password');
			$redirect_login = $this->input->post('redirect_login');
			$current_login = $this->input->post('current_login');
			$remember_me = $this->input->post('remember_me');
			if(!empty($user_email) && !empty($user_password)){
				$user_array['user_email'] = $user_email;
				// $user_array['user_password'] = $user_password;
				$user_count = $this->Usher_m->count($user_array);
				if ($user_count == 1) {
					$user_data = $this->Usher_m->get($user_array, TRUE);
					if(trim($user_data->user_password) == trim($user_password)){
						if($user_data->status == 'active'){	
							if($user_data->user_email == $user_email && 
								$user_data->user_password == $user_password){
								if($remember_me == 'true'){
									$this->set_cookies($user_data);
								}
								$this->session->set_userdata('usher_id', $user_data->user_id);
								$this->session->set_userdata('usher_name', $user_data->user_name);
								$this->session->set_userdata('usher_email', $user_data->user_email);
								$this->session->set_flashdata('success', $this->lang->line('login_success'));
								redirect(base_url($redirect_login));	
							}else{
								$this->session->set_flashdata('error', $this->lang->line('login_error'));
							}
						}else{
							$this->session->set_flashdata('error', $this->lang->line('login_suspend'));
						}
					}elseif (!empty($user_data->google_auth_id)) {
						$this->session->set_flashdata('error', $this->lang->line('login_error_google'));
					}elseif ($user_data->facebook_auth_id) {
						$this->session->set_flashdata('error', $this->lang->line('login_error_fb'));	
					}else{
						$this->session->set_flashdata('error', $this->lang->line('incorrect_password'));
					}
				}else{
					$this->session->set_flashdata('error', $this->lang->line('login_no_email'));
				}
			}else{
				$this->session->set_flashdata('error', $this->lang->line('login_all_fill'));
			}
			redirect(base_url($current_login));		
		}else{
			redirect(base_url());
		}
	}

	// Set Cookies
	public function set_cookies($user_data){
		$usher_id_cookie = array(
		    'name'   => 'usher_id',
	        'value'  => $user_data->user_id,                            
	    	'expire' => '604800',
	    	'secure' => FALSE,
	    	'SameSite'=> None,
	    );
		$this->input->set_cookie($usher_id_cookie);

	    $usher_name_cookie = array(
		    'name'   => 'usher_name',
	        'value'  => $user_data->user_name,                            
	    	'expire' => '300',
	    	'secure' => FALSE,
	    	'SameSite'=> None,
	    );
		$this->input->set_cookie($usher_name_cookie);

		$usher_email_cookie = array(
		    'name'   => 'usher_email',
	        'value'  => $user_data->user_email,                            
	    	'expire' => '300',
	    	'secure' => FALSE,
	    	'SameSite'=> None,
	    );
		$this->input->set_cookie($usher_email_cookie);
	}

	// Google Authentication
	public function google_auth(){
		$google_data = $this->google->validate();
		$id_array['google_auth_id'] = $google_data['auth_id'];
		$email_array['user_email'] = $google_data['user_email'];
		$status = 'active';
		$date = time();
		$mode = 'live';

		$google_array['google_auth_id'] = $google_data['auth_id'];
		$google_array['user_name'] = $google_data['user_name'];
		$google_array['user_email'] = $google_data['user_email'];
		$google_array['status'] = $status;
		$google_array['date'] = $date;
		
		$guser_array['user_mode'] = $mode;
		$guser_array['user_name'] = $google_data['user_name'];
		$guser_array['user_email'] = $google_data['user_email'];
		$guser_array['google_auth_id'] = $google_data['auth_id'];
		$guser_array['status'] = $status;
		$guser_array['date'] = $date;

		$check_user_data = $this->Usher_m->get($email_array, TRUE);
		if(empty($check_user_data)){	
			$this->Google_m->insert($google_array);
			$this->Usher_m->insert($guser_array);
			$user_data = $this->Usher_m->get($email_array, TRUE);
			$this->registerEmail($user_data->user_name, $user_data->user_email);
			$this->notifications($user_data->user_id);
			$this->session->set_userdata('usher_id', $user_data->user_id);
			$this->session->set_userdata('usher_name', $user_data->user_name);
			$this->session->set_userdata('usher_email', $user_data->user_email);
			$this->session->set_flashdata('success', $this->lang->line('google_success'));
			$social_redirect = $this->session->userdata('social_redirect');
			$this->session->unset_userdata('social_redirect');
			if(!empty($social_redirect)){	
				redirect(base_url($social_redirect));
			}else{
				redirect(base_url('start-project'));
			}
		}else{
			if($check_user_data->status == 'active'){	
				$user_data = $this->Usher_m->get($email_array, TRUE);
				$this->session->set_userdata('usher_id', $user_data->user_id);
				$this->session->set_userdata('usher_name', $user_data->user_name);
				$this->session->set_userdata('usher_email', $user_data->user_email);
				$this->session->set_flashdata('success', $this->lang->line('google_success'));
				$social_redirect = $this->session->userdata('social_redirect');
				$this->session->unset_userdata('social_redirect');
				if(!empty($social_redirect)){	
					redirect(base_url($social_redirect));
				}else{
					redirect(base_url('start-project'));
				}
			}else{
				$this->session->set_flashdata('error', $this->lang->line('google_suspend'));
				$social_redirect = $this->session->userdata('social_redirect');
				$this->session->unset_userdata('social_redirect');
				if(!empty($social_redirect)){	
					redirect(base_url($social_redirect));
				}else{
					redirect(base_url());
				}
			}	
		}	
	}

	// FB Authentication
	public function fb_auth(){
		if ($this->facebook->logged_in()){
			$fb_data = $this->facebook->user();
            $this->facebook->destroy_session();
            if ($fb_data['code'] === 200){
				$id_array['facebook_auth_id'] = $fb_data['data']['id'];
				$email_array['user_email'] = $fb_data['data']['email'];	
				$status = 'active';
				$date = time();
				$mode = 'live';
				
				$fb_array['facebook_auth_id'] = $fb_data['data']['id'];
				$fb_array['user_name'] = $fb_data['data']['name'];
				$fb_array['user_email'] = $fb_data['data']['email'];
				$fb_array['status'] = $status;
				$fb_array['date'] = $date;

				$fbuser_array['user_mode'] = $mode;
				$fbuser_array['user_name'] = $fb_data['data']['name'];
				$fbuser_array['user_email'] = $fb_data['data']['email'];
				$fbuser_array['facebook_auth_id'] = $fb_data['data']['id'];
				$fbuser_array['status'] = $status;
				$fbuser_array['date'] = $date;

				$check_user_data = $this->Usher_m->get($email_array, TRUE);
				if(empty($check_user_data)){
					$this->Facebook_m->insert($fb_array);
					$this->Usher_m->insert($fbuser_array);
					$user_data = $this->Usher_m->get($email_array, TRUE);
					$this->registerEmail($user_data->user_name, $user_data->user_email);
					$this->notifications($user_data->user_id);
					$this->session->set_userdata('usher_id', $user_data->user_id);
					$this->session->set_userdata('usher_name', $user_data->user_name);
					$this->session->set_userdata('usher_email', $user_data->user_email);
					$this->session->set_flashdata('success', $this->lang->line('fb_success'));
					$social_redirect = $this->session->userdata('social_redirect');
					$this->session->unset_userdata('social_redirect');
					if(!empty($social_redirect)){	
						redirect(base_url($social_redirect));
					}else{
						redirect(base_url('start-project'));
					}
				}else{
					if($check_user_data->status == 'inactive'){
						$this->session->set_flashdata('error', $this->lang->line('fb_suspend'));
						$social_redirect = $this->session->userdata('social_redirect');
						$this->session->unset_userdata('social_redirect');
						if(!empty($social_redirect)){	
							redirect(base_url($social_redirect));
						}else{
							redirect(base_url('log-in'));
						}
					}else{
						$user_data = $this->Usher_m->get($email_array, TRUE);
						$this->session->set_userdata('usher_id', $user_data->user_id);
						$this->session->set_userdata('usher_name', $user_data->user_name);
						$this->session->set_userdata('usher_email', $user_data->user_email);
						$this->session->set_flashdata('success', $this->lang->line('fb_success'));
						$social_redirect = $this->session->userdata('social_redirect');
						$this->session->unset_userdata('social_redirect');
						if(!empty($social_redirect)){	
							redirect(base_url($social_redirect));
						}else{
							redirect(base_url('start-project'));
						}
					}	
				}	
			}
		}
		$this->session->set_flashdata('error', $this->lang->line('fb_error'));
		redirect(base_url('log-in'));
	}

	// Forgot Password
	public function forgot_password(){
		$usher_id = $this->session->userdata('usher_id');
		if (empty($usher_id)) {
			if (isset($_POST['forgot-password-submit'])) {
				$user_email = $this->input->post('user_email');
				if (!empty($user_email)) {
					$user_array['user_email'] = $user_email;
					$user_count = $this->Usher_m->count($user_array);
					if ($user_count == 1) {
						$user_data = $this->Usher_m->get($user_array, TRUE);
						if($user_email == $user_data->user_email){
							if($user_data->status == 'active'){
								if(!empty($user_data->user_password)){
									$user_id = $user_data->user_id;
				                    $user_name = $user_data->user_name;
				                    $user_email = $user_data->user_email;
									$change_password = md5(time());
									$pass_data['user_id'] = $user_id;
									$pass_data['change_password'] = $change_password;
									$pass_data['status'] = 'active';
									$pass_data['created_date'] = time();
									$this->ChangePassword_m->insert($pass_data);
									$this->forgotPasswordEmail($user_id, $user_name, $user_email, $change_password);
				                    $this->session->set_flashdata('success', $this->lang->line('forgot_success'));
								}else{
									if (!empty($user_data->google_auth_id)) {
										$this->session->set_flashdata('error', $this->lang->line('forgot_error_google'));	
									}
									if (!empty($user_data->facebook_auth_id)) {
										$this->session->set_flashdata('error', $this->lang->line('forgot_error_fb'));
									}
								}
							}else{
								$this->session->set_flashdata('error', $this->lang->line('forgot_suspend'));
							}	
						}else{
							$this->session->set_flashdata('error', $this->lang->line('forgot_no_email'));
						}		
					}else{
						$this->session->set_flashdata('error', $this->lang->line('forgot_no_email'));
					}	
	            }else{
	            	$this->session->set_flashdata('error', $this->lang->line('forgot_all_fill'));
				}
			}
			$this->data['title'] = $this->lang->line('forgot_title');
			$this->data['description'] = $this->lang->line('forgot_description');
			$this->data['keyword'] = $this->lang->line('forgot_keyword');
			$this->data['body'] = 'authentication/forgot_password';
			$this->load->view("auth_layout",$this->data);
		}else{
			redirect(base_url());
		}			
	}

	// Change Password
	public function change_password(){
		$type = $this->uri->segment(2);
		$token = $this->uri->segment(3);
		if (empty($token) || $type != 'change') {
	        redirect(base_url('signout'));        
	    }
	    if (isset($_POST['change-password-submit'])) {
	    	$user_id = $this->input->post('user_id');
	    	$user_password = $this->input->post('user_password');
	    	$conf_password = $this->input->post('conf_password');
	    	if (!empty($user_password) || !empty($conf_password)) {
	    		if ($user_password == $conf_password) {
	    			$array['user_password'] = $user_password;
	    			$id_array['user_id'] = $user_id;
	    			if ($this->Usher_m->update($array, $id_array)) {
	    				$p_array['status'] = 'inactive';
	    				$p_array['updated_date'] = time();
	    				$p_id['change_password'] = $token;
	    				$this->ChangePassword_m->update($p_array, $p_id);
	    				$this->session->set_flashdata('success', $this->lang->line('change_success'));
	    				redirect(base_url('log-in'));
	    			}else{
	    				$this->session->set_flashdata('error', $this->lang->line('change_error'));
	    			}
	    		}else{
	    			$this->session->set_flashdata('error', $this->lang->line('change_no_password'));	
	    		}
	    	}else{
	    		$this->session->set_flashdata('error', $this->lang->line('change_all_fill'));
	    	}
	    }
	    $pass_array['change_password'] = $token;
	    $pass_data = $this->ChangePassword_m->get($pass_array, TRUE);
		if(!empty($pass_data) && ($pass_data->status == 'active')){
		    $user_array['user_id'] = $pass_data->user_id;
		    $user_data = $this->Usher_m->get($user_array, TRUE);
		    $this->data['user_id'] = $user_data->user_id;
		    $this->data['user_name'] = $user_data->user_name;
		    $this->data['user_email'] = $user_data->user_email;
			$this->data['title'] = $this->lang->line('change_title');
			$this->data['description'] = $this->lang->line('change_description');
			$this->data['keyword'] = $this->lang->line('change_keyword');
			$this->data['body'] = 'authentication/change_password';
			$this->load->view("auth_layout",$this->data);
		}else{
			$this->session->set_flashdata('error', $this->lang->line('change_invalid'));
			redirect(base_url('log-in'));
		}	
	}

	// Notifications
	public function notifications($user_id){
		$notifi_id['user_id'] = $user_id;
		$notifi_arr['blogupdate'] = 'inactive';
		$notifi_arr['event'] = 'active';
		$notifi_arr['newfeature'] = 'active';
		$notifi_arr['promotion'] = 'active';
		$notifi_arr['technical'] = 'active';

		$this->Usher_m->update($notifi_arr, $notifi_id);
	}

	// FB Logout
	public function fb_logout(){
		$this->facebook->destroy_session();
		redirect(base_url('fb-authentication'));
	}

	// Logout
	function logout(){
		$this->session->unset_userdata('usher_id');
		$this->session->unset_userdata('usher_name');
		$this->session->unset_userdata('usher_email');
		$this->session->unset_userdata('social_redirect');
		$this->session->unset_userdata('file_data');
		$this->session->unset_userdata('order_data');
		$this->session->sess_destroy();
		delete_cookie('usher_id');
		delete_cookie('usher_name');
		delete_cookie('usher_email');
		redirect(base_url());
	}

}

