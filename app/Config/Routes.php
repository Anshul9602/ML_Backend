<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/check', 'Home::home');
$routes->post('/auth/admin_register', 'Auth::admin_register');
$routes->post('/auth/admin_login', 'Auth::admin_login');
// user 

$routes->post('/auth/login', 'Auth::login');
$routes->post('/auth/register', 'Auth::register');
$routes->get('/users', 'Users::index');
$routes->get('/users/get_service','Users::index');
$routes->post('/users/service_add','Users::store');
$routes->get('/users/g_id/(:num)','Users::show/$1');
$routes->post('/users/g_update/(:num)','Users::update/$1');
$routes->post('/users/g_published/(:num)','Users::g_published/$1'); // stauts send


// for wall.. 

$routes->get('/cart', 'Cart::index');
$routes->post('/cart/cart_add','Cart::store');
$routes->get('/cart/w_id/(:num)','Cart::show/$1');
$routes->post('/cart/w_update/(:num)','Cart::update/$1');
$routes->post('/users/w_published/(:num)','Cart::w_published/$1');






// $routes->post('/users/post_like/(:num)', 'Users::post_like/$1');
// $routes->post('/users/user_update/(:num)', 'Users::user_update/$1');
// $routes->get('/users/get_drafts', 'Users::get_drafts');
// $routes->get('/users/get_activites', 'Users::get_activites');

$routes->delete('/users/g_delete_id/(:num)', 'Users::destroy/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
