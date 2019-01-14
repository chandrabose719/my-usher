<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	$route['default_controller'] = 'home';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	// Home
	$route['home'] = 'home';
	$route['start-project'] = 'home/start_project';

	$route['about-us'] = 'home/about_us';
	$route['faq'] = 'home/faq';
	$route['contact-us'] = 'home/contact_us';

	// Authentication
	$route['register'] = 'authentication';
	$route['registeration'] = 'authentication/registeration';
	$route['google-authentication'] = 'authentication/google_auth';
	$route['login'] = 'authentication/login';
	$route['forgot-password'] = 'authentication/forgot_password';
	$route['change-password/(:any)/(:any)'] = 'authentication/change_password';
	$route['signout'] = 'authentication/logout';

	// Dashboard
	$route['account'] = 'dashboard/account';
	$route['manufacturing-orders'] = 'dashboard/manufacture_complete';
	$route['manufacturing-incomplete-orders'] = 'dashboard/manufacture_incomplete';
	$route['designing-orders'] = 'dashboard/design_complete';
	$route['account-settings'] = 'dashboard/setting';
	$route['need-help/(:any)/(:num)'] = 'dashboard/need_help';

	// Design
	$route['describe-project'] = 'design/describe_project';
	$route['project-details/(:num)'] = 'design/project_details';
	$route['design-store-session'] = 'design/store_session';
	$route['design-order-overview'] = 'design/project_overview';
	$route['design-order-confirmation'] = 'design/project_confirm';

	// Resources
	$route['resources'] = 'resources';
	$route['resources/fused-deposition-modeling'] = 'resources/fdm';
	$route['resources/selective-laser-sintering'] = 'resources/sls';

	// Industry
	$route['aerospace'] = 'industry/aerospace';
	$route['architecture'] = 'industry/architecture';
	$route['automotive'] = 'industry/automotive';
	$route['education'] = 'industry/education';
	$route['gifting'] = 'industry/gifting';
	$route['manufacturing'] = 'industry/manufacturing';
	$route['medtech'] = 'industry/medtech';
	$route['product-design-research'] = 'industry/product_design_research';

	// Blog
	$route['blog'] = 'blog';
	$route['blog/customized-keychains-using-3d-printing'] = 'blog/customized_keychain';
	
	// Location
	$route['location/india'] = 'location/india';
	// $route['name/(:any)/(:any)'] = '';