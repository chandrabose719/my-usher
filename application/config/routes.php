<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	$route['default_controller'] = 'home';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	// Home
	$route['home'] = 'home';
	$route['about-us'] = 'home/about_us';
	$route['resources'] = 'home/resources';
	$route['faq'] = 'home/faq';
	$route['contact-us'] = 'home/contact_us';

	// Industry
	$route['aerospace'] = 'industry/aerospace';
	$route['architecture'] = 'industry/architecture';
	$route['automotive'] = 'industry/automotive';
	$route['education'] = 'industry/education';
	$route['gifting'] = 'industry/gifting';
	$route['manufacturing'] = 'industry/manufacturing';
	$route['medtech'] = 'industry/medtech';
	$route['product-design-research'] = 'industry/product_design_research';
	
	// Location
	$route['location/india'] = 'location/india';
	// $route['name/(:any)/(:any)'] = '';