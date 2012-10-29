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

$route['default_controller'] = 'account/dashboard';
//$route['(:any)'] = 'pages/view/$1';

// Account
$route['account'] = 'account/index';
$route['account/dashboard'] = 'account/dashboard';
$route['account/my_profile'] = 'account/my_profile';
$route['account/login'] = 'account/login';

//USER Type
$route['user_type/saved'] = 'user_type/index';
$route['user_type/deleted'] = 'user_type/index';
$route['user_type/updated'] = 'user_type/index';


$route['account/logout'] = 'account/logout';
$route['account'] = 'account/index';
$route['account/add_user'] = 'account/add';
$route['account/deleted'] = 'account/index';

//Product
$route['product/deleted'] = 'product/index';
$route['product/archived'] = 'product/index';
$route['product/trash/restored'] = 'product/trash';

//Package
$route['package/deleted'] = 'package/index';

$route['product_package/deleted'] = 'product_package/index';

//Product Line
$route['product_line/deleted']= 'product_line/index';

//Managed customer
$route['customer']= 'customer/index';
$route['customer/deleted']= 'customer/index';


//Reports
$route['reports'] = 'reports/index';

//Notifacation
$route['notification']= 'order/index';
$route['notification/trash'] = 'order/trash';



//Branch
$route['branch'] = 'branch/index';
$route['branch/trash/deleted'] = 'branch/trash';
$route['branch/trash/restored'] = 'branch/trash';
$route['branch/archived'] = 'branch/index';

$route['branch_type/deleted'] = 'branch_type/index';
//$route['branch/bakery'] = 'branch/bakery';
////$route['branch/eggstore'] = 'branch/eggstore';
//$route['branch/archive'] = 'branch/archive';



//Global Configuration
$route['global_configuration/site'] = 'Global_Configuration/site';
$route['global_configuration/system'] = 'Global_Configuration/system';
$route['global_configuration'] = 'Global_Configuration/index';



//$route['books/(:any)'] = 'books/view/$1';
//$route['books'] = 'books';

$route['404_override'] = 'error/index';



/* End of file routes.php */
/* Location: ./application/config/routes.php */