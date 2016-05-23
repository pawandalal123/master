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
$route['default_controller'] = "user";
$route['404_override'] = 'user/notfound';
$route['product/(:any)'] = 'category/index/$1';
$route['lead/(:any)'] = 'buylead/index/$1';
$route['add/(:any)'] = 'productsell/productlist/$1';
$route['addgrid/(:any)'] = 'productsell/productlGrid/$1';
$route['addsubcat/(:any)'] = 'productsell/subcategoryList/$1';
$route['catlist/(:any)'] = 'category/allindex/$1';
$route['catlist'] = 'category/allindex';
$route['subcategory/(:any)'] = 'category/subcategory/$1';
$route['detail/(:any)'] = 'category/viewdetails/$1';
$route['productsearch/(:any)'] = 'search/ProductSearch/$1';
$route['LeadsSearch/(:any)'] = 'search/LeadsSearch/$1';
$route['contentview/(:any)'] = 'content/contentview/$1';
$route['contentview'] = 'content/contentview';
$route['register'] = 'category/register';
$route['enquiry'] = 'user/enquiry';
$route['login'] = 'userlogin/login';	
$route['post-ads'] = 'sellproduct/SellProduct';	
$route['buyleadlist'] = 'buylead/buyleadlist';	
$route['requirment'] = 'buylead/Requirment';	
$route['adds'] = 'sellproduct/Listall';
$route['add'] = 'sellproduct/Listall';
$route['addgrid'] = 'sellproduct/Listall';
$route['all-results'] = 'productsell/allproduct';
$route['all-results/(:any)'] = 'productsell/allproduct/$1';
$route['all-results-grid'] = 'productsell/allproductgrid';
$route['all-results-grid/(:any)'] = 'productsell/allproductgrid/$1';
$route['productdetail/(:any)'] = 'productsell/productdetail/$1';



/* End of file routes.php */

/* Location: ./application/config/routes.php */