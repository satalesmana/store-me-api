<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Ini routing untuk user.
$routes->get('/app', 'App::serve');
$routes->get('/app/(:segment)', 'App::serve/$1');
$routes->get('/app/(:segment)/(:segment)', 'App::serve/$1/$2');

$routes->get('/profile', 'Profile::index');
$routes->get('/kategori', 'KategoriController::index');
$routes->get('/api/kategori','KategoriController::getdata');
$routes->post('api/kategori/add', 'KategoriController::store');
$routes->add('api/kategori/(:segment)/edit', 'KategoriController::show/$1');
$routes->post('api/kategori/(:segment)/update', 'KategoriController::update/$1');
$routes->get('api/kategori/(:segment)/delete', 'KategoriController::destroy/$1');

$routes->get('/produk', 'ProdukController::index');
$routes->get('/api/produk', 'ProdukController::getdata');
$routes->post('api/produk/add', 'ProdukController::store');
$routes->add('api/produk/(:segment)/edit', 'ProdukController::show/$1');
$routes->post('api/produk/(:segment)/update', 'ProdukController::update/$1');
$routes->get('api/produk/(:segment)/delete', 'ProdukController::destroy/$1');

$routes->group('api', ['namespace' => 'App\Controllers'], function($routes)
{
    $routes->resource('member',['controller' =>'MemberController', 'except' => 'new,edit']);
});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
