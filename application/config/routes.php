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

	// Privacy
	$route['privacy-policy'] = 'privacy/privacy_policy';
	$route['terms-of-use'] = 'privacy/terms_of_use';

	// Authentication
	$route['register'] = 'authentication/register';
	$route['log-in'] = 'authentication/login';
	$route['register-operation'] = 'authentication/register_operation';
	$route['login-operation'] = 'authentication/login_operation';
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
	$route['manufacture-delete/(:num)'] = 'manufacture/manufacture_delete';
	$route['manufacture-overview'] = 'manufacture/manufacture_overview';
	$route['manufacture-payment'] = 'manufacture/manufacture_payment';
	$route['manufacture-confirmation'] = 'manufacture/manufacture_confirm';

	// Design
	$route['describe-project'] = 'design/describe_project';
	$route['project-details/(:num)'] = 'design/project_details';
	$route['design-store-session'] = 'design/store_session';
	$route['design-order-overview'] = 'design/project_overview';
	$route['design-order-confirmation'] = 'design/project_confirm';

	// Project
	$route['project'] = 'project/index';
	$route['project-store-session'] = 'project/store_session';
	$route['project-confirmation'] = 'project/project_confirmation';

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
	$route['blog/3d-printing-personalized-and-customizable-keychains'] = 'blog/customized_keychain';
	$route['blog/personalized-jewellery-like-3d-printed-rings-and-more'] = 'blog/personalized_jewelry';
	$route['blog/3d-printing-teeth-and-braces-after-3d-scanning-jaw'] = 'blog/dental_implants';
	$route['blog/customized-miniatures-and-figurines-using-3d-printing'] = 'blog/customized_miniatures';
	$route['blog/get-your-deathly-hallows-3d-printed'] = 'blog/deathly_hallows';
	$route['blog/injection-molding-explained-easy'] = 'blog/injection_molding';
	$route['blog/personalized-gifts-with-3d-printing'] = 'blog/personalized_gifts';
	$route['blog/3d-printing-a-drone-and-drone-parts'] = 'blog/printing_3d';
	$route['blog/3d-printing-prosthetic-limbs-like-a-cyborg'] = 'blog/prosthetic_limbs';
	$route['blog/automotive-car-parts-and-3d-printing'] = 'blog/automotive_car';
	$route['blog/rapid-prototyping-for-architecture-models'] = 'blog/rapid_prototyping';
	$route['blog/silicon-mold-what-how-to-and-benefits'] = 'blog/silicon_mold';
	$route['blog/3d-printing-test-dummies-for-car-safety'] = 'blog/car_safety';
	$route['blog/3d-printing-medical-models-for-hospitals-and-research'] = 'blog/hospitals_research';
	$route['blog/3d-printing-light-weight-custom-wheels'] = 'blog/custom_wheels';
	$route['blog/3d-printing-a-selfie-or-a-photo-as-lithophane'] = 'blog/photo_lithophane';
	$route['blog/3d-printing-harry-potter-as-a-modern-muggle'] = 'blog/modern_muggle';
	$route['blog/3d-printing-personalized-gifts-like-engraved-ring-on-valentine-day'] = 'blog/valentine_day';
	$route['blog/3d-printing-a-personalized-smartphone-cover'] = 'blog/smartphone_cover';
	$route['blog/3d-printed-smash-bros-action-figures'] = 'blog/action_figures';
	$route['blog/get-customized-3d-printed-award-or-trophies-like-oscars'] = 'blog/customised_awards';
	$route['blog/what-is-colour-jet-3d-printing'] = 'blog/colour_jet';
	$route['blog/3d-print-simple-or-functional-science-fair-models'] = 'blog/science_fair';

	// Location
	$route['location/india'] = 'location/india';
	// $route['name/(:any)/(:any)'] = '';