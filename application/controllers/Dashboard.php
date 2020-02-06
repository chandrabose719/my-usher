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
		$this->lang->load('dashboard/quoteHistory');
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

	// Manufacture Order
	public function manufacture_complete(){
		$user_id = $this->session->userdata('usher_id');
		$order_array['user_id'] = $user_id;
		$user_data = $this->Usher_m->get($order_array, TRUE);
		if($user_data->user_mode == 'test'){
			$order_result = $this->Testorder_m->get($order_array);
		}else{
			$order_result = $this->Order_m->get($order_array);	
		}
		$this->data['user_data'] = $user_data;
		$this->data['order_result'] = $order_result;
		$this->data['title'] = $this->lang->line('complete_title');
		$this->data['description'] = $this->lang->line('complete_description');
		$this->data['keyword'] = $this->lang->line('complete_keyword');
		$this->data['body'] = 'dashboard/manufacture_complete';
		$this->load->view("dashboard_layout",$this->data);
	}

	// Manual Quote
	public function quote_history(){
		$user_id = $this->session->userdata('usher_id');
		$user_arr['user_id'] = $user_id;
		$user_data = $this->Usher_m->get($user_arr, TRUE);
		if($user_data->user_mode == 'test'){
			$order_result = $this->Testorder_m->get_order($user_id);
		}else{
			$order_result = $this->Order_m->get_order($user_id);	
		}
		$this->data['user_data'] = $user_data;
		$this->data['order_result'] = $order_result;
		$this->data['title'] = $this->lang->line('quote_title');
		$this->data['description'] = $this->lang->line('quote_description');
		$this->data['keyword'] = $this->lang->line('quote_keyword');
		$this->data['body'] = 'dashboard/quote_history';
		$this->load->view("dashboard_layout",$this->data);
	}

	// RFQ Download
	public function rfq_download(){
		$order_id = $this->uri->segment(2);
		$array['order_id'] = $order_id;
		$order_data = $this->Order_m->get($array, TRUE);
        $path = $order_data->manual_quote_file;
        $name = $order_data->order;
        
        $this->load->helper('file');
        $mime = get_mime_by_extension($path);
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private',false);
        header('Content-Type: '.$mime);
        header('Content-Disposition: attachment; filename="'.basename($name).'"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($path));
        header('Connection: close');
        readfile($path);	
	}

	// RFQ Payment
	public function rfq_payment(){
		$order_id = $this->uri->segment(2);
		$order_array['order_id'] = $order_id;
		$order_array['order_status'] = 'PAYMENT';
		$order_result = $this->Order_m->get($order_array, TRUE);
		if(!empty($order_result)){
			$this->data['order_result'] = $order_result;
			$this->data['title'] = $this->lang->line('rfq_title');
			$this->data['description'] = $this->lang->line('rfq_description');
			$this->data['keyword'] = $this->lang->line('rfq_keyword');
			$this->data['body'] = 'dashboard/rfq_payment';
			$this->load->view("dashboard_layout", $this->data);
		}else{
			redirect(base_url('quote-history'));
		}	
	}

	// Payment Submit
	public function rfq_payment_submit(){
		$user_id = $this->session->userdata('usher_id');
		// Start Payment
		\Stripe\Stripe::setVerifySslCerts(false);
		$token = $this->input->post('stripeToken');
		$order_id = $this->input->post('order_id');
		$amount = $this->input->post('stripe_amount');
		// Charge From User
		$charge = \Stripe\Charge::create([
		    'amount' => intval($amount),
		    'currency' => 'usd',
		    'description' => '3D Usher Manufacturing',
		    'source' => $token,
		]);
		// End Payment

		// Store to Database
		if ($charge->status == 'succeeded') {
			$payment_id = $charge->id;
			$payment_status = $charge->status;
			$payment_amount = $amount/100;
			$status = 'PROCESSING';
	        $date = time();
	        // Update File
	        $file_query['file_status'] = $status;
			$file_query['cur_date'] = $date;
			$file_id_array['order_id'] = $order_id;
			$this->Manufacture_m->update($file_query, $file_id_array);
			// Update Order
			$order_query['payment_id'] = $payment_id; 
			$order_query['payment_status'] = $payment_status;
			$order_query['order_status'] = $status; 
			$order_query['order_date'] = $date; 
			$order_id_array['order_id'] = $order_id; 
			$this->Order_m->update($order_query, $order_id_array);
			$this->session->set_flashdata('success','You order has been successfully placed. Order details has been sent on your registered email.');
			redirect(base_url('manufacturing-orders'));
		}else{
			$this->session->set_flashdata('error','Payment does not succeed, Try again!');
		}
		redirect(base_url('rfq-payment'));	
	}

	// Incomplete Page
	public function manufacture_incomplete(){
		$user_id = $this->session->userdata('usher_id');
		$user_arr['user_id'] = $user_id;
		$user_data = $this->Usher_m->get($user_arr, TRUE);
		$file_array['user_id'] = $user_id;
		$file_array['file_status'] = 'INCOMPLETE';
		if($user_data->user_mode == 'test'){
			$file_result = $this->Testmanu_m->get($file_array);
		}else{
			$file_result = $this->Manufacture_m->get($file_array);	
		}
		$this->data['user_data'] = $user_data;
		$this->data['file_result'] = $file_result;
		$this->data['title'] = $this->lang->line('incomplete_title');
		$this->data['description'] = $this->lang->line('incomplete_description');
		$this->data['keyword'] = $this->lang->line('incomplete_keyword');
		$this->data['body'] = 'dashboard/manufacture_incomplete';
		$this->load->view("dashboard_layout",$this->data);
	}

	// Store Session
	public function incomplete_in_store_session(){
		$user_id = $this->session->userdata('usher_id');
		$user_arr['user_id'] = $user_id;
		$user_data = $this->Usher_m->get($user_arr, TRUE);
		$file_id_array = $this->input->post('file_id');
		foreach ($file_id_array as $file_id_value) {
			$f_arr['file_id'] = $file_id_value;
			if($user_data->user_mode == 'test'){
				$file_value = $this->Testmanu_m->get($f_arr, TRUE);
			}else{
				$file_value = $this->Manufacture_m->get($f_arr, TRUE);
			}
			// File Session
			$cad_result = json_decode($file_value->cad_result);
			$file_dx = $cad_result->DimensionX;
			$file_dy = $cad_result->DimensionY;
			$file_dz = $cad_result->DimensionZ;
			$file_volume = $cad_result->Volume;
			$file_surface = $cad_result->SurfaceArea;
			$file_data = array(
	            "$file_value->file_name" => array(
	                'file_id' => $file_value->file_id,
					'user_id' => $user_id,
					'file_name' => $file_value->file_name,
					'cad_result' => $file_value->cad_result,
					'file_qty' => $file_value->file_qty,
					'file_amount' => '',
					'file_unit' => $file_value->file_unit,
					'file_dx' => $file_dx,
					'file_dy' => $file_dy,
					'file_dz' => $file_dz,
					'file_volume' => $file_volume,
					'file_surface' => $file_surface,
					'file_instruction' => ''
	            )
	        );
	        $session_file_data = $this->session->userdata('file_data');
	    	if (empty($session_file_data)) {
	    		$session_file_data = $file_data;			
	    		$this->session->set_userdata('file_data', $session_file_data);
	    	}else{
	    		$session_file_data = array_merge($session_file_data, $file_data);
	    		$this->session->set_userdata('file_data', $session_file_data);
	    	}
	    }	

    	// Order Session
        $order_data = array(
            'user_mode' => $user_data->user_mode,
            'user_level' => 'DS',
            'requirement_id' => '',
            'requirement_custom' => '',
            'priority_id' => '',
            'quantity_id' => '',
            'technology_id' => '',
            'material_id' => '',
            'manual_quote' => '',
            'communication_mode' => 'email',
            'payment_amount' => '',
            'delivery_type' => 'Normal',
			'delivery_amount' => 10,
			'discount_id' => '',
			'discount_amount' => '',
			'order_id' => '',
			'order_status' => ''
        );
    	$this->session->set_userdata('order_data', $order_data);
    	redirect(base_url('manufacture-details'));
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
	        if (!empty($user_name) && !empty($user_mobile) && !empty($billing_address) && !empty($billing_city) && !empty($billing_state) && !empty($billing_country) && !empty($billing_zipcode)) {
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

	public function change_status(){
		$type = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		$user_id = $this->session->userdata('usher_id');	
		$id_array['user_id'] = $user_id;
		$array[$type] = $status;
		$this->Usher_m->update($array, $id_array);
		$this->session->set_flashdata('success','Status changed.');
		redirect(base_url('account-settings'));
	}

	// AJAX
	public function payable_amount(){
		$order_id = $this->input->post('order_id');	
		$order_array['order_id'] = $order_id;
		$order_array['order_status'] = 'PAYMENT';
		$order_result = $this->Order_m->get($order_array, TRUE);
		if(!empty($order_result)){
			$payable_amount = $order_result->payment_amount;	
		}else{
			$payable_amount = '';
		}
		echo $payable_amount;
	}
}

