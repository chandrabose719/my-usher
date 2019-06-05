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

    function registerEmail($user_name, $user_email){
        
        $formID = '71ae50ef-e796-4085-9374-2e192d2bcf41';

        // Hubspot Email
        $hubspotutk      = $_COOKIE['hubspotutk']; //grab the cookie from the visitors browser.
        $ip_addr         = $_SERVER['REMOTE_ADDR']; //IP address too.
        $hs_context      = array(
            'hutk' => $hubspotutk,
            'ipAddress' => $ip_addr,
            'pageUrl' => 'https://3dusher.com/register',
            'pageName' => 'Register'
        );
        $hs_context_json = json_encode($hs_context);

        $str_post = "firstname=" . urlencode($user_name) 
            . "&email=" . urlencode($user_email) 
            . "&hs_context=" . urlencode($hs_context_json);
        $this->hubspot_email($str_post, $formID);    

        // Admin Detail
        $admin_email = $this->lang->line('admin_email');
        $admin_name = $this->lang->line('admin_name');

        // Subject
        $subject = 'Hello from 3D Usher Team';
        
        // User Detail
        $user_name = $user_name; 
        $user_email = $user_email;

        // User Template
        $user_template = '
                Dear '.$user_name.',
            <br/><br/>
                Welcome to 3D Usher - your on-demand manufacturing partner.
            <br/><br/>
                You can now login to your 3D Usher account as '.$user_email.'.
            <br/><br/>
                We are excited to help you with your project. If you have any concerns or questions you can directly reply to this email and we will get in touch with you. You can also visit us here to understand how 3D Usher works.
            <br/><br/>
                We look forward to working with you.
            <br/><br/>
                Happy Working,
            <br/>
                Team 3D Usher.
        ';

        $this->elastic_mail($admin_email, $admin_name, $subject, $user_email, $user_template);
    }

	// Forgot Password
    function forgotPasswordEmail($user_id, $user_name, $user_email, $token){    
        // Admin Detail
        $admin_email = $this->lang->line('admin_email');
        $admin_name = $this->lang->line('admin_name');

        // Subject
        $subject = '3D Usher Password Reset';
        
        // User Detail
        $user_id = $user_id; 
        $user_name = $user_name; 
        $user_email = $user_email;

        // Token
        $token = $token;
        
        // User Template
        $user_template = '
                Dear '.$user_name.',
            <br/><br/>
                Someone has requested a link to change your 3D Usher account password. You can do this through
                the link below.
            <br/>
                This password reset is only valid for the next 24 hours.
            <br/><br/>
                <a href="'.base_url('change-password/change/'.$token).'">
                    Change my 3D Usher account password
                </a>
            <br/><br/>
                If you didn`t request this, please ignore this email. Your password won`t change until you access the link above and create a new one.
            <br/><br/>
                Thanks,
            <br/>
                Team 3D Usher.
        ';

        $this->elastic_mail($admin_email, $admin_name, $subject, $user_email, $user_template);
    }

    // Contact Email
    function contactEmail($name, $email, $mobile, $query){
        
        $formID = '72e2b09b-5b9c-4b7c-a0b3-54053038b1a0';

        // Hubspot Email
        $hubspotutk      = $_COOKIE['hubspotutk']; //grab the cookie from the visitors browser.
        $ip_addr         = $_SERVER['REMOTE_ADDR']; //IP address too.
        $hs_context      = array(
            'hutk' => $hubspotutk,
            'ipAddress' => $ip_addr,
            'pageUrl' => 'https://3dusher.com/contact-us',
            'pageName' => 'Contact Us'
        );
        $hs_context_json = json_encode($hs_context);

        $str_post = "firstname=" . urlencode($name) 
            . "&email=" . urlencode($email) 
            . "&phone=" . urlencode($mobile) 
            . "&hs_context=" . urlencode($hs_context_json);
        $this->hubspot_email($str_post, $formID);    
        
        // Email Sending
        // Admin Detail
        $admin_email = $this->lang->line('admin_email');
        $admin_name = $this->lang->line('admin_name');

        // Subject
        $subject = 'Contact Page Inquiry';
        
        // User Detail
        $user_name = $name;
        $user_email = $email;
        
        // User Template
        $user_template = '
            <strong>
                Name – '.$name.'               
                Email – '.$email.'               
                Phone – '.$mobile.'               
                Query – '.$query.'               
            </strong>
        ';
        // Elastic Email
        $this->elastic_mail($user_email, $user_name, $subject, $admin_email, $user_template);        
    }

    // Subscription Email
    function subscriptionEmail($email){
        
        $formID = 'eec02615-b94e-4afc-9bac-88d156f3ff3b';

        // Hubspot Email
        $hubspotutk      = $_COOKIE['hubspotutk'];
        $ip_addr         = $_SERVER['REMOTE_ADDR'];
        $hs_context      = array(
            'hutk' => $hubspotutk,
            'ipAddress' => $ip_addr,
            'pageUrl' => 'https://3dusher.com',
            'pageName' => 'Subscription'
        );
        $hs_context_json = json_encode($hs_context);

        $str_post = "email=" . urlencode($email) 
            . "&hs_context=" . urlencode($hs_context_json);
        
        $this->hubspot_email($str_post, $formID);
    } 

    function manufactureOrderEmail($o_id, $o_amount){
        // Admin Detail
        $admin_email = $this->lang->line('admin_email');
        $admin_name = $this->lang->line('admin_name');

        // Subject
        $subject = 'Your order '.$o_id.' has been successfully placed.';
        
        // User Detail
        $user_name = $this->session->userdata('usher_name');
        $user_email = $this->session->userdata('usher_email');
        
        // User Template
        $user_template = '
                Dear '.$user_name.',
            <br/><br/>
                Thanks for your order.
            <br/><br/>
                Your Order Number is - '.$o_id.'
            <br/><br/>
                Order Grand Total - $'.$o_amount.'
            <br/><br/>
                Your order is now being processed, you will receive a confirmation Email once we start manufacturing.
            <br/><br/>
                Let`s get innovating,
            <br/>
                Team 3D Usher
        ';
        // Elastic Email
        $this->elastic_mail($admin_email, $admin_name, $subject, $user_email, $user_template);
    }

    // Design Order Confirm
    function designOrderEmail($order_id, $name){
        // Admin Detail
        $admin_email = $this->lang->line('admin_email');
        $admin_name = $this->lang->line('admin_name');

        // Subject
        $subject = 'Your order '.$order_id.' has been successfully placed.';
        
        // User Detail
        $user_name = $this->session->userdata('usher_name');
        $user_email = $this->session->userdata('usher_email');
        
        // User Template
        $user_template = '
                Dear '.$user_name.',
            <br/><br/>
                Your design order has been successfully placed with 3D Usher.
            <br/><br/>
                Name of the Project – '.$name.'
            <br/><br/>
                Order Number – '.$order_id.'
            <br/><br/>
                We will get in touch with you within next 24 hours. If you have any questions, you can contact us at info@3dusher.com with your order ID.
            <br/><br/>
                Let`s get innovating,
            <br/>
                Team 3D Usher
        ';
        // Elastic Email
        $this->elastic_mail($admin_email, $admin_name, $subject, $user_email, $user_template);
    }

    // Need Help
    function needHelpEmail($array){
        // Admin Detail
        $admin_email = $this->lang->line('admin_email');
        $admin_name = $this->lang->line('admin_name');

        // User Detail
        $user_name = $this->session->userdata('usher_name');
        $user_email = $this->session->userdata('usher_email');

        // Subject
        $subject = $user_name.' just submitted Need Help form';
        
        // User Template
        $user_template = '
            <br/><br/>
                User Name - '.$user_name.'
            <br/><br/>
                User Email ID – '.$user_email.'
            <br/><br/>
                Query related to – '.$array['order_type'].'
            <br/><br/>
                Query – '.$array['help_message'].'
            <br/><br/>
        ';
        // Elastic Email
        $this->elastic_mail($user_email, $user_name, $subject, $admin_email, $user_template);
    }    

    // Project Order Confirm
    function projectOrderEmail($user_name, $user_email, $project_name, $order_id){
        // Admin Detail
        $admin_email = $this->lang->line('admin_email');
        $admin_name = $this->lang->line('admin_name');

        // Subject
        $subject = '3D Usher RFQ: '.$order_id;
        
        // User Detail
        $user_name = $user_name;
        $user_email = $user_email;
        
        // User Template
        $user_template = '
                Dear '.$user_name.',
            <br/><br/>
                Your request for quotation has been successfully submitted with 3D Usher.
            <br/><br/>
                Name of the Project – '.$project_name.'
            <br/><br/>
                Order Number – '.$order_id.'
            <br/><br/>
                We will connect with you within next 24 hours. If you have any questions, you can contact us at info@3dusher.com with your RFQ ID.
            <br/><br/>
                Let`s get innovating,
            <br/>
                Team 3D Usher
        ';
        // Elastic Email
        $this->elastic_mail($admin_email, $admin_name, $subject, $user_email, $user_template);
    }

    // Project Order Confirm
    function PRFQRemainderEmail($user_name, $user_email){
        
        // Hubspot Sending
        $formID = '0edcf556-bbdb-474f-9654-de57766ca002';

        // Hubspot Email
        $hubspotutk      = $_COOKIE['hubspotutk'];
        $ip_addr         = $_SERVER['REMOTE_ADDR'];
        $hs_context      = array(
            'hutk' => $hubspotutk,
            'ipAddress' => $ip_addr,
            'pageUrl' => 'https://3dusher.com/project',
            'pageName' => 'Project'
        );
        $hs_context_json = json_encode($hs_context);

        $str_post = "Name=" . urlencode($user_name) 
            . "&Email=" . urlencode($user_email) 
            . "&hs_context=" . urlencode($hs_context_json);
        $this->hubspot_email($str_post, $formID);

    	// Email Sending
        // Admin Detail
        $admin_email = $this->lang->line('remainder_emails');
        $admin_name = $this->lang->line('admin_name');
        // Subject
        $subject = $user_name.'  just filled Project RFQ Form.';
        
        // User Detail
        $user_name = $user_name;
        $user_email = $user_email;
        
        // User Template
        $user_template = '
                Hello,
            <br/><br/>
                You just received a Request for Quotation through 3dusher.com/project
            <br/><br/>
                Login to Admin dashboard to view the requirement.
            <br/><br/>
        ';
        // Elastic Email
        $this->elastic_mail($user_email, $user_name, $subject, $admin_email, $user_template);
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

    function hubspot_email($str_post, $formID){
        
        // Hubspat API
        $portalID = '4831911';

        $endpoint = 'https://forms.hubspot.com/uploads/form/v2/'.$portalID.'/'.$formID;

        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $str_post);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded'
        ));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response    = @curl_exec($ch); //Log the response from HubSpot as needed.
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE); //Log the response status code
        @curl_close($ch);
        // echo $status_code . " " . $response;    
    }

}
