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

// ROUTES HOME
$routes->get('/', 'Home::index');

$routes->get('/statistik', 'Home::statistik');
$routes->get('/statistik/(:any)', 'Home::$1');

$routes->get('/Jdih/unit', 'Home::index');
$routes->get('/Jdih/unit/(:any)', 'Home::unit/$1');

$routes->get('/Jdih/kategori', 'Home::index');
$routes->get('/Jdih/kategori/(:any)', 'Home::kategori/$1');

$routes->get('/Jdih/cari', 'Home::cari');

$routes->get('/Jdih/produk', 'Home::index');
$routes->get('/Jdih/produk/(:any)', 'Home::produk/$1');
// END ROUTES HOME

$routes->get('/Dashboard', 'User::index', ['filter' => 'auth']);
$routes->get('/Dashboard/(:any)', 'User::$1', ['filter' => 'auth']);

$routes->get('/Upload', 'Upload::index', ['filter' => 'auth']);
$routes->get('/Upload/(:any)', 'Upload::$1', ['filter' => 'auth']);

$routes->get('/Profile', 'User::my_profile', ['filter' => 'auth']);
$routes->post('/Profile/(:any)', 'User::$1', ['filter' => 'auth']);
$routes->get('/Profile/(:any)', 'User::$1', ['filter' => 'auth']);

$routes->get('/ChangePassword', 'User::change_password', ['filter' => 'auth']);
$routes->post('/ChangePassword/(:any)', 'User::save_change_password', ['filter' => 'auth']);

$routes->get('/Admin', 'Admin::index', ['filter' => 'isAdmin']);
$routes->get('/Admin/(:any)', 'Admin::$1', ['filter' => 'isAdmin']);

$routes->get('/Validator', 'Validator::index', ['filter' => 'isAdmin']);
$routes->get('/Validator/(:any)', 'Validator::$1', ['filter' => 'isAdmin']);

$routes->get('/Unit', 'Unit::index', ['filter' => 'isAdmin']);
$routes->get('/Unit/(:any)', 'Unit::$1', ['filter' => 'isAdmin']);

$routes->get('/MasterData', 'MasterData::index', ['filter' => 'isAdmin']);
$routes->get('/MasterData/jenis/', 'MasterData::index', ['filter' => 'isAdmin']);
$routes->get('/MasterData/jenis/(:any)', 'MasterData::$1', ['filter' => 'isAdmin']);

$routes->get('/MasterData/kategori/', 'MasterData::kategori', ['filter' => 'isAdmin']);
$routes->get('/MasterData/kategori/(:any)', 'MasterData::$1', ['filter' => 'isAdmin']);

// Untuk Validator
$routes->get('/Operator', 'Operator::index', ['filter' => 'isValidator']);
$routes->get('/Operator/(:any)', 'Operator::$1', ['filter' => 'isValidator']);
$routes->get('/ProdukHukum/unvalidation/(:any)', 'ProdukHukum::unvalidation/$1', ['filter' => 'isValidator']);

// Untuk halaman operator
$routes->get('/ProdukHukum/add', 'ProdukHukum::add', ['filter' => 'authproduk']);
$routes->get('/ProdukHukum/update/(:any)', 'ProdukHukum::update/$1', ['filter' => 'authproduk']);
$routes->get('/ProdukHukum/delete/(:any)', 'ProdukHukum::delete/$1', ['filter' => 'authproduk']);
$routes->get('/ProdukHukum/detail/(:any)', 'ProdukHukum::detail/$1', ['filter' => 'auth']);
$routes->get('/ProdukHukum', 'ProdukHukum::index', ['filter' => 'auth']);
$routes->get('/ProdukHukum/save_media', 'ProdukHukum::save_media', ['filter' => 'auth']);
$routes->get('/ProdukHukum/delete_media/(:any)', 'ProdukHukum::delete_media/$1', ['filter' => 'auth']);

$routes->get('/ProdukHukum/perjanjian', 'ProdukHukum::perjanjian', ['filter' => 'authproduk']);
$routes->get('/Pihak/tambah', 'Pihak::tambah', ['filter' => 'authproduk']);
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
