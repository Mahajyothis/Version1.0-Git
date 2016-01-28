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
|	http://codeigniter.com/user_guide/general/routing.html
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
if(!MOBILE_SITE) $route['default_controller'] = 'home';
else $route['default_controller'] = 'home/index_mobile';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['user'] = 'login/login_process';
$route['user/:any'] = 'login/logged_user';
//$route['logout']='logout/log_out';
$route['settings']='settings/setting_get';
$route['numerology']='numerology/numer_ology';
$route['numerologynew']='numerologynew/numer_ologynew';
$route['calendar']='calendar/calen';
$route['tarotnew']='tarotnew/tarot_new';
$route['lovemeter']='lovemeter/love_meter';
$route['friend']='friend';
$route['friendanalysis']='friend_ship/friendship';
$route['knowyourcharecter']='knowyourcharecter/know';
$route['yourcharecter']='yourcharecter/charecter';
$route['loveanalysis']='love_process/lovemeter_process';
$route['tarotreading']='tarotreading/tarot_process';
$route['email']='Gfp';
$route['blog']='blog';
$route['search']='search';
$route['networks']='networks';
$route['following']='following';
$route['basicprofile']='basic_profile';
$route['like']='like';
$route['recentactivity']='recent_activity';
$route['activity']='activity';


$route['forum'] = 'forum';




$route['post/own'] = 'post/index/own';
$route['post/public'] = 'post/index/public';
$route['post/private'] = 'post/index/private';

$route['events/add'] = 'events/add';
$route['events/update'] = 'events/update';
$route['events/delete'] = 'events/delete';
$route['events/upload_status_image'] = 'events/upload_status_image';
$route['events/delete_image'] = 'events/delete_image';
$route['events/post'] = 'events/post';
$route['events/post_delete'] = 'events/post_delete';
$route['events/get_post'] = 'events/get_post';
$route['events/post_update'] = 'events/post_update';
$route['events/(:any)/(:num)'] = 'events/index/$1/$2';
$route['events/(:num)'] = 'events/index/$1/$1';
$route['events/(:any)'] = 'events/index/$1';

$route['article/publish'] = 'article/publish';
$route['article/delete'] = 'article/delete';
$route['article/update_comment'] = 'article/update_comment';
$route['article/delete_comment'] = 'article/delete_comment';
$route['article/edit/(:any)'] = 'article/edit/$1';
$route['article/view/(:any)'] = 'article/view/$1';
$route['article/category/(:any)'] = 'article/index/category/$1';
$route['article/category/(:any)/(:num)'] = 'article/index/category/$1/$2';
$route['article/(:num)'] = 'article/index/$2/$3/$1';
$route['article/(:any)'] = 'article/index/$1/$2/1';
$route['article/(:any)/(:num)'] = 'article/index/$1/$3/$2';

$route['blog']='joomla/blog';