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
	// ********************
	// Manufacture Page
	public function index(){
		redirect(base_url('manufacture-details'));		
	}
	// ********************

	// ********************
	// Maunfacture Details
	public function manufacture_details(){
		$user_id = $this->session->userdata('usher_id');
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		if(empty($user_id)){
			$this->session->set_userdata('social_redirect', 'manufacture-details');
		}
		$this->data['title'] = $this->lang->line('detail_title');
		$this->data['description'] = $this->lang->line('detail_description');
		$this->data['keyword'] = $this->lang->line('detail_keyword');
		$user_arr['user_id'] = $user_id;
		$user_data = $this->Usher_m->get($user_arr, TRUE);
		$this->data['user_data'] = $user_data;
		$this->data['file_data_result'] = $file_data;
		$this->data['order_data_result'] = $order_data;

		if(!empty($order_data)){
			if(($order_data['user_level'] == 'QA') && !empty($order_data['priority_id']) && !empty($order_data['requirement_id']) && !empty($order_data['quantity_id']) && !empty($order_data['material_id'])){
				$technology_result = $this->technology_content($order_data['requirement_id'], $order_data['priority_id'], $order_data['quantity_id'], $order_data['technology_id']);
				$technology_result = json_decode($technology_result);
				$this->data['question_technology'] = $technology_result->technology_content;

				$material_result = $this->material_content($order_data['technology_id'], $order_data['material_id']);
				$material_result = json_decode($material_result);
				$this->data['question_material'] = $material_result->material_content;	
			}
			if(($order_data['user_level'] == 'DS') && !empty($order_data['technology_id']) && !empty($order_data['material_id'])){
				$this->data['direct_material'] = '';
			}
		}		
		
		$this->data['body'] = 'manufacture/manufacture_details';
		$this->load->view("main_layout",$this->data);		
	}

	// File Details Stored in Session
	public function store_session(){
		$data = '';
		$user_mode = '';
		$UPLOAD_ERROR = TRUE;
		$file_name_arr = array();
		$user_arr['user_id'] = $this->session->userdata('usher_id');
		$user_data = $this->Usher_m->get($user_arr, TRUE);
		if(!empty($user_data->user_mode)){	
			$user_mode = $user_data->user_mode;
		}
		if (!empty($_FILES['fileDataArray'])) {
           	for($i = 0; $i < count($_FILES['fileDataArray']['name']); $i++) {
	           	$img = $_FILES['fileDataArray']['name'][$i];
				$tmp = $_FILES['fileDataArray']['tmp_name'][$i];
				$size = $_FILES['fileDataArray']['size'][$i];
				$file_status = 'INCOMPLETE';
				$status = 'active';
				$cur_date = time();
				
				// File Path
				if($user_mode == 'live'){
					$path = 'assets/images/cad_file/'.time().'_'.$img;
				}elseif($user_mode == 'test'){
					$path = 'assets/images/test_cad_file/'.time().'_'.$img;
				}else{
					$path = 'assets/images/cad_file/'.time().'_'.$img;
				}
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
				curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
				curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				$result = curl_exec($ch);
				// End WebAPI
        		// print_r($data_string);
        		print_r($result);
				// $apidata = json_decode($result);
				// $file_dx = $apidata->DimensionX;
				// $file_dy = $apidata->DimensionY;
				// $file_dz = $apidata->DimensionZ;
				// $file_volume = $apidata->Volume;
				// $file_surface = $apidata->SurfaceArea;

				// if(empty($file_dx) || empty($file_dy) || empty($file_dz) || empty($file_volume) || empty($file_surface) || ($file_dx <= 0) || ($file_dy <= 0) || ($file_dz <= 0) || ($file_volume <= 0) || ($file_surface <= 0)){
				// 	$data = 'success';
				// 	$UPLOAD_ERROR = FALSE;
				// 	$file_name_arr[] = $img;
				// }else{
				// 	// Store DB
	   //      		$user_id = $this->session->userdata('usher_id');
	   //      		$file_array['user_id'] = $user_id;
	   //      		$file_array['file_name'] = $img;
	   //      		$file_array['file_path'] = $path;
	   //      		$file_array['file_size'] = $size;
	   //      		$file_array['cad_result'] = $result;
	   //      		$file_array['file_qty'] = 1;
	   //      		$file_array['file_unit'] = 'mm';
	   //      		$file_array['file_status'] = $file_status;
	   //      		$file_array['status'] = $status;
	   //      		$file_array['cur_date'] = $cur_date;
	   //      		if($user_data->user_mode == 'test'){
				// 		$file_id = $this->Testmanu_m->insert_file_data($file_array);
				// 	}else{
				// 		$file_id = $this->Manufacture_m->insert_file_data($file_array);
				// 	}
	        		
	   //      		// File Session
				// 	$file_data = array(
	   //                  "$img" => array(
	   //                      'file_id' => $file_id,
				// 			'user_id' => $user_id,
				// 			'file_name' => $img,
				// 			'cad_result' => $result,
				// 			'file_qty' => 1,
				// 			'file_amount' => '',
				// 			'file_unit' => 'mm',
				// 			'file_dx' => $file_dx,
				// 			'file_dy' => $file_dy,
				// 			'file_dz' => $file_dz,
				// 			'file_volume' => $file_volume,
				// 			'file_surface' => $file_surface,
				// 			'file_instruction' => ''
	   //                  )
	   //              );
	   //              $session_file_data = $this->session->userdata('file_data');
	   //          	if (empty($session_file_data)) {
	   //          		$session_file_data = $file_data;			
	   //          		$this->session->set_userdata('file_data', $session_file_data);
	   //          	}else{
	   //          		$session_file_data = array_merge($session_file_data, $file_data);
	   //          		$this->session->set_userdata('file_data', $session_file_data);
	   //          	}

	   //          	// Order Session
	   //              $order_data = array(
	   //                  'user_mode' => $user_mode,
	   //                  'user_level' => 'DS',
	   //                  'requirement_id' => '',
	   //                  'requirement_custom' => '',
	   //                  'priority_id' => '',
	   //                  'quantity_id' => '',
	   //                  'technology_id' => '',
	   //                  'material_id' => '',
	   //                  'manual_quote' => '',
	   //                  'communication_mode' => 'email',
	   //                  'payment_amount' => '',
	   //                  'delivery_type' => 'Normal',
				// 		'delivery_amount' => 10,
				// 		'discount_id' => '',
				// 		'discount_amount' => '',
				// 		'order_id' => '',
				// 		'order_status' => ''
	   //              );
	   //          	$this->session->set_userdata('order_data', $order_data);
	   //          	$data = 'success';
	   //          }	
            }
        }
        // if($UPLOAD_ERROR == FALSE){
        // 	if(!empty($file_name_arr)){
        // 		$imp_file_name = implode(', ', $file_name_arr);
        // 		$this->session->set_flashdata('error', $imp_file_name.' seems to have some issue with the file. Please contact sales for quotation');
        // 	}    	
        // }
        // echo $data;
	}

	// Delete All Manufacture File
	public function manufacture_all_delete(){
		$this->session->unset_userdata('file_data');
		$this->session->unset_userdata('order_data');
		redirect(base_url('manufacture-details'));
	}

	// Delete Manufacture File
	public function manufacture_delete(){
		$file_id = $this->uri->segment(2);
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		foreach($file_data as $cadkey => $cadvalue){
			if($cadvalue['file_id'] == $file_id){
				unset($file_data[$cadkey]);
				if (empty($file_data)) {
					$this->session->unset_userdata('file_data');			
					$this->session->unset_userdata('order_data');			
				}else{
					
					$this->session->set_userdata('file_data', $file_data);
				}
				redirect(base_url('manufacture-details'));
			}
		}
	}

	// Change Dimention Units
	public function change_unit(){
		$return_message = '';
		$file_id = $this->input->post('file_id');
		$file_unit = $this->input->post('file_unit');
		$file_data = $this->session->userdata('file_data');
		foreach($file_data as $cadkey => $cadvalue){
			if($file_data[$cadkey]['file_id'] == $file_id){
				$apidata = json_decode($file_data[$cadkey]['cad_result']);
				if($file_unit == $this->lang->line('cm')){
					$unit = $file_unit;
					$dx = $apidata->DimensionX * $this->lang->line('cm_dimention');
					$dy = $apidata->DimensionY * $this->lang->line('cm_dimention');
					$dz = $apidata->DimensionZ * $this->lang->line('cm_dimention');
					$volume = $apidata->Volume * $this->lang->line('cm_volume');
					$surface = $apidata->SurfaceArea * $this->lang->line('cm_surface');
				}else if($file_unit == $this->lang->line('in')){
					$unit = $file_unit;
					$dx = $apidata->DimensionX * $this->lang->line('in_dimention');
					$dy = $apidata->DimensionY * $this->lang->line('in_dimention');
					$dz = $apidata->DimensionZ * $this->lang->line('in_dimention');
					$volume = $apidata->Volume * $this->lang->line('in_volume');
					$surface = $apidata->SurfaceArea * $this->lang->line('in_surface');
				}else{
					$unit = $file_unit;
    				$dx = $apidata->DimensionX;
					$dy = $apidata->DimensionY;
					$dz = $apidata->DimensionZ;
					$volume = $apidata->Volume;
					$surface = $apidata->SurfaceArea;
				}
				$file_data[$cadkey]['file_unit'] = $unit;
				$file_data[$cadkey]['file_dx'] = $dx;
				$file_data[$cadkey]['file_dy'] = $dy;
				$file_data[$cadkey]['file_dz'] = $dz;
				$file_data[$cadkey]['file_volume'] = $volume;
				$file_data[$cadkey]['file_surface'] = $surface;
				$return_message = 'success';
				$this->session->set_userdata('file_data', $file_data);
			}
		}
		echo $return_message;
	}

	// Apply Units in All Files
	public function apply_all(){
		$result = '';
		$file_unit = $this->input->post('file_unit');
		$file_data = $this->session->userdata('file_data');
		foreach($file_data as $cadkey => $cadvalue){
			$apidata = json_decode($file_data[$cadkey]['cad_result']);
			if($file_unit == $this->lang->line('cm')){
				$unit = $file_unit;
				$dx = $apidata->DimensionX * $this->lang->line('cm_dimention');
				$dy = $apidata->DimensionY * $this->lang->line('cm_dimention');
				$dz = $apidata->DimensionZ * $this->lang->line('cm_dimention');
				$volume = $apidata->Volume * $this->lang->line('cm_volume');
				$surface = $apidata->SurfaceArea * $this->lang->line('cm_surface');
			}else if($file_unit == $this->lang->line('in')){
				$unit = $file_unit;
				$dx = $apidata->DimensionX * $this->lang->line('in_dimention');
				$dy = $apidata->DimensionY * $this->lang->line('in_dimention');
				$dz = $apidata->DimensionZ * $this->lang->line('in_dimention');
				$volume = $apidata->Volume * $this->lang->line('in_volume');
				$surface = $apidata->SurfaceArea * $this->lang->line('in_surface');
			}else{
				$unit = $file_unit;
				$dx = $apidata->DimensionX;
				$dy = $apidata->DimensionY;
				$dz = $apidata->DimensionZ;
				$volume = $apidata->Volume;
				$surface = $apidata->SurfaceArea;
			}
			$file_data[$cadkey]['file_unit'] = $unit;
			$file_data[$cadkey]['file_dx'] = $dx;
			$file_data[$cadkey]['file_dy'] = $dy;
			$file_data[$cadkey]['file_dz'] = $dz;
			$file_data[$cadkey]['file_volume'] = $volume;
			$file_data[$cadkey]['file_surface'] = $surface;
			$this->session->set_userdata('file_data', $file_data);
			$result = 'success';
		}
		echo $result;
	}

	// Change File Quantity
	public function change_file_qty(){
		$return_message = '';
		$file_id = $this->input->post('file_id');
		$file_qty = $this->input->post('file_qty');
		$file_data = $this->session->userdata('file_data');
		foreach($file_data as $cadkey => $cadvalue){
			if($file_data[$cadkey]['file_id'] == $file_id){
				$file_data[$cadkey]['file_qty'] = $file_qty;
				$return_message = 'success';
				$this->session->set_userdata('file_data', $file_data);
			}
		}
		echo $return_message;
	}

	// Display Question technology Details
	public function question_technology(){
		$requirement_id = $this->input->post('requirement');
		$priority_id = $this->input->post('priority');
		$quantity_id = $this->get_quantity_id();
		$result = $this->technology_content($requirement_id, $quantity_id, $priority_id);
		echo $result;
	}

	// Display Question Material Details
	public function question_material(){
		$technology_id = $this->input->post('technology_id');
		$result = $this->material_content($technology_id);
		echo $result;
	}

	// Display Qoute or RFQ Info in Price Body
	public function question_quote(){
		$material_id = $this->input->post('material');
		$mat_array['material_id'] = $material_id;
		$mat_data = $this->IMaterial_m->get($mat_array, TRUE);
		if(!empty($mat_data->density) && !empty($mat_data->material_cost) && !empty($mat_data->unit_cost)) {
			$cost_content = $this->instant_cost_content($type = 'question', $material_id);
			$address_content = '';
		}else{
			$cost_content = $this->manual_cost_content();
			$address_content = $this->address_content();
		}
		$result = array(
			'cost_content' => $cost_content,
			'address_content' => $address_content
		);
		echo json_encode($result);
	}

	// Display Materials Directly
	public function get_direct_material(){
		$material_content = '';
		$technology_id = $this->input->post('technology_id');
		$mat_array['status'] = 'active';
		$mat_array['technology_id'] = $technology_id;
		$mat_data = $this->IMaterial_m->get($mat_array);
		if(!empty($mat_data)){
			$material_content .= '
				<div class="direct-material-div">
					<p class="text-muted">Material</p>
					<div class="direct-material-content">
						<div class="row">';
							foreach ($mat_data as $mat_value) {
								$material_content .= '
									<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<div class="form-radio">
											<label class="radio-label">'.$mat_value->material_name.'
										  		<input type="radio" class="radio-input" name="direct_material" value="'.$mat_value->material_id.'" onchange="getDirectQuote()">
										  		<span class="radio-round"></span>
											</label>
										</div>
									</div>
								';
							}
							$material_content .= '
						</div>
					</div>
				</div>	
			';
			$cost_content = $this->default_cost_content();
			$address_content = '';
		}else{
			$material_content .= '
				<div class="direct-material-div">
					<p class="text-muted">Material</p>
					<div class="direct-material-content">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<p class="my-2 mr-2 text-success">
									No Materials
								</p>
							</div>
						</div>
					</div>
				</div>
			';
			$cost_content = $this->manual_cost_content();
			$address_content = $this->address_content();
		}
		$result = array(
			'material_content' => $material_content,
			'cost_content' => $cost_content,
			'address_content' => $address_content
		);
		echo json_encode($result);
	}

	// Display Instant Quote or RFQ Directly in Price Body
	public function get_direct_instant(){
		$technology_id = $this->input->post('technology_id');
		$material_id = $this->input->post('material_id');
		$mat_array['material_id'] = $material_id;
		$mat_data = $this->IMaterial_m->get($mat_array, TRUE);
		if(!empty($mat_data->density) && !empty($mat_data->material_cost) && !empty($mat_data->unit_cost)){
			$cost_content_result = $this->instant_cost_content($type = 'direct', $material_id);
			$cost_content = $cost_content_result;
			$address_content = '';
		}else{
			$cost_content = $this->manual_cost_content();
			$address_content = $this->address_content();
		}
		$result = array(
			'cost_content' => $cost_content,
			'address_content' => $address_content
		);
		echo json_encode($result);
	}

	// Store Address Details in Popup
	public function store_address(){
		$user_id = $this->session->userdata('usher_id');
		$user_mobile = $this->input->post('user_mobile');
		$billing_address = $this->input->post('billing_address');		
		$billing_address1 = $this->input->post('billing_address1');		
		$billing_city = $this->input->post('billing_city');		
		$billing_state = $this->input->post('billing_state');		
		$billing_country = $this->input->post('billing_country');		
		$billing_zipcode = $this->input->post('billing_zipcode');		
		$shipping_address = $this->input->post('shipping_address');		
		$shipping_address1 = $this->input->post('shipping_address1');		
		$city = $this->input->post('city');		
		$state = $this->input->post('state');		
		$country = $this->input->post('country');		
		$pin_code = $this->input->post('pin_code');
		$update_data['user_mobile'] = $user_mobile;
		$update_data['billing_address'] = $billing_address;
		$update_data['billing_address1'] = $billing_address1;
		$update_data['billing_city'] = $billing_city;
		$update_data['billing_state'] = $billing_state;
		$update_data['billing_country'] = $billing_country;
		$update_data['billing_zipcode'] = $billing_zipcode;

		$update_data['shipping_address'] = $shipping_address;
		$update_data['shipping_address1'] = $shipping_address1;
		$update_data['city'] = $city;
		$update_data['state'] = $state;
		$update_data['country'] = $country;
		$update_data['pin_code'] = $pin_code;
		$update_id['user_id'] = $user_id;
		if($this->Usher_m->update($update_data, $update_id)) {
			$address_content = $this->address_content();
		}else{
			$address_content = $this->address_content();
		}
		$result = array(
			'address_content' => $address_content
		);
		echo json_encode($result);
	}

	// Store Manual Request Details in Session
	public function manual_quote(){
		$user_id = $this->session->userdata('usher_id');
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		
		$user_level = $this->input->post('user_level');
		// QA
		$requirement_id = $this->input->post('requirement_id');
        $requirement_custom = $this->input->post('requirement_custom');
        $priority_id = $this->input->post('priority_id');
        $quantity_id = '';
        if($user_level == 'QA'){
        	$quantity_id = $this->get_quantity_id();
        }
        // DS
        $direct_technology = $this->input->post('direct_technology');
        $direct_material = $this->input->post('direct_material');
        
        $order_data['user_level'] = $user_level;
        $order_data['requirement_id'] = $requirement_id;
		$order_data['requirement_custom'] = $requirement_custom;	
        $order_data['priority_id'] = $priority_id;
        $order_data['quantity_id'] = $quantity_id;
		$order_data['technology_id'] = $direct_technology;
		$order_data['material_id'] = $direct_material;
		$order_data['payment_amount'] = '';
		$order_data['manual_quote'] = TRUE;
		$this->session->set_userdata('order_data', $order_data);	
		$order_data = $this->session->userdata('order_data');	
		echo 'success';
	}

	// Instant Quote Submit
	public function instant_quote(){
		$user_id = $this->session->userdata('usher_id');
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		$instant_quote = FALSE;
		// Question Selection Instant Quote
		if (isset($_POST['instant-quote-submit'])){
			$user_level = 'QA';
			$requirement_id = $this->input->post('requirement_id');
            $requirement_custom = '';
            if($requirement_id == '4'){
				$requirement_custom = $this->input->post('material_requirement_custom');	
			}
            $priority_id = $this->input->post('priority_id');
            $quantity_id = $this->get_quantity_id();	
        	$material_id = $this->input->post('professional_material');
			$mat_array['material_id'] = $material_id;
			$mat_data = $this->IMaterial_m->get($mat_array, TRUE);
			$cost = $this->material_cost($material_id);
			$technology_id = $mat_data->technology_id;
			$payment_amount = $cost;
			$instant_quote = TRUE;
		}
		if (isset($_POST['direct-instant-quote-submit'])){
			$user_level = 'DS';
			$requirement_id = '';
			$requirement_custom = '';
			$priority_id = '';
			$quantity_id = '';
			$technology_id = $this->input->post('direct_technology');
			$material_id = $this->input->post('direct_material');
			$cost = $this->material_cost($material_id);
			$payment_amount = $cost;
			$instant_quote = TRUE;
		}
		if($instant_quote == TRUE){
			$order_data['user_level'] = $user_level;
			$order_data['requirement_id'] = $requirement_id;
			$order_data['requirement_custom'] = $requirement_custom;
			$order_data['priority_id'] = $priority_id;
			$order_data['quantity_id'] = $quantity_id;
			$order_data['technology_id'] = $technology_id;
			$order_data['material_id'] = $material_id;
			$order_data['payment_amount'] = $cost;
			$order_data['manual_quote'] = '';
			$this->session->set_userdata('order_data', $order_data);	
			$order_data = $this->session->userdata('order_data');	
			redirect(base_url('manufacture-overview'));
		}else{	
			redirect(base_url('manufacture-details'));
		}
	}
	
	// General Methods
	// Truncate Name
	public function trunc_name($name = '', $width = 10){
		if(!empty($name)){
			$width = $width;
			$trunk_name = $name;
			$trunk_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $trunk_name);
			return $trunk_name;
		}	
	}

	// Check Quantity ID in Question Flow
	function get_quantity_id(){
		$temp_qty = 1;
		$file_data = $this->session->userdata('file_data');
		foreach($file_data as $cadkey => $cadvalue){
			if($temp_qty < $file_data[$cadkey]['file_qty']){
				$temp_qty = $file_data[$cadkey]['file_qty'];
			}
		}
		if($temp_qty >= 501){
			$quantity_id = 4;
		}elseif ($temp_qty >= 101 && $temp_qty <= 500) {
			$quantity_id = 3;
		}elseif ($temp_qty >= 21 && $temp_qty <= 100) {
			$quantity_id = 2;
		}else{
			$quantity_id = 1;
		}
		return $quantity_id;
	}

	// Suitable Technology Structure
	public function technology_content($requirement_id, $quantity_id, $priority_id, $session_tech_id = NULL){
		$tech_id = '';
		if($session_tech_id != NULL){
			$tech_id = $session_tech_id;
		}
		$manu_array['requirement_id'] = $requirement_id;
		$manu_array['quantity_id'] = $quantity_id;
		$manu_array['priority_id'] = $priority_id;
		$tech_data = $this->IConfig_m->get($manu_array);
		if(!empty($tech_data)){
			$tech_mat_check = FALSE;
			foreach ($tech_data as $v) {
				$mat_array['technology_id'] = $v->technology_id;
				$mat_array['status'] = 'active';
				$mat_data = $this->IMaterial_m->get($mat_array, TRUE);
				if(!empty($mat_data)){	
					$tech_mat_check = TRUE;
				}
			}
		}else{	
			$tech_mat_check = FALSE;
		}
		if($tech_mat_check == TRUE){	
			$technology_content = '	
				<h3 class="text-left">
					<div class="tickmark"></div>
					<span>Choose suitable technology</span>
				</h3>
				<div class="question-technology-content">
					<div class="row">';
						foreach ($tech_data as $v) {
							$techn_array['technology_id'] = $v->technology_id;
							$techn_data = $this->ITechnology_m->get($techn_array, TRUE);
							$mat_array['technology_id'] = $v->technology_id;
							$mat_array['status'] = 'active';
							$mat_data = $this->IMaterial_m->get($mat_array, TRUE);
							if(!empty($mat_data)){
								$technology_content .= '
								<div class="col-12 col-md-4 p-0 mb-1 ml-2">
									<label>';
										if($tech_id == $v->technology_id){
											$technology_content .= '		
												<input type="radio" class="form-check-input" name="professional_technology" value="'.$v->technology_id.'" onchange="getQuestionMaterial()" checked>
											';
										}else{
											$technology_content .= '
												<input type="radio" class="form-check-input" name="professional_technology" value="'.$v->technology_id.'" onchange="getQuestionMaterial()">	
											';
										}	
								    	$technology_content .= '
								    	<div class="radio-inline">	
									  		<div class="radio-inline-content">
									  			<span class="radio-inline-technology">'.$techn_data->technology_name.'</span>
									  		</div>
									  	</div>	
								  	</label>
								</div>';	
							}
						}
						$technology_content .= '
					</div>	
				</div>
			';
			$material_content = '';
			$cost_content = $this->default_cost_content();
			$address_content = '';
		}else{
			$technology_content = '';
			$material_content = '';
			$cost_content = $this->manual_cost_content();
			$address_content = $this->address_content();
		}
		$result = array(
			'technology_content' => $technology_content,
			'material_content' => $material_content,
			'cost_content' => $cost_content,
			'address_content' => $address_content
		);
		return json_encode($result);
	}

	// Suitable Material Structure
	public function material_content($technology_id, $session_mtrl_id = NULL){
		$mtrl_id = '';
		if($session_mtrl_id != NULL){
			$mtrl_id = $session_mtrl_id;
		}
		$material_content = '	
			<h3 class="text-left">
				<div class="tickmark d-tickmark"></div>
				<span>Available materials</span>
			</h3>
			<div class="question-material-content">
				<div class="row">';
					$mat_array['technology_id'] = $technology_id;
					$mat_array['status'] = 'active';
					$mat_data = $this->IMaterial_m->get($mat_array);
					if(!empty($mat_data)){	
						$mno = 1;
						foreach ($mat_data as $mat_value) {
							$material_content .= '
							<div class="col-12 col-md-4 p-0 mb-1 ml-2">
								<label>';
							    	if(($mno == 1) || ($mtrl_id == $mat_value->material_id)){
							    		$cost_density = $mat_value->density;
							    		$cost_material_cst = $mat_value->material_cost;
							    		$cost_unit_cst = $mat_value->unit_cost;
							    		$cost_mat_id = $mat_value->material_id;
							    		$material_content .= '
							    			<input type="radio" class="form-check-input" name="professional_material" value="'.$mat_value->material_id.'" onchange="getQuestionQuote()" checked>';
							    	}else{
							    		$material_content .= '
							    			<input type="radio" class="form-check-input" name="professional_material" value="'.$mat_value->material_id.'" onchange="getQuestionQuote()">';
							    	}
							  		$material_content .= '
							  		<div class="radio-inline">	
								  		<div class="radio-inline-content">
								  			<span class="radio-inline-material">'.$mat_value->material_name.'</span>
								  		</div>
								  	</div>	
							  	</label>
							</div>';
							$mno += 1; 
						}		
					}
					$material_content .= '
				</div>	
			</div>
		';
		if(!empty($cost_density) && !empty($cost_material_cst) && !empty($cost_unit_cst)) {
			$cost_content = $this->instant_cost_content($type = 'question', $cost_mat_id);
			$address_content = '';
		}else{
			$cost_content = $this->manual_cost_content();
			$address_content = $this->address_content();
		}
		$result = array(
			'material_content' => $material_content,
			'cost_content' => $cost_content,
			'address_content' => $address_content
		);
		return json_encode($result);
	}

	// Default Content in Price Body
	public function default_cost_content(){
		$cost_content = '
			<small class="text-muted">
				<em>Choose relevant options for us to suggest technology and material</em>
			</small>
		';
		return $cost_content;
	}

	public function instant_cost_content($type, $material_id){
		$total_cost = $this->material_cost($material_id);
		$cost_content = "";
		if(!empty($total_cost)){
			$cost_content .= '
			<div class="row">';
				$file_data = $this->session->userdata('file_data');
				foreach ($file_data as $file_value) {
					$cost_content .= '
						<div class="col-sm-6">
							<div class="price-file-name">
								<h4 class="text-muted">'.$this->trunc_name($file_value['file_name'], 10).'</h4>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="price-file-cost">
								<h4 class="text-muted">&#36; '.number_format($file_value['file_amount'], 2).'</h4>
							</div>
						</div>
					';
				}
			$cost_content .= '				
			</div>
			<hr class="m-2 hr-divider-light" />
			<div class="row">	
				<div class="col-sm-6">
					<div class="price-file-name">
						<h4>Total Amount</h4>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="price-file-cost">
						<h4>&#36; '.number_format($total_cost, 2).'</h4>
					</div>
				</div>
			</div>';
			if($type == 'question'){
				$cost_content .= '
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<input type="submit" class="form-control btn btn-primary Abtn" onclick="return customInputValidation()" name="instant-quote-submit" value="PROCEED">
							</div>
						</div>		
					</div>
				';
			}
			if($type == 'direct'){
				$cost_content .= '
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<input type="submit" class="form-control btn btn-primary Abtn" name="direct-instant-quote-submit" value="PROCEED">
							</div>
						</div>		
					</div>
				';
			}	
		}	
		return $cost_content;
	}

	// Manual RFQ Content in Price Body
	public function manual_cost_content(){
		$address_updation = FALSE;
		$data_arr['user_id'] = $this->session->userdata('usher_id');
		$user_data = $this->Usher_m->get($data_arr, TRUE);
		if(empty($user_data->shipping_address) || empty($user_data->city) || empty($user_data->billing_address) || empty($user_data->billing_city)){
			$address_updation = TRUE;	
		}
		$cost_content = '
			<div class="row">
				<div class="col-sm-12">
					<div id="material_info_content">
						<p class="text-left py-2 m-0">Manual Quote Required</p>
						<small class="text-muted"><em>Our engineers will analyze and review your requirement and contact you within 1 working day</em></small>
					</div>
				</div>			
			</div>
			<div class="row mt-2">
				<div class="col-sm">';
					if($address_updation == TRUE){
						$cost_content .= '
						<div class="form-group">
							<input type="button" class="form-control btn btn-primary Abtn" data-toggle="modal" data-target="#addressModal" value="REQUEST FOR MANUAL QUOTE">
						</div>';
					}else{
						$cost_content .= '
						<div class="form-group">
							<input type="button" class="form-control btn btn-primary Abtn" onclick="return manualRFQSubmit()" name="manual-submit" value="REQUEST FOR MANUAL QUOTE">
						</div>';	
					}
				$cost_content .= '
				</div>		
			</div>
		';
		return $cost_content;
	}

	// Cost Calculation
	public function material_cost($material_id){
		$cost = '0.00';
		$file_data = $this->session->userdata('file_data');
		$cost_arr['material_id'] = $material_id;
		$cost_arr['status'] = 'active';
		$cost_data = $this->IMaterial_m->get($cost_arr, TRUE);
		foreach($file_data as $cadkey => $cadvalue){
			if(!empty($cost_data)){
				$volume = $file_data[$cadkey]['file_volume'];
				if($cost_data->unit_cost != '1'){
					$amount = ($volume/$cost_data->unit_cost) * $cost_data->material_cost;
				}else{
					$amount = ($volume/1000) * $cost_data->density * $cost_data->material_cost;
				}
				$file_cost = $amount * $file_data[$cadkey]['file_qty'];
				$cost += $file_cost;
				$file_data[$cadkey]['file_amount'] = $amount;
			}
		}
		$this->session->set_userdata('file_data', $file_data);
		return $cost;
	}

	// Address Content
	public function address_content(){
		$user_id = $this->session->userdata('usher_id');
		$user_arr['user_id'] = $user_id;
		$user_data = $this->Usher_m->get($user_arr, TRUE);
		$content = '
			<div class="address-content">
				<div class="address-header">
					<h4 class="text-left m-0">
						<span>Shipping Details</span>&nbsp;
						<span><a href="#" class="" data-toggle="modal" data-target="#addressModal"><i class="fas fa-edit"></i></a></span>
					</h4>
				</div>
				<div class="address-body">
					<p class="m-0 px-2">'.$user_data->shipping_address.', '.$user_data->shipping_address1.'</p>
					<p class="m-0 px-2">'.$user_data->city.', '.$user_data->state.'</p>
					<p class="m-0 px-2">'.$user_data->country.' - '.$user_data->pin_code.'</p>
				</div>
			</div>			
		';
		return $content;
	}	
	// ********************

	// ********************
	// Manufacture Overview
	public function manufacture_overview(){
		$user_id = $this->session->userdata('usher_id');
		$this->usc_calculation();
		// $file_data = $this->session->userdata('file_data');
		// $order_data = $this->session->userdata('order_data');
		// if (!empty($user_id) && !empty($file_data) && !empty($order_data['technology_id']) && !empty($order_data['material_id'])) {
		// 	$this->data['title'] = $this->lang->line('detail_title');
		// 	$this->data['description'] = $this->lang->line('detail_description');
		// 	$this->data['keyword'] = $this->lang->line('detail_keyword');
		// 	$user_query['user_id'] = $user_id;
		// 	$this->data['user_data'] = $this->Usher_m->get($user_query, TRUE);
		// 	$this->data['file_data_result'] = $file_data;
		// 	$this->data['order_data_result'] = $order_data;
		// 	$this->data['body'] = 'manufacture/manufacture_overview';
		// 	$this->load->view("main_layout",$this->data);	
		// }else{
		// 	redirect(base_url('manufacture'));
		// }		
	}

	// Instant Quote Details Stored After Payment
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
			if($order_data['user_mode'] == 'test'){
	        	$getorder_count = $this->Testorder_m->get_order_id();
			}else{
	        	$getorder_count = $this->Order_m->get_order_id();
	        }
	        $order_no = intval($getorder_count) + 100;
	        $year = substr(date('y'), -1);
	        if($order_data['user_mode'] == 'test'){
	        	$order_id = $this->Testorder_m->count();
			}else{
	        	$order_id = $this->Order_m->count();
	        }
	        $order_id = $order_id + 1;
	        $order = 'MO'.date('m').$year.$order_no;
	        $order_status = 'PROCESSING';
	        $order_date = time();
		    $id_arr['order_id'] = $order_id;
		    if($order_data['user_mode'] == 'test'){
	        	$get_id = $this->Testmanu_m->get($id_arr);
			}else{
	        	$get_id = $this->Manufacture_m->get($id_arr);
	        }
		    if(empty($get_id)){
		        // Update File
		        foreach($file_data as $cadkey => $cadvalue){
					$file_query['file_qty'] = $cadvalue['file_qty'];
					$file_query['file_amount'] = $cadvalue['file_amount'];
					$file_query['file_unit'] = $cadvalue['file_unit'];
					$file_query['file_dx'] = $cadvalue['file_dx'];
					$file_query['file_dy'] = $cadvalue['file_dy'];
					$file_query['file_dz'] = $cadvalue['file_dz'];
					$file_query['file_volume'] = $cadvalue['file_volume'];
					$file_query['file_surface'] = $cadvalue['file_surface'];
					$file_query['order_id'] = $order_id;
					$file_query['file_status'] = 'PROCESSING';
					$file_query['cur_date'] = time();
					$file_id_array['file_id'] = $cadvalue['file_id'];
					if($order_data['user_mode'] == 'test'){
			        	$this->Testmanu_m->update($file_query, $file_id_array);
					}else{
			        	$this->Manufacture_m->update($file_query, $file_id_array);
			        }
				}
				// Email Content
				$o_id = $order;
				$mlt_amount = $amount/100;
				$num_amount = number_format($mlt_amount, 2);
				$o_amount = $num_amount;
				$o_date = $order_date;
				// End Email Content

				$order_query['user_id'] = $user_id; 
				$order_query['order'] = $order;
				$order_query['user_level'] = $order_data['user_level'];
	            $order_query['requirement_id'] = $order_data['requirement_id'];
	            $order_query['requirement_custom'] = $order_data['requirement_custom'];
	            $order_query['priority_id'] = $order_data['priority_id'];
	            $order_query['quantity_id'] = $order_data['quantity_id'];
	            $order_query['technology_id'] = $order_data['technology_id'];
	            $order_query['material_id'] = $order_data['material_id'];
	            $order_query['manual_quote'] = $order_data['manual_quote'];
	            $order_query['communication_mode'] = $order_data['communication_mode']; 
	            $order_query['payment_id'] = $payment_id; 
				$order_query['payment_amount'] = $o_amount; 
				$order_query['payment_status'] = $payment_status;
				$order_query['delivery_type'] = $order_data['delivery_type'];
				$order_query['delivery_amount'] = $order_data['delivery_amount']; 
				$order_query['discount_id'] = $order_data['discount_id']; 
				$order_query['discount_amount'] = $order_data['discount_amount']; 
				$order_query['order_status'] = $order_status; 
				$order_query['status'] = 'active'; 
				$order_query['order_date'] = $order_date; 
				if($order_data['user_mode'] == 'test'){
		        	$this->Testorder_m->insert($order_query);
				}else{
		        	$this->Order_m->insert($order_query);
		        }
				$this->manufactureOrderEmail($o_id, $o_amount);
				$this->session->unset_userdata('file_data');
				$this->session->unset_userdata('order_data');
				$this->session->set_flashdata('success','You order has been successfully placed. Order details has been sent on your registered email.');
				redirect(base_url('manufacture-confirmation'));
			}else{
				$this->session->unset_userdata('file_data');
				$this->session->unset_userdata('order_data');
				$this->session->set_flashdata('error','Order already placed!');
				redirect(base_url('manufacture-details'));
			}
		}else{
			$this->session->set_flashdata('error','Payment does not succeed, Try again!');
		}
		redirect(base_url('manufacture-overview'));		
	}

	// Manual Request Details Stored 
	public function manufacture_request(){
		$user_id = $this->session->userdata('usher_id');
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		
		if(!empty($file_data) && !empty($order_data)){
			// Getting Order Details
	        if($order_data['user_mode'] == 'test'){
	        	$getorder_count = $this->Testorder_m->get_order_id();
			}else{
	        	$getorder_count = $this->Order_m->get_order_id();
	        }
	        $order_no = intval($getorder_count) + 100;
	        $year = substr(date('y'), -1);
	        if($order_data['user_mode'] == 'test'){
	        	$order_id = $this->Testorder_m->count();
			}else{
	        	$order_id = $this->Order_m->count();
	        }
	        $order_id = $order_id + 1;
	        $order = 'MO'.date('m').$year.$order_no;
	        $order_status = 'REQUESTING';
	        $order_date = time();
		    
		    $id_arr['order_id'] = $order_id;
		    if($order_data['user_mode'] == 'test'){
	        	$get_id = $this->Testmanu_m->get($id_arr);
			}else{
	        	$get_id = $this->Manufacture_m->get($id_arr);
	        }
		    if(empty($get_id)){
		  		// Update File
		        foreach($file_data as $cadkey => $cadvalue){
					$file_query['file_qty'] = $cadvalue['file_qty'];
					$file_query['file_amount'] = '';
					$file_query['file_unit'] = $cadvalue['file_unit'];
					$file_query['file_dx'] = $cadvalue['file_dx'];
					$file_query['file_dy'] = $cadvalue['file_dy'];
					$file_query['file_dz'] = $cadvalue['file_dz'];
					$file_query['file_volume'] = $cadvalue['file_volume'];
					$file_query['file_surface'] = $cadvalue['file_surface'];
					$file_query['order_id'] = $order_id;
					$file_query['file_status'] = $order_status;
					$file_query['cur_date'] = $order_date;
					$file_id_array['file_id'] = $cadvalue['file_id'];
					if($order_data['user_mode'] == 'test'){
			        	$this->Testmanu_m->update($file_query, $file_id_array);
					}else{
			        	$this->Manufacture_m->update($file_query, $file_id_array);
			        }
				}
				// Email Content
				$o_id = $order;
				$o_date = $order_date;
				// End Email Content
				$order_query['user_id'] = $user_id; 
				$order_query['order'] = $order;
				$order_query['user_level'] = $order_data['user_level'];
		        $order_query['requirement_id'] = $order_data['requirement_id'];
		        $order_query['requirement_custom'] = $order_data['requirement_custom'];
		        $order_query['priority_id'] = $order_data['priority_id']; 
		        $order_query['quantity_id'] = $order_data['quantity_id']; 
		        $order_query['technology_id'] = $order_data['technology_id'];
		        $order_query['material_id'] = $order_data['material_id'];
		        $order_query['manual_quote'] = TRUE; 
		        $order_query['communication_mode'] = $order_data['communication_mode']; 
		        $order_query['delivery_type'] = $order_data['delivery_type']; 
		        $order_query['delivery_amount'] = $order_data['delivery_amount']; 
		        $order_query['order_status'] = $order_status; 
				$order_query['status'] = 'active'; 
				$order_query['order_date'] = $order_date; 
				if($order_data['user_mode'] == 'test'){
		        	$this->Testorder_m->insert($order_query);
				}else{
		        	$this->Order_m->insert($order_query);
		        }
				$this->manufactureRequestEmail($o_id);
				$this->session->unset_userdata('file_data');
				$this->session->unset_userdata('order_data');
				$this->session->set_flashdata('success','We have received the 3D design file. RFQ order details has been sent on your registered email.');
				redirect(base_url('rfq-confirmation'));
			}else{
				$this->session->unset_userdata('file_data');
				$this->session->unset_userdata('order_data');
				$this->session->set_flashdata('error','Order already placed!');
				redirect(base_url('manufacture-details'));
			}
		}else{
			redirect(base_url('manufacture-details'));
		}	
	}

	// General Methods
	// Insert and Update Address
	public function manufacture_address(){
		$user_id = $this->session->userdata('usher_id');
		if (isset($_POST['checkout-submit'])) {
			$user_mobile = $this->input->post('user_mobile');		
			$billing_address = $this->input->post('billing_address');		
			$billing_address1 = $this->input->post('billing_address1');		
			$billing_city = $this->input->post('billing_city');		
			$billing_state = $this->input->post('billing_state');		
			$billing_country = $this->input->post('billing_country');		
			$billing_zipcode = $this->input->post('billing_zipcode');		
			if (isset($_POST['same_address'])) {
				$shipping_address = $this->input->post('billing_address');		
				$shipping_address1 = $this->input->post('billing_address1');		
				$city = $this->input->post('billing_city');		
				$state = $this->input->post('billing_state');	
				$country = $this->input->post('billing_country');		
				$pin_code = $this->input->post('billing_zipcode');
			}else{
				$shipping_address = $this->input->post('shipping_address');		
				$shipping_address1 = $this->input->post('shipping_address1');		
				$city = $this->input->post('city');		
				$state = $this->input->post('state');		
				$country = $this->input->post('country');		
				$pin_code = $this->input->post('pin_code');
			}
			$redirect = $this->input->post('redirect_address');
			$update_data['user_mobile'] = $user_mobile;
			$update_data['billing_address'] = $billing_address;
			$update_data['billing_address1'] = $billing_address1;
			$update_data['billing_city'] = $billing_city;
			$update_data['billing_state'] = $billing_state;
			$update_data['billing_country'] = $billing_country;
			$update_data['billing_zipcode'] = $billing_zipcode;

			$update_data['shipping_address'] = $shipping_address;
			$update_data['shipping_address1'] = $shipping_address1;
			$update_data['city'] = $city;
			$update_data['state'] = $state;
			$update_data['country'] = $country;
			$update_data['pin_code'] = $pin_code;
			$update_id['user_id'] = $user_id;
			if ($this->Usher_m->update($update_data, $update_id)) {
				$this->session->set_flashdata('success','Address details updated successfully!');
			}else{
				$this->session->set_flashdata('error','Error occured, Try again!');
			}
			redirect(base_url($redirect));
		}else{
			redirect(base_url('manufacture-details'));
		}
	}

	// Display Product Count	
	public function product_count(){
		$file_data = $this->session->userdata('file_data');
		foreach($file_data as $cadkey => $cadvalue){
			$apidata = json_decode($file_data[$cadkey]['cad_result']);
			$array = array(
				array(
					'file_id' => $file_data[$cadkey]['file_id'],
					'file_qty' => $file_data[$cadkey]['file_qty'],
					'file_amount' => $file_data[$cadkey]['file_amount']
				)	
			);
			if (empty($file_array)) {
        		$file_array = $array;			
        	}else{
        		$file_array = array_merge($file_array, $array);
        	}
		}
		echo json_encode($file_array);	
	}
	
	// Change Product Count
	public function change_count(){
		$return_message = '';
		$file_id = $this->input->post('file_id');
		$file_qty = $this->input->post('file_qty');
		$file_data = $this->session->userdata('file_data');
		foreach($file_data as $cadkey => $cadvalue){
			if($file_data[$cadkey]['file_id'] == $file_id){
				$file_data[$cadkey]['file_qty'] = $file_qty;
				$return_message = 'success';
				$this->session->set_userdata('file_data', $file_data);
			}
		}
		echo $return_message;
	}

	// Delete Manufacture File in Overview
	public function manufacture_overview_delete(){
		$file_id = $this->uri->segment(2);
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		foreach($file_data as $cadkey => $cadvalue){
			if($cadvalue['file_id'] == $file_id){
				unset($file_data[$cadkey]);
				if (empty($file_data)) {
					$this->session->unset_userdata('file_data');			
					$this->session->unset_userdata('order_data');			
					redirect(base_url('manufacture-details'));
				}else{
					$file_total_amount = 0;
					foreach($file_data as $cadkey => $cadvalue){
						$file_total_amount += $cadvalue['file_amount'];
					}
					if($file_total_amount != 0){
						$order_data['payment_amount'] = $file_total_amount;
					}
					$this->session->set_userdata('file_data', $file_data);
					$this->session->set_userdata('order_data', $order_data);
					redirect(base_url('manufacture-overview'));
				}	
			}
		}
	}

	// Change Mode of Communication
	public function change_communication_mode(){
		$return_message = '';
		$communication_mode = $this->input->post('communication_mode');
		if(!empty($communication_mode)){
			$order_data = $this->session->userdata('order_data');
			$order_data['communication_mode'] = $communication_mode;
			$this->session->set_userdata('order_data', $order_data);
			$return_message = true;
		}	
		echo $return_message;
	}

	// Display Product Total Amount
	public function product_total(){
		$file_data = $this->session->userdata('file_data');
		if(!empty($file_data)){
			foreach($file_data as $cadkey => $cadvalue){
				$apidata = json_decode($file_data[$cadkey]['cad_result']);
				$array = array(
					array(
						'file_id' => $file_data[$cadkey]['file_id'],
						'file_amount' => $file_data[$cadkey]['file_amount'],
						'file_qty' => $file_data[$cadkey]['file_qty']
					)	
				);
				if (empty($file_array)) {
	        		$file_array = $array;			
	        	}else{
	        		$file_array = array_merge($file_array, $array);
	        	}
			}
			echo json_encode($file_array);
		}else{
			echo '';
		}	
	}

	// Change Delivery Type
	public function delivery_type(){
		$type = $this->input->post('type');
		$this->usc_calculation();
		$order_data = $this->session->userdata('order_data');
		$order_array = array(
			'delivery_type' => $order_data['delivery_type'],
			'delivery_amount' => $order_data['delivery_amount']
		);
		echo json_encode($order_array);
	}

	// ********************
	// USC Calculation
	public function usc_calculation(){
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		$actual_cost = 0;

		$box_arr['status'] = 'active';
		$box_data = $this->CBox_m->get($box_arr);	
		foreach($file_data as $cadkey => $cadvalue){
			foreach ($box_data as $box_value) {
				$box_properties = array(
					"$box_value->box_name" => array(
						'name' => $box_value->box_name,
						'value' => '',
						'float_quantity' => '',			
						'int_quantity' => ''			
					)
				);	

				$sess_box_properties = $this->session->userdata('box_properties');
		    	if (empty($sess_box_properties)) {
		    		$sess_box_properties = $box_properties;
		    	}else{
		    		$sess_box_properties = array_merge($sess_box_properties, $box_properties);
		    	}		
				$this->session->set_userdata('box_properties', $sess_box_properties);	
			}
			
			$part_length = $cadvalue['file_dx']/10;
			$part_breadth = $cadvalue['file_dy']/10;
			$part_height = $cadvalue['file_dz']/10;
			$part_volume = $cadvalue['file_volume']/1000;
			$part_quantity = $cadvalue['file_qty'];
			$dens_arr['material_id'] = $order_data['material_id'];
			$dens_data = $this->IMaterial_m->get($dens_arr, TRUE);
			if(!empty($dens_data)){
				$part_density = $dens_data->density;
			}else{
				$part_density = $cadvalue['file_surface'];
			}
			$this->box_calc($part_length, $part_breadth, $part_height, $part_quantity);
			$weight_values = $this->weight_calc($part_volume, $part_quantity, $part_density);
				
			$box_properties = $this->session->userdata('box_properties');
			$this->session->unset_userdata('box_properties');
			$least_quantity = $this->session->userdata('least_quantity');
			$this->session->unset_userdata('least_quantity');
			$least_quantity_box_name = $this->session->userdata('least_quantity_box_name');
			$this->session->unset_userdata('least_quantity_box_name');
				
			$actual_cost = $actual_cost + $weight_values['actual_cost'];
		}	

		if($actual_cost != 0){
			$order_data['delivery_amount'] = $actual_cost;		
			$this->session->set_userdata('order_data', $order_data);
		}	
	}    

	public function box_calc($part_length, $part_breadth, $part_height, $part_quantity){
		$box_properties = $this->session->userdata('box_properties');
		$quantity_array = array();
		$calc_defualt = $this->CDetails_m->get();
		$calc_defualt = $calc_defualt[0];
		$box_defualt_arr['status'] = 'active';
		$box_defualt_data = $this->CBox_m->get($box_defualt_arr);

		foreach ($box_defualt_data as $key => $box_defualt) {
			$length_divide = floor($box_defualt->box_length/$part_length);
			$breadth_divide = floor($box_defualt->box_breadth/$part_breadth);
			$height_divide = floor($box_defualt->box_height/$part_height);
			$divide_result = (($length_divide) * ($breadth_divide) * ($height_divide));
			if($divide_result >= 1){
				$float_quantity = sprintf('%.6F', ($part_quantity/$divide_result));
			}else{
				$float_quantity = 0;
			}
			
			$int_quantity = $this->get_quantity($float_quantity);
			array_push($quantity_array, $int_quantity);
			
			$box_properties[$box_defualt->box_name]['value'] = $divide_result;
			$box_properties[$box_defualt->box_name]['float_quantity'] = $float_quantity;
			$box_properties[$box_defualt->box_name]['int_quantity'] = $int_quantity;
		}

		$least_quantity = min(array_filter($quantity_array));
		$this->session->set_userdata('least_quantity', $least_quantity);
		$this->session->set_userdata('box_properties', $box_properties);	
	}

	public function weight_calc($part_volume, $part_quantity, $part_density){
		$box_properties = $this->session->userdata('box_properties');
		print_r('<br/>');
		echo json_encode($box_properties);
		$least_quantity = $this->session->userdata('least_quantity');
		$calc_defualt = $this->CDetails_m->get();
		$calc_defualt = $calc_defualt[0];
		$least_quantity_array = array();
		$volumetric = '';
		$gross = '';
		foreach ($box_properties as $key => $value) {
			if($least_quantity == $value['int_quantity']){
				$least_box_defualt_arr['box_name'] = $value['name'];
				$least_box_defualt = $this->CBox_m->get($least_box_defualt_arr, TRUE);		
				array_push($least_quantity_array, $least_box_defualt->box_volume);				
			}
		}	
		$least_quantity_volume = min(array_filter($least_quantity_array));

		print_r('<br/>');
		print_r('<br/>');
		print_r($least_quantity_array);	
		print_r('<br/>');
		print_r('<br/>');
		print_r($least_quantity_volume);	
		
		$box_defualt_arr['box_volume'] = $least_quantity_volume;
		$box_defualt = $this->CBox_m->get($box_defualt_arr, TRUE);
		$box_volume = (($box_defualt->box_length) *($box_defualt->box_breadth) *($box_defualt->box_height));
		$least_quantity_decimal = substr(strrchr(number_format($least_quantity, 8), "."), 1);
		if($least_quantity_decimal >= 1 && $least_quantity_decimal <= 99999999){
			$least_quantity = number_format($least_quantity) + 1;	
		}	
		$volumetric = sprintf('%.6F', (($box_volume / $calc_defualt->volumetric_divisor) * $least_quantity));
		if($volumetric < 1){
			$volumetric = 1; 
		}
		$gross = sprintf('%.6F', ((($part_volume * $part_quantity * $part_density) * $calc_defualt->gross_multipler)/$calc_defualt->gross_divisor));
		$this->session->set_userdata('least_quantity_box_name', $value['name']);	

		if($volumetric > $gross){
			$high_weight = $volumetric;	
		}else{
			$high_weight = $gross;
		}
		$weight = $this->get_weight(trim($high_weight));
		$weight = str_replace("," , "" , $weight);
		$num = floor($weight);
		$deci = substr(strrchr(number_format($weight, 1), "."), 1);
		if($deci == '0'){
			$num_weight = $num;
			$deci_weight = $num.'.'.$deci;
			$cost_arr['num_weight'] = $num_weight;
			$cost_arr['deci_weight'] = $deci_weight;
			$calc_cost = $this->CCost_m->get_cost($cost_arr);	
		}else{
			$cost_arr['weight'] = $weight;
			$calc_cost = $this->CCost_m->get($cost_arr, TRUE);
		}
		if(empty($calc_cost)){
			$calc_cost = $this->CCost_m->get_last_row();
		}
		$inr_cost = number_format($calc_cost->total_doller, 2);
		$doller_cost = number_format(($calc_cost->total_doller/$calc_defualt->dollar_conversion), 2);
		if($doller_cost >= $calc_defualt->min_dollar){
			$actual_cost = 	$doller_cost;
		}else{
			$actual_cost = $calc_defualt->min_dollar;
		}
		$weight_values = array(
			'volumetric' => $volumetric, 
			'gross' => $gross,
			'actual_cost' => $actual_cost
		);
		
		print_r('<br/>');
		print_r('<br/>');
		print_r($weight_values);
		return $weight_values;
	}

	public function get_quantity($quantity){
		$decimal = substr(strrchr(number_format($quantity, 6), "."), 1);
		if($decimal >= 1 && $decimal <= 999999){
			$least_quantity = $quantity + 1;
			if($decimal <= 499999){ 
				$least_quantity = number_format($quantity) + 1;
			}else{
				$least_quantity = number_format($quantity);
			}
		}else{
			$least_quantity = $quantity;
		}
		return $least_quantity;
	}

	public function get_weight($weight){
		$decimal = substr(strrchr(number_format($weight, 6), "."), 1);
		$weight = str_replace("," , "" , $weight);
		if($decimal >= 1 && $decimal <= 999999){
			$high_weight = str_replace("," , "" , number_format($weight));
			if($decimal <= 499999){ 
				$high_weight = $high_weight + .5;
			}
		}else{
			$high_weight = str_replace("," , "" , number_format($weight));
			$high_weight = $high_weight.'.0';
		}
		return $high_weight;
	}
	// ********************
	
	// Add Discount Amount
	public function add_discount(){
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		$discount_code = $this->input->post('discount_code');
		$discount_arr['status'] = 'active';
		$discount_arr['coupon_code'] = trim($discount_code);
		$discount_data = $this->IDiscount_m->get($discount_arr, TRUE);
		if(!empty($discount_data)){
			$APPLICABLE_TECHNOLOGY = FALSE;
			if(!empty($discount_data->applicable_technology)){
				if($order_data['technology_id'] == $discount_data->applicable_technology){
					$APPLICABLE_TECHNOLOGY = TRUE;		
				}
			}else{
				$APPLICABLE_TECHNOLOGY = TRUE;	
			}
			if($APPLICABLE_TECHNOLOGY == TRUE){
				$total_file_amount = 0;
				foreach ($file_data as $ckey => $cvalue) {
					$file_amount = $cvalue['file_amount'] * $cvalue['file_qty'];
					$total_file_amount += $file_amount;
				}
				$delivery_amount = $order_data['delivery_amount'];
				$discount_amount = $order_data['discount_amount'];
				$payable_amount = $total_file_amount + $delivery_amount;	
				if($discount_data->min_value <= $payable_amount){
					if($discount_data->max_value >= $payable_amount){
						$calc_discount_amount = 0;
						if(!empty($discount_data->percentage)){
							$percentage = $discount_data->percentage;
							$calc_discount_amount = ($payable_amount)*($percentage/100);
						}
						if(!empty($discount_data->amount)){
							$calc_discount_amount = $discount_data->amount;
						}
						if($calc_discount_amount < $discount_data->max_discount_amount){
							$discount_amount = $calc_discount_amount;
						}else{
							$discount_amount = $discount_data->max_discount_amount;
						}
						$order_data['discount_id'] = $discount_data->discount_id;
						$order_data['discount_amount'] = $discount_amount;		
						$this->session->set_userdata('order_data', $order_data);	
						$this->session->set_flashdata('success','Coupon code added successfully!');
					}else{
						$this->session->set_flashdata('error','Sorry, your order value is above the maximum order limit for this coupon code');
					}
				}else{
					$this->session->set_flashdata('error','Sorry, your order value is below the minimum order limit for this coupon code');
				}
			}else{
				$this->session->set_flashdata('error','Applied coupon code is not valid for the selected manufacturing process');
			}
		}else{
			$this->session->set_flashdata('error','Oops! Sorry, this coupon code is not applicable');
		}
		redirect(base_url('manufacture-overview'));
	}

	// Remove Discount
	public function remove_discount(){
		$order_data = $this->session->userdata('order_data');
		$order_data['discount_id'] = '';
		$order_data['discount_amount'] = '';		
		$this->session->set_userdata('order_data', $order_data);	
		$this->session->set_flashdata('success','Coupon code removed successfully!');
		redirect(base_url('manufacture-overview'));
	}

	// Display Payable Amount
	public function payable_amount(){
		$total_file_amount = 0;
		$file_data = $this->session->userdata('file_data');
		$order_data = $this->session->userdata('order_data');
		foreach ($file_data as $ckey => $cvalue) {
			$file_amount = $cvalue['file_amount'] * $cvalue['file_qty'];
			$total_file_amount += $file_amount;
		}
		$delivery_amount = $order_data['delivery_amount'];
		$discount_amount = $order_data['discount_amount'];
		if(!empty($discount_amount)){
			$payable_amount = ($total_file_amount - $discount_amount) + $delivery_amount;
		}else{
			$payable_amount = $total_file_amount + $delivery_amount;	
		}
		echo json_encode($payable_amount);
	}
	// ********************
	
	// ********************
	// Confirmation 
	// Instant Quote Confirm 
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

	// Instant Quote Confirm
	public function rfq_confirm(){
		$user_id = $this->session->userdata('usher_id');
		if(!empty($user_id)){
			$this->data['title'] = $this->lang->line('confirm_title');
			$this->data['description'] = $this->lang->line('confirm_description');
			$this->data['keyword'] = $this->lang->line('confirm_keyword');
			$this->data['body'] = 'manufacture/rfq_confirm';
			$this->load->view("main_layout",$this->data);
		}else{
			redirect(base_url('manufacture'));
		}		
	}
	// ********************
			
	// Extras
	// Display Material in Popup
	public function change_material(){
		$mat_array['status'] = 'active';
		$mat_array['technology_id'] = $this->input->post('technology_id');
		$mat_data = $this->IMaterial_m->get($mat_array);
		$result = '
			<div class="form-group">
				<label class="float-left">Materials:</label>
				<select class="form-control" id="edit_material_id" name="edit_material_id">';
						foreach ($mat_data as $row) {
							$result .= '<option value='. $row->material_id .'>'. $row->material_name .'</option>';
					}
					$result .= '
				</select>  				
			</div>
		';
		echo $result;		
	}

	// Edit Material in Popup
	public function edit_material(){
		$requirement_id = $this->input->post('requirement');
		$priority_id = $this->input->post('priority');
		$quantity_id = $this->get_quantity_id();
		$material_id = $this->input->post('material_id');
		$mate_array['material_id'] = $material_id;
		$mate_data = $this->IMaterial_m->get($mate_array, TRUE);
		$mate_mat_id = $mate_data->material_id;
		$mate_mat_name = $mate_data->material_name;
		$mate_tech_array['technology_id'] = $mate_data->technology_id;
		$mate_tech_data = $this->ITechnology_m->get($mate_tech_array, TRUE);
		$mate_tech_id = $mate_tech_data->technology_id;
		$mate_tech_name = $mate_tech_data->technology_name;
		$manu_array['requirement_id'] = $requirement_id;
		$manu_array['quantity_id'] = $quantity_id;
		$manu_array['priority_id'] = $priority_id;
		$tech_data = $this->IConfig_m->get($manu_array);
		$material_content = '';
		$material_content .= '	
			<h3 class="text-left">Suitable Materials</h3>
			<div class="question-material-content">
				<div class="row">';	
					foreach ($tech_data as $v) {
						$techn_array['technology_id'] = $v->technology_id;
						$techn_data = $this->ITechnology_m->get($techn_array, TRUE);
						$mat_array['technology_id'] = $v->technology_id;
						$mat_array['status'] = 'active';
						$mat_data = $this->IMaterial_m->get($mat_array, TRUE);
						if(!empty($mat_data)){
							$cost = $this->material_cost($mat_data->material_id);
							$material_content .= '
							<div class="col-12 col-md-4 p-0 mb-1 ml-2">
								<label>';
							    	if($v->technology_id == $mate_tech_id){
							    		$mate_cost = $this->material_cost($material_id);
							    		$material_content .= '
							    			<input type="radio" class="form-check-input" name="professional_material" value="'.$mate_mat_id.'" onchange="getQuestionQuote()">
						    				<div class="radio-inline">	
										  		<div class="radio-inline-content">
										  			<span class="radio-inline-technology">'.$mate_tech_name.'</span><br/>
										  			<span class="radio-inline-material">'.$mate_mat_name.'</span>
										  			<span>
										  				<a href="javascript:;" class="edit-material" style="font-size:12px;" id="'.$mate_tech_id.'">
										  					<i class="fas fa-edit" style="color:#7a7a7a;"></i>
										  				</a>
										  			</span><br/>
										  			<span>&dollar; '.number_format($mate_cost, 2).'</span><br/>
										  		</div>
										  	</div>
									  	';
							    	}else{
										$material_content .= '
							    			<input type="radio" class="form-check-input" name="professional_material" value="'.$mat_data->material_id.'" onchange="getQuestionQuote()">
						    				<div class="radio-inline">	
										  		<div class="radio-inline-content">
										  			<span class="radio-inline-technology">'.$techn_data->technology_name.'</span><br/>
										  			<span class="radio-inline-material">'.$mat_data->material_name.'</span>
										  			<span>
										  				<a href="javascript:;" class="edit-material" style="font-size:12px;" id="'.$mat_data->technology_id.'">
										  					<i class="fas fa-edit" style="color:#7a7a7a;"></i>
										  				</a>
										  			</span><br/>
										  			<span>&dollar; '.number_format($cost, 2).'</span><br/>
										  		</div>
										  	</div>
									  	';
							    	}
							  		$material_content .= '
							  	</label>
							</div>';
						}	
					}
					$material_content .= '
				</div>	
			</div>
		';
		$cost_content = $this->default_cost_content();
		$result = array(
			'material_content' => $material_content,
			'cost_content' => $cost_content
		);
		echo json_encode($result);
	}

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

	public function unit_data(){
		$file_data = $this->session->userdata('file_data');
		if(!empty($file_data)){
			foreach($file_data as $cadkey => $cadvalue){
				$apidata = json_decode($file_data[$cadkey]['cad_result']);
				$array = array(
					array(
						'file_id' => $file_data[$cadkey]['file_id'],
						'DimensionX' => $apidata->DimensionX,
						'DimensionY' => $apidata->DimensionY,
						'DimensionZ' => $apidata->DimensionZ,
						'file_unit' => $file_data[$cadkey]['file_unit']
					)	
				);
				if (empty($file_array)) {
	        		$file_array = $array;			
	        	}else{
	        		$file_array = array_merge($file_array, $array);
	        	}
			}
			echo json_encode($file_array);
		}else{
			echo '';
		}	
	}

}

