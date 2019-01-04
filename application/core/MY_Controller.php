<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->lang->load('static');
	}

    // Pagination
    function pagination_config($array){
        $config['base_url'] = base_url($array['link']);
        $config['per_page'] = $this->lang->line('per_page');
        $config['num_links'] = $this->lang->line('num_links');
        $config['total_rows'] = $this->$array['table']->count();
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    }

	// Forgot Password
    function forgotPasswordEmail($partner_id, $partner_name, $partner_email, $company_name){    
        // Admin Detail
        $admin_email = 'info@3dusher.com';
        $admin_name = 'Team 3D Usher';

        // Subject
        $subject = '3D Usher Password Reset';
        
        // User Detail
        $partner_id = $partner_id; 
        $partner_name = $partner_name; 
        $partner_email = $partner_email;

        // Token
        $token = $partner_id.'cp'.rand();
        
        // User Template
        $partner_template = '
                Dear '.$partner_name.',
            <br/><br/>
                Someone has requested a link to change your 3D Usher account password of '.$company_name.'. You can do this through
                the link below.
            <br/><br/>
                <a href="'.base_url('change-password/change/'.$token).'">
                    Change my 3D Usher partner account password
                </a>
            <br/><br/> 
                If you didn`t request this, please ignore this email. Your password won`t change until you access the link above and create a new one.
            <br/><br/>
                Thanks,
            <br/>
                Team 3D Usher.
        ';
        $this->elastic_mail($admin_email, $admin_name, $subject, $partner_email, $partner_template);
    }

	// Elastic Mail
    function elastic_mail($from, $name, $subject, $to, $template){
        $url = 'https://api.elasticemail.com/v2/email/send';
        try{
            $post = array('from' => $from,
            'fromName' => $name,
            'apikey' => 'e8a973f6-9afb-4bdd-81ca-adf61e0e06b4',
            'subject' => $subject,
            'to' => $to,
            'bodyHtml' => $template,
            'bodyText' => $subject,
            'isTransactional' => false);
            
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $post,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_SSL_VERIFYPEER => false
            ));
            $result=curl_exec ($ch);
            curl_close ($ch);
            // echo $result;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }   
    }

}
