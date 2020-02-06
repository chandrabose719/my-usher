<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usc extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Language
		$this->lang->load('usc/index');
		
		$this->data["usher_id"] = $this->session->userdata('usher_id');
		$this->data["usher_email"] = $this->session->userdata('usher_email');
		$this->data["usher_name"] = $this->session->userdata('usher_name');
		
	}

	// USC Home Page
	public function index(){
		$this->data['title'] = $this->lang->line('usc_title');
		$this->data['description'] = $this->lang->line('usc_description');
		$this->data['keyword'] = $this->lang->line('usc_keyword');
		$this->data['body'] = 'usc/index';
		$this->load->view("main_layout", $this->data);
	}

	// USC Calculation Page
	public function usc_calculation(){
		$box_arr['status'] = 'active';
		$box_data = $this->CBox_m->get($box_arr);

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


		$part_length = $this->input->post('partLength');
		$part_breadth = $this->input->post('partBreadth');
		$part_height = $this->input->post('partHeight');
		$part_volume = $this->input->post('partVolume');
		$part_quantity = $this->input->post('partQuantity');
		$part_density = $this->input->post('partDensity');
		$country_code = $this->input->post('countryCode');

		// $part_length = '10';
		// $part_breadth = '16';
		// $part_height = '16';
		// $part_volume = '100';
		// $part_quantity = '10';
		// $part_density = '1';
		// $country_code = 'us';

		$this->box_calc($part_length, $part_breadth, $part_height, $part_quantity);
		$weight_values = $this->weight_calc($part_volume, $part_quantity, $part_density, $country_code);
		
		$box_properties = $this->session->userdata('box_properties');
		$this->session->unset_userdata('box_properties');
		$least_quantity = $this->session->userdata('least_quantity');
		$this->session->unset_userdata('least_quantity');
		$least_quantity_box_name = $this->session->userdata('least_quantity_box_name');
		$this->session->unset_userdata('least_quantity_box_name');
		
		$calculation_result_a = array();	
		foreach ($box_properties as $key => $value) {
			$calculation_result_a[$key] = $value['value'];
		}
		$calculation_result_b = array(
			'result' => 'success',
			'least_quantity' => $least_quantity,
			'least_quantity_box_name' => $least_quantity_box_name,
			'volumetric_weight' => $weight_values['volumetric'],
			'gross_weight' => $weight_values['gross'],
			'actual_cost' => $weight_values['actual_cost']
		);
		$calculation_result = array_merge($calculation_result_a, $calculation_result_b);
		
		$result = $this->usc_output($calculation_result);

		echo $result;

	}

	public function usc_output($calculation_result){
		$calc_defualt = $this->CDetails_m->get();
		$calc_defualt = $calc_defualt[0];
		
		$usc_output = '
			<h3>Result</h3>
                    
            <div class="row py-3">
                <div class="col-xl-4 offset-xl-2 col-lg-4 offset-lg-2 col-md-6 col-sm-12 col-xs-12">
                    <p class="volumetric-weight">Volumetric Weight: '.number_format($calculation_result["volumetric_weight"], 2).' kg</p>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <p class="least-quantity"># of Boxes: '.$calculation_result["least_quantity"].' x '.ucwords((str_replace('_', ' ', $calculation_result["least_quantity_box_name"]))).'</p>
                </div>
                <div class="col-xl-4 offset-xl-2 col-lg-4 offset-lg-2 col-md-6 col-sm-12 col-xs-12">
                    <p class="gross-weight">Gross Weight: '.number_format($calculation_result['gross_weight'], 2).' kg</p>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <p class="shipping-cost">Shipping Cost: <span class="text-primary">'.$calculation_result["actual_cost"].'</span></p>
                </div>
            </div>
        ';
        return $usc_output;
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

	public function weight_calc($part_volume, $part_quantity, $part_density, $country_code){
		$box_properties = $this->session->userdata('box_properties');
		$least_quantity = $this->session->userdata('least_quantity');
		$calc_defualt = $this->CDetails_m->get();
		$calc_defualt = $calc_defualt[0];
		$volumetric = '';
		$gross = '';
		foreach ($box_properties as $key => $value) {
			if($least_quantity == $value['int_quantity'] && empty($volumetric) && empty($gross)){
				$box_defualt_arr['box_name'] = $value['name'];
				$box_defualt = $this->CBox_m->get($box_defualt_arr, TRUE);
				$box_volume = (($box_defualt->box_length) *($box_defualt->box_breadth) *($box_defualt->box_height));
				$least_quantity_decimal = substr(strrchr(number_format($least_quantity, 8), "."), 1);
				if($least_quantity_decimal >= 1 && $least_quantity_decimal <= 99999999){
					$least_quantity = number_format($least_quantity) + 1;	
				}	
				$volumetric = (($box_volume / $calc_defualt->volumetric_divisor) * $least_quantity); 
				if($volumetric < 1){
					$volumetric = 1; 
				}
				$gross = ((($part_volume * $part_quantity * $part_density) * $calc_defualt->gross_multipler)/$calc_defualt->gross_divisor);
				$this->session->set_userdata('least_quantity_box_name', $value['name']);
			}
		}
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
		if(!empty($calc_cost)){
			$doller_cost = number_format($calc_cost->{$country_code.'_rate'}, 2);
			$actual_cost = 	'&#36; '.$doller_cost;
		}else{
			$actual_cost = 'Cost Details NOT Available!';
		}

		$weight_values = array(
			'volumetric' => $volumetric, 
			'gross' => $gross,
			'actual_cost' => $actual_cost
		);
		
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

}

