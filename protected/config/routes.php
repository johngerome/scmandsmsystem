<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'account/index';
//$route['(:any)'] = 'pages/view/$1';

// Account
$route['account'] = 'account/index';
$route['account/dashboard'] = 'account/index';
$route['account/my_profile'] = 'account/my_profile';
$route['account/login'] = 'account/login';
//$route['account/login/login_to_continue'] = 'account/login';
//$route['account/login/(:any)'] = 'error';
$route['account/logout'] = 'account/logout';

// Member
$route['member/create'] = 'member/create';

//Branch
$route['branch'] = 'branch/index';
$route['branch/bakery'] = 'branch/bakery';
$route['branch/eggstore'] = 'branch/eggstore';

$route['branch/add/(:any)'] = 'branch/add/$1';

//Global Configuration
$route['global_configuration/site'] = 'Global_Configuration/site';
$route['global_configuration/system'] = 'Global_Configuration/system';
$route['global_configuration'] = 'Global_Configuration/index';

//$route['books/(:any)'] = 'books/view/$1';
//$route['books'] = 'books';





/* End of file routes.php */
/* Location: ./application/config/routes.php */