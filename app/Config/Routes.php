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


// Ini routing untuk user.
$routes->group('app',['namespace' => 'App\Controllers'], function($routes){
    $routes->get('', 'App::serve');
    $routes->get('(:segment)', 'App::serve/$1');
    $routes->get('(:segment)/(:segment)', 'App::serve/$1/$2');
});

$routes->group('/', ['namespace' => 'App\Controllers'], function($routes){
    $routes->get('', 'Home::index');
    $routes->get('kategori', 'KategoriController::index');
    $routes->get('produk', 'ProdukController::index');
    $routes->get('profile', 'Profile::index');
    $routes->get('pesanan', 'PesananController::index');
    $routes->get('member', 'MemberController::index');
});

$routes->group('api', [ 'namespace' => 'App\Controllers'], function($routes)
{
    $routes->resource('kategori',['controller' =>'KategoriController', 'except' => 'new,edit']);
    $routes->resource('produk',['controller' =>'ProdukController', 'except' => 'new,edit']);
    $routes->resource('pesanan',['controller' =>'PesananController', 'except' => 'new,edit']);
    $routes->resource('member',['controller' =>'MemberController', 'except' => 'new,edit']);
});



$routes->group('cmb', ['namespace' => 'App\Controllers'], function($routes){
    $routes->get('kategori', 'DropdownController::categoriitem');
});

$routes->group('auth', ['namespace' => 'App\Controllers'], function($routes)
{
    $routes->post('register', 'Auth::register');
    $routes->post('login', 'Auth::login');
    $routes->post('me', 'Auth::me');
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
