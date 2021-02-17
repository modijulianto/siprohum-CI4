<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/Dashboard', 'User::index', ['filter' => 'auth']);
$routes->get('/Dashboard/(:any)', 'User::$1', ['filter' => 'auth']);

$routes->get('/Profile', 'User::my_profile', ['filter' => 'auth']);
$routes->post('/Profile/(:any)', 'User::$1', ['filter' => 'auth']);
$routes->get('/Profile/(:any)', 'User::$1', ['filter' => 'auth']);

$routes->get('/ChangePassword', 'User::change_password', ['filter' => 'auth']);
$routes->post('/ChangePassword/(:any)', 'User::save_change_password', ['filter' => 'auth']);

$routes->get('/Admin', 'Admin::index', ['filter' => 'isAdmin']);
$routes->get('/Admin/(:any)', 'Admin::$1', ['filter' => 'isAdmin']);

$routes->get('/Operator', 'Operator::index', ['filter' => 'isAdmin']);
$routes->get('/Operator/(:any)', 'Operator::$1', ['filter' => 'isAdmin']);

$routes->get('/Unit', 'Unit::index', ['filter' => 'isAdmin']);
$routes->get('/Unit/(:any)', 'Unit::$1', ['filter' => 'isAdmin']);

$routes->get('/MasterData', 'MasterData::index', ['filter' => 'isAdmin']);
$routes->get('/MasterData/jenis/', 'MasterData::index', ['filter' => 'isAdmin']);
$routes->get('/MasterData/jenis/(:any)', 'MasterData::$1', ['filter' => 'isAdmin']);

$routes->get('/MasterData/kategori/', 'MasterData::kategori', ['filter' => 'isAdmin']);
$routes->get('/MasterData/kategori/(:any)', 'MasterData::$1', ['filter' => 'isAdmin']);

// Untuk halaman operator
$routes->get('/ProdukHukum/add', 'ProdukHukum::add', ['filter' => 'auth']);
$routes->get('/ProdukHukum/update/(:any)', 'ProdukHukum::update/$1', ['filter' => 'auth']);
$routes->get('/ProdukHukum/delete/(:any)', 'ProdukHukum::delete/$1', ['filter' => 'auth']);
$routes->get('/ProdukHukum/detail/(:any)', 'ProdukHukum::detail/$1', ['filter' => 'auth']);
$routes->get('/ProdukHukum', 'ProdukHukum::index', ['filter' => 'auth']);
// Untuk halaman admin
$routes->get('/ProdukHukum/(:any)', 'ProdukHukum::produk_hukum/$1', ['filter' => 'isAdmin']);

$routes->get('/MasterData/tentang/', 'MasterData::tentang', ['filter' => 'auth']);
$routes->get('/MasterData/tentang/(:any)', 'MasterData::$1', ['filter' => 'auth']);
$routes->get('/Tentang', 'MasterData::tentang', ['filter' => 'auth']);

$routes->get('/Auth', 'Auth::index');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}