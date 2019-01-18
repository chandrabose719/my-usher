<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacture extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		// Design
		$this->lang->load('manufacture/index');
		$this->lang->load('manufacture/detail');
		$this->lang->load('manufacture/overview');
		$this->lang->load('manufacture/confirm');

		// Authentication
		$this->lang->load('authentication/register');

		// Session ID
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');

	}

	// Manufacture Page
	public function index(){
		$this->data['title'] = $this->lang->line('index_title');
		$this->data['description'] = $this->lang->line('index_description');
		$this->data['keyword'] = $this->lang->line('index_keyword');
		$this->data['body'] = 'manufacture/index';
		$this->load->view("main_layout",$this->data);
	}

	// Project Detail Page
	public function manufacture_details(){
		$user_id = $this->session->userdata('usher_id');
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		if (isset($_POST['cart-submit'])){
			foreach($file_data as $checkkey => $checkvalue){
				if ($file_data[$checkkey]['material_id'] == '' || $file_data[$checkkey]['layer_height_id'] == ''){
					$error = false;
					foreach($file_data as $cadkey => $cadvalue){
						$cadfile_id = $file_data[$cadkey]['file_id'];
						$cadapidata = json_decode($file_data[$cadkey]['cad_result']);
						$volume = $cadapidata->Volume;
						if (isset($_POST[$cadfile_id.'_material_id'])  && isset($_POST[$cadfile_id.'_layer_height_id'])) {
							if (isset($_POST[$cadfile_id.'_material_id'])) {
								$material_id = $this->input->post($cadfile_id.'_material_id');
								$file_data[$cadkey]['material_id'] = $material_id;
							}
							if (isset($_POST[$cadfile_id.'_layer_height_id'])) {
								$layer_height_id = $this->input->post($cadfile_id.'_layer_height_id');
								$file_data[$cadkey]['layer_height_id'] = $layer_height_id;	
							}
							if (isset($_POST[$cadfile_id.'_color_id'])) {
								$color_id = $this->input->post($cadfile_id.'_color_id');
								$file_data[$cadkey]['color_id'] = $color_id;
							}
							if (isset($_POST[$cadfile_id.'_post_process_id'])) {
								$post_process_id = $this->input->post($cadfile_id.'_post_process_id');
								$file_data[$cadkey]['post_process_id'] = $post_process_id;
							}
							$file_instruction = $this->input->post($cadfile_id.'_file_instruction');
							$file_data[$cadkey]['file_instruction'] = $file_instruction;
							// Material Details
							$mat_query['material_id'] = $material_id;
							$mat_data = $this->Material_m->get($mat_query, TRUE);	
							$material_name = $mat_data->material_name;
							// Layer Height Details
							$layer_height_query['layer_height_id'] = $layer_height_id;
							$layer_height_data = $this->LayerHeight_m->get($layer_height_query, TRUE);
							$layer_height_name = $layer_height_data->layer_height_name;
							// Price Details
							$price_query['material_name'] = $material_name;
							$price_query['layer_height_name'] = $layer_height_name;
							$price_data = $this->Price_m->get($price_query, TRUE);
							if (!empty($price_data)) {
								if ($price_data->density == 'NULL') {
									$file_amount = ($price_data->layer_height_rate + $volume * $price_data->material_rate);	
								}else{
									$file_amount = $volume * $price_data->density * $price_data->material_rate * $price_data->layer_height_rate;	
								}
							}else{
								$file_amount = 10;
							}
							$file_data[$cadkey]['file_amount'] = $file_amount;
						}else{
							$error = true;
							$this->session->set_flashdata('error','Please fill all fields!');
						}
					}
					if ($error != true) {	
						$this->session->set_userdata('file_data', $file_data);
						redirect(base_url('manufacture-overview'));
					}
				}else{
					redirect(base_url('manufacture-overview'));	
				}
			}	
		}
		if (!empty($user_id) && !empty($file_data)) {
			$this->data['title'] = $this->lang->line('detail_title');
			$this->data['description'] = $this->lang->line('detail_description');
			$this->data['keyword'] = $this->lang->line('detail_keyword');
			$this->data['file_data_result'] = $file_data;
			$this->data['order_data_result'] = $order_data;
			$this->data['body'] = 'manufacture/manufacture_details';
			$this->load->view("main_layout",$this->data);		
		}else{
			redirect(base_url('manufacture'));
		}		
	}

	// Overview Page
	public function manufacture_overview(){
		$user_id = $this->session->userdata('usher_id');
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		if (!empty($user_id) && !empty($file_data)) {
			$this->data['title'] = $this->lang->line('detail_title');
			$this->data['description'] = $this->lang->line('detail_description');
			$this->data['keyword'] = $this->lang->line('detail_keyword');
			$user_query['user_id'] = $user_id;
			$this->data['user_data'] = $this->Usher_m->get($user_query, TRUE);
			$this->data['file_data_result'] = $file_data;
			$this->data['order_data_result'] = $order_data;
			$this->data['body'] = 'manufacture/manufacture_overview';
			$this->load->view("main_layout",$this->data);	
		}else{
			redirect(base_url('manufacture'));
		}		
	}

	// Payment Page
	public function manufacture_payment(){
		$user_id = $this->session->userdata('usher_id');
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		// Start Payment
		\Stripe\Stripe::setVerifySslCerts(false);
		$token = $this->input->post('stripeToken');
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
			// Getting Order Details
	        $getorder_count = $this->Order_m->get_order_id();
	        $order_no = intval($getorder_count) + 100;
	        $year = substr(date('y'), -1);
	        $order_id = $this->Order_m->count();
	        $order_id = $order_id + 1;
	        $order = 'MO'.date('m').$year.$order_no;
	        $order_status = 'PROCESSING';
	        $order_date = time();
	        // Update File
	        foreach($file_data as $cadkey => $cadvalue){
				$file_query['file_qty'] = $cadvalue['file_qty'];
				$file_query['file_amount'] = $cadvalue['file_amount'];
				$file_query['file_unit'] = $cadvalue['file_unit'];
				$file_query['material_id'] = $cadvalue['material_id'];
				$file_query['layer_height_id'] = $cadvalue['layer_height_id'];
				$file_query['color_id'] = $cadvalue['color_id'];
				$file_query['post_process_id'] = $cadvalue['post_process_id'];
				$file_query['file_instruction'] = $cadvalue['file_instruction'];
				$file_query['delivery_type'] = $order_data['delivery_type'];
				$file_query['delivery_amount'] = $order_data['delivery_amount'];
				$file_query['order_id'] = $order_id;
				$file_query['file_status'] = 'PROCESSING';
				$file_query['cur_date'] = time();
				$file_id_array['file_id'] = $cadvalue['file_id'];
				$this->Manufacture_m->update($file_query, $file_id_array);
			}
			// Email Content
			$o_id = $order;
			$mlt_amount = $amount/100;
			$num_amount = number_format($mlt_amount, 2);
			$o_amount = $num_amount;
			$o_date = $order_date;
			// End Email Content

			$order_query['user_id'] = $user_id; 
			$order_query['payment_id'] = $payment_id; 
			$order_query['order'] = $order; 
			$order_query['payment_amount'] = $o_amount; 
			$order_query['order_status'] = $order_status; 
			$order_query['payment_status'] = $payment_status; 
			$order_query['order_date'] = $order_date; 
			$this->Order_m->insert($order_query);
			// $this->manufactureOrderEmail($o_id, $o_amount);
			$this->session->unset_userdata('file_data');
			$this->session->unset_userdata('order_data');
			$this->session->set_flashdata('success','You order has been successfully placed. Order details has been sent on your registered email.');
			redirect(base_url('manufacture-confirmation'));
		}else{
			$this->session->set_flashdata('error','Payment does not succeed, Try again!');
		}
		redirect(base_url('manufacture-overview'));		
	}
	
	public function manufacture_confirm(){
		$user_id = $this->session->userdata('usher_id');
		if(!empty($user_id)){
			$this->data['title'] = $this->lang->line('confirm_title');
			$this->data['description'] = $this->lang->line('confirm_description');
			$this->data['keyword'] = $this->lang->line('confirm_keyword');
			$this->data['body'] = 'manufacture/manufacture_confirm';
			$this->load->view("main_layout",$this->data);
		}else{
			redirect(base_url('manufacture'));
		}		
	}

	// Store Session
	public function store_session(){
		if (!empty($_FILES['fileDataArray'])) {
           	for($i = 0; $i < count($_FILES['fileDataArray']['name']); $i++) {
	           	$img = $_FILES['fileDataArray']['name'][$i];
				$tmp = $_FILES['fileDataArray']['tmp_name'][$i];
				$size = $_FILES['fileDataArray']['size'][$i];
				$file_status = 'INCOMPLETE';
				$status = 'active';
				$cur_date = time();
				
				// File Path
				$path = 'assets/images/cad_file/'.time().'_'.$img;
				move_uploaded_file($tmp, $path);

				// Get CAD Result from WebAPI
				$apiObject = new stdClass();
				$apiObject->fileName = $img;
				$apiObject->fileContent = file_get_contents($path);
				$apiObject->fileContent = base64_encode($apiObject->fileContent);
				$data_string = json_encode($apiObject);
				$url = "https://3dusher.online:8080/api/CADReader";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch,CURLOPT_VERBOSE, TRUE);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
				curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				$result = curl_exec($ch);
				// End WebAPI
        		// Store DB
        		$user_id = $this->session->userdata('usher_id');
        		$file_array['user_id'] = $user_id;
        		$file_array['file_name'] = $img;
        		$file_array['file_path'] = $path;
        		$file_array['file_size'] = $size;
        		$file_array['cad_result'] = $result;
        		$file_array['file_status'] = $file_status;
        		$file_array['status'] = $status;
        		$file_array['cur_date'] = $cur_date;
        		$file_id = $this->Manufacture_m->insert_file_data($file_array);
        		// File Session
        		$file_data = array(
                    "$img" => array(
                        'file_id' => $file_id,
						'user_id' => $user_id,
						'file_name' => $img,
						'cad_result' => $result,
						'file_qty' => 1,
						'file_amount' => 0,
						'file_unit' => 'mm',
						'material_id' => '',
						'layer_height_id' => '',
						'color_id' => '',
						'post_process_id' => '',
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

            	// Order Session
                $order_data = array(
                    'delivery_type' => 'Normal',
					'delivery_amount' => 10,
					'payment_amount' => 0,
					'order_id' => ''
                );
            	$session_order_data = $this->session->userdata('order_data');
            	if (empty($session_order_data)) {
            		$session_order_data = $order_data;			
            		$this->session->set_userdata('order_data', $session_order_data);
            	}
            	$data = 'success';
            }
        }	
        echo $data;
	}

	// Display Color, Layer Height
	public function color_process(){
		$file_id = $this->input->post('file_id');
		$material_id = $this->input->post('material_id');
		$opt_array['material_id'] = $material_id;
		$opt_array['status'] = 'active';
		
		// Layer Height Data
		$layer_height_data = $this->LayerHeight_m->get($opt_array);
		if (!empty($layer_height_data)) {
			$color_process_result = '
				<div class="row">	
					<div class="col-sm-12">
						<div class="cad-input">	
							<div class="form-group">
			    				<label class="float-left">LAYER HEIGHT</label>
			    				<select class="form-control" id="'.$file_id.'_layer_height_id" name="'.$file_id.'_layer_height_id" onchange="costCalculation('.$file_id.')">';
			  						foreach ($layer_height_data as $row) {
			  							$color_process_result .= '<option value='. $row->layer_height_id .'>'. $row->layer_height_name .'</option>';
									}
									$color_process_result .= '
								</select>  				
			  				</div>
						</div>	
					</div>
				</div>
			';
		}

		// Color Data 
		$color_data = $this->Color_m->get($opt_array);
		if (!empty($color_data)) {
			$color_process_result .= '
				<div class="row">	
					<div class="col-sm-12">
						<div class="cad-input">	
							<div class="form-group">
			    				<label class="float-left">COLOR</label>
			    				<select class="form-control" id="'.$file_id.'_post_process_id" name="'.$file_id.'_post_process_id">';
			  						foreach ($color_data as $row) {
			  							$color_process_result .= '<option value='. $row->color_id .'>'. $row->color_name .'</option>';
									}
									$color_process_result .= '
								</select>  				
			  				</div>
						</div>	
					</div>
				</div>
			';
		}
		
		// Post Process Data 
		$post_process_data = $this->PostProcess_m->get($opt_array);
		if (!empty($post_process_data)) {
			$color_process_result .= '
				<div class="row">	
					<div class="col-sm-12">
						<div class="cad-input">	
							<div class="form-group">
			    				<label class="float-left">POST PROCESSS</label>
			    				<select class="form-control" id="'.$file_id.'_post_process_id" name="'.$file_id.'_post_process_id">';
			  						foreach ($post_process_data as $row) {
			  							$color_process_result .= '<option value='. $row->post_process_id .'>'. $row->post_process_name .'</option>';
									}
									$color_process_result .= '
								</select>  				
			  				</div>
						</div>	
					</div>
				</div>
			';
		}
		// Special Note
		$color_process_result .= '
			<div class="row">	
				<div class="col-sm-12">
					<div class="cad-input">	
						<div class="form-group">
		    				<label class="float-left">SPECIAL NOTE (If any)</label>
		    				<input type="text" class="form-control" id="'.$file_id.'_file_instruction" name="'.$file_id.'_file_instruction">
		  				</div>
					</div>	
				</div>
			</div>
		';

		// Cost Calculation
		// Material Details
		$mat_array['material_id'] = $material_id;
		$mat_array['status'] = 'active';
		$mat_result = $this->Material_m->get($mat_array, TRUE);
		$material_name = $mat_result->material_name;
		// Layer Height Details
		$layer_height_name = 100;

		$get_volume = $this->session->userdata('file_data');
		foreach($get_volume as $cadkey => $cadvalue){
			if($get_volume[$cadkey]['file_id'] == $file_id){
				$apidata = json_decode($get_volume[$cadkey]['cad_result']);
				$volume = $apidata->Volume;
			}		
		}
		
		// Price Details
		$price_query['material_name'] = $material_name;
		$price_query['layer_height_name'] = $layer_height_name;
		$price_data = $this->Price_m->get($price_query, TRUE);
		if (!empty($price_data)) {
			if ($price_data->density == 'NULL') {
				$product_amount = ($price_data->layer_height_rate + $volume * $price_data->material_rate);	
			}else{
				$product_amount = $volume * $price_data->density * $price_data->material_rate * $price_data->layer_height_rate;	
			} 
		}else{
			$product_amount = 10;
		}
		$price_content = '<h4>&#36; '.number_format($product_amount, 2).'</h4>';	

		$result = array(
			'color_process_result' => $color_process_result,
			'price_content' => $price_content
		);
		echo json_encode($result);
	}

	// Display Cost by Layer Height
	public function cost_calc(){
		$file_id = $this->input->post('file_id');
		$material_id = $this->input->post('material_id');
		$layer_height_id = $this->input->post('layer_height_id');
		// Material Details
		$mat_array['material_id'] = $material_id;
		$mat_data = $this->Material_m->get($mat_array, TRUE);
		$material_name = $mat_data->material_name;
		// Layer Height Details
		$layer_height_array['layer_height_id'] = $layer_height_id;
		$layer_height_data = $this->LayerHeight_m->get($layer_height_array, TRUE);
		$layer_height_name = $layer_height_data->layer_height_name;
		// Volume Details
		$get_volume = $this->session->userdata('file_data');
		foreach($get_volume as $cadkey => $cadvalue){
			if($get_volume[$cadkey]['file_id'] == $file_id){
				$apidata = json_decode($get_volume[$cadkey]['cad_result']);
				$volume = $apidata->Volume;
			}		
		}
		// Price Details
		$price_query['material_name'] = $material_name;
		$price_query['layer_height_name'] = $layer_height_name;
		$price_data = $this->Price_m->get($price_query, TRUE);
		if (!empty($price_data)) {
			if ($price_data->density == 'NULL') {
				$product_amount = ($price_data->layer_height_rate + $volume * $price_data->material_rate);	
			}else{
				$product_amount = $volume * $price_data->density * $price_data->material_rate * $price_data->layer_height_rate;	
			} 
		}else{
			$product_amount = 10;
		}
		$price_content = '<h4>&#36; '.number_format($product_amount, 2). '</h4>';
		$result =  $price_content;
		echo $result;
	}

	// File Qty
	public function file_qty(){
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$file_data = $this->session->userdata('file_data');
		if ($type == 'increament') {
			foreach($file_data as $cadkey => $cadvalue){
				if($file_data[$cadkey]['file_id'] == $id){
					$file_data[$cadkey]['file_qty'] += 1;				
				}		
			}	
		}
		if ($type == 'decreament') {
			foreach($file_data as $cadkey => $cadvalue){
				if($file_data[$cadkey]['file_id'] == $id){
					$file_data[$cadkey]['file_qty'] -= 1;
				}	
			}
		}
		$this->session->set_userdata('file_data', $file_data);
		redirect(base_url('manufacture-overview'));
	}

	public function delivery_type(){
		$type = $this->uri->segment(3);
		$amount = $this->uri->segment(4);
		$order_data = $this->session->userdata('order_data');
		$order_data['delivery_type'] = $type;
		$order_data['delivery_amount'] = $amount;		
		$this->session->set_userdata('order_data', $order_data);
		redirect(base_url('manufacture-overview'));
	}

}

