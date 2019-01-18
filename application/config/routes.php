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
	$route['login'] = 'authentication/login';
	$route['forgot-password'] = 'authentication/forgot_password';
	$route['change-password/(:any)/(:any)'] = 'authentication/change_password';
	$route['signout'] = 'authentication/logout';
	// Social Login
	$route['google-authentication'] = 'authentication/google_auth';
	$route['fb-authentication'] = 'authentication/fb_auth';
	$route['fb-logout'] = 'authentication/fb_logout';

	// Dashboard
	$route['account'] = 'dashboard/account';
	$route['manufacturing-orders'] = 'dashboard/manufacture_complete';
	$route['manufacturing-incomplete-orders'] = 'dashboard/manufacture_incomplete';
	$route['designing-orders'] = 'dashboard/design_complete';
	$route['account-settings'] = 'dashboard/setting';
	$route['need-help/(:any)/(:num)'] = 'dashboard/need_help';

	// Manufacture
	$route['manufacture'] = 'manufacture/index';
	$route['manufacture-store-session'] = 'manufacture/store_session';
	$route['manufacture-details'] = 'manufacture/manufacture_details';
	$route['manufacture-overview'] = 'manufacture/manufacture_overview';
	$route['manufacture-payment'] = 'manufacture/manufacture_payment';
	$route['manufacture-confirmation'] = 'manufacture/manufacture_confirm';

	// Design
	$route['describe-project'] = 'design/describe_project';
	$route['project-details/(:num)'] = 'design/project_details';
	$route['design-store-session'] = 'design/store_session';
	$route['design-order-overview'] = 'design/project_overview';
	$route['design-order-confirmation'] = 'design/project_confirm';

	// Industry
	$route['aerospace'] = 'industry/aerospace';
	$route['architecture'] = 'industry/architecture';
	$route['automotive'] = 'industry/automotive';
	$route['education'] = 'industry/education';
	$route['gifting'] = 'industry/gifting';
	$route['manufacturing'] = 'industry/manufacturing';
	$route['medtech'] = 'industry/medtech';
	$route['product-design-research'] = 'industry/product_design_research';

	// Resources
	$route['resources'] = 'resources';
	$route['resources/fused-deposition-modeling'] = 'resources/fdm';
	$route['resources/selective-laser-sintering'] = 'resources/sls';
	$route['resources/frp-moulding'] = 'resources/frp';
	$route['resources/direct-metal-laser-sintering'] = 'resources/dmls';
	$route['resources/stereolithography'] = 'resources/sla';
	$route['resources/vacuum-casting'] = 'resources/vc';

	// Blog
	$route['blog'] = 'blog';
	$route['blog/customized-keychains-using-3D-printing'] = 'blog/customized_keychain';
	$route['blog/personalized-jewelry-using-additive-manufacturing'] = 'blog/personalized_jewelry';
	$route['blog/dental-implants-and-teeth-braces-using-3D-printing'] = 'blog/dental_implants';
	$route['blog/customized-miniatures-and-figurines-using-3d-printing'] = 'blog/customized_miniatures';
	$route['blog/get-your-deathly-hallows-3D-printed'] = 'blog/deathly_hallows';
	$route['blog/injection-molding-explained-easy'] = 'blog/injection_molding';
	$route['blog/personalized-gifts-with-3D-printing'] = 'blog/personalized_gifts';
	$route['blog/3d-printing-and-Drones'] = 'blog/printing_3d';
	$route['blog/prosthetic-limbs'] = 'blog/prosthetic_limbs';
	$route['blog/automotive-car-parts-and-3D-printing'] = 'blog/automotive_car';
	$route['blog/rapid-prototyping-for-architecture-models'] = 'blog/rapid_prototyping';
	$route['blog/silicon-mold'] = 'blog/silicon_mold';

	// Location
	$route['location/india'] = 'location/india';
	// $route['name/(:any)/(:any)'] = '';