<?php

defined('BASEPATH') or exit('No direct script access allowed');

// Specific API routes (must come before generic routes)
$route['api/playground']               = 'playground/index';
$route['api/playground/swagger']      = 'playground/swagger';
$route['api/sandbox']                  = 'playground/sandbox';
$route['api/sandbox/execute_request'] = 'playground/execute_request';
$route['api/sandbox/get_samples'] = 'playground/get_samples';
$route['api/sandbox/get_endpoints'] = 'playground/get_endpoints';
$route['api/sandbox/get_environment_config'] = 'playground/get_environment_config';
$route['api/sandbox/documentation'] = 'playground/documentation';

$route['api/users/stats/(:num)']   = 'api/user_stats/$1';
$route['api/users/stats']          = 'api/user_stats';

$route['api/reporting']            = 'reporting/index';
$route['api/reporting/get_chart_data'] = 'reporting/get_chart_data';
$route['api/reporting/export']     = 'reporting/export';

// Generic API routes (must come after specific routes)
$route['api/delete/(:any)/(:num)'] = '$1/data/$2';
$route['api/(:any)/search/(:any)'] = '$1/data_search/$2';
$route['api/(:any)/search']        = '$1/data_search';
$route['api/login/auth']           = 'login/login_api';
$route['api/login/view']           = 'login/view';
$route['api/login/key']            = 'login/api_key';
$route['api/(:any)/(:any)/(:num)'] = '$1/data/$2/$3';
$route['api/(:any)/(:num)/(:num)'] = '$1/data/$2/$3';
$route['api/custom_fields/(:any)/(:num)'] = 'custom_fields/data/$1/$2';
$route['api/custom_fields/(:any)'] = 'custom_fields/data/$1';
$route['api/common/(:any)/(:num)'] = 'common/data/$1/$2';
$route['api/common/(:any)'] = 'common/data/$1';
$route['api/(:any)/(:num)']        = '$1/data/$2';
$route['api/(:any)']               = '$1/data';
