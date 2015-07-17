<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['signin'] = "/main/signin";
$route['register'] = "/main/register";
$route['admindash'] = "/main/admindash";
$route['dashboard'] = "/main/dashboard";
$route['logout'] = "/main/logout";
$route['remove/(:any)'] = "/main/remove/$1";
$route['users/edit/(:any)'] = "/main/edit/$1";
$route['users/show/(:any)'] = "/main/show/$1";
$route['message_post'] = "/main/message_post";
$route['404_override'] = '';


//end of routes.php