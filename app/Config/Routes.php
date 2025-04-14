<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// ======================
// Halaman Utama (Public)
// ======================
$routes->get('/', 'Home::index');

// =====================
// Halaman Login Admin
// =====================
$routes->get('admin/login', 'AdminController::loginForm');
$routes->post('admin/login', 'AdminController::loginProcess');
$routes->get('admin/logout', 'AdminController::logout');

// =====================
// Halaman Dashboard Admin
// =====================
$routes->get('admin/dashboard', 'AdminController::dashboard');

// =====================
// Kas Masuk
// =====================
$routes->get('kas-masuk', 'AdminController::indexKasMasuk');
$routes->get('kas-masuk/create', 'AdminController::createKasMasuk');
$routes->post('kas-masuk/store', 'AdminController::storeKasMasuk');
$routes->get('kas-masuk/edit/(:num)', 'AdminController::editKasMasuk/$1');
$routes->post('kas-masuk/update/(:num)', 'AdminController::updateKasMasuk/$1');
$routes->get('kas-masuk/delete/(:num)', 'AdminController::deleteKasMasuk/$1');

// =====================
// Kas Keluar
// =====================
$routes->get('kas-keluar', 'AdminController::indexKasKeluar');
$routes->get('kas-keluar/create', 'AdminController::createKasKeluar');
$routes->post('kas-keluar/store', 'AdminController::storeKasKeluar');
$routes->get('kas-keluar/edit/(:num)', 'AdminController::editKasKeluar/$1');
$routes->post('kas-keluar/update/(:num)', 'AdminController::updateKasKeluar/$1');
$routes->get('kas-keluar/delete/(:num)', 'AdminController::deleteKasKeluar/$1');

// =====================
// Admin
// =====================
$routes->post('admin/store', 'AdminController::storeAdmin');
$routes->get('admin/data-admin', 'AdminController::dataAdmin');
$routes->get('admin/tambah-admin', 'AdminController::tambahAdmin');
$routes->get('admin/edit-admin/(:num)', 'AdminController::editAdmin/$1');
$routes->post('admin/update-admin/(:num)', 'AdminController::updateAdmin/$1');
$routes->get('admin/delete-admin/(:num)', 'AdminController::deleteAdmin/$1');
$routes->post('/admin/store-admin', 'AdminController::storeAdmin');
$routes->post('admin/delete-admin/(:num)', 'AdminController::deleteAdmin/$1');

// =====================
// Laporan
// =====================
$routes->get('laporan', 'AdminController::laporan');
$routes->post('laporan/lihat', 'AdminController::lihatLaporan');
$routes->get('laporan', 'AdminController::laporan');
$routes->post('laporan', 'AdminController::laporan');
$routes->get('laporan/pdf', 'AdminController::laporanPDF');
$routes->get('laporan/excel', 'AdminController::laporanExcel');

//=====================
// Logout
// =====================
$routes->get('logout', 'AdminController::logout');