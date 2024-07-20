<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'C_landing';
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['dashboard'] = 'C_home';
$route['landing-page'] = 'C_landing';
$route['kategori-sampah'] = 'C_ktgrsampah';
$route['list-tps'] = 'C_tps';
$route['artikel-sampah'] = 'C_artikel';
$route['artikel-sampah/tambah'] = 'C_artikel/tambah';
$route['artikel-sampah/edit/(:num)'] = 'C_artikel/edit/$1';
$route['artikel-sampah/hapus/(:num)'] = 'C_artikel/hapus/$1';

$route['user-profile/index/(:num)'] = 'C_users/index/$1';
$route['user-profile/edit/(:num)'] = 'C_users/edit/$1';
$route['user-profile/update/(:num)'] = 'C_users/update/$1';
$route['user-profile/delete/(:num)'] = 'C_users/delete/$1';
$route['user-management'] = 'C_users/manage';
$route['user-management/create'] = 'C_users/create_manage';
$route['user-management/store'] = 'C_users/store_manage';
$route['user-management/edit/(:num)'] = 'C_users/edit_manage/$1';
$route['user-management/update/(:num)'] = 'C_users/update_manage/$1';
$route['user-management/delete/(:num)'] = 'C_users/delete_manage/$1';

$route['presentase-daur-ulang'] = 'C_daur_ulang';
$route['presentase-daur-ulang/harian'] = 'C_daur_ulang/harian';
$route['presentase-daur-ulang/submit_harian'] = 'C_daur_ulang/submit_harian';
$route['presentase-daur-ulang/edit/(:num)'] = 'C_daur_ulang/edit_harian/$1';
$route['presentase-daur-ulang/update_harian'] = 'C_daur_ulang/update_harian';
$route['presentase-daur-ulang/update'] = 'C_daur_ulang/update_harian';
$route['presentase-daur-ulang/delete/(:num)'] = 'C_daur_ulang/delete/$1';
$route['presentase-daur-ulang/kalender'] = 'C_daur_ulang/kalender';
$route['presentase-daur-ulang/view-details/(:num)'] = 'C_daur_ulang/view_details/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


