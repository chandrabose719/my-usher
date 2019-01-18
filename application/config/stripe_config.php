<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Stripe Library
require_once(APPPATH.'libraries/Stripe/init.php');

// Test Key
$secretKey = 'sk_test_DGWK1Cd96qebLDun47kSemcQ';
$publishableKey = 'pk_test_5fA7g0sKfGEuDal5pEdys0Te';

// Live Key
// $secretKey = '';
// $publishableKey = '';

$config['secretKey'] = $secretKey;
$config['publishableKey'] = $publishableKey;

\Stripe\Stripe::setApiKey($secretKey);
