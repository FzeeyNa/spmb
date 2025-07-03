<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();


// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

$routes->set404Override(function () {
    return view('my404');
});

$routes->get('/payment/callback', 'CallbackController::callback', ['filter' => 'apitoken']);

$routes->get('/', 'Home::index');
$routes->get('/sign-in', 'Home::login');
$routes->post('/login/teLogin', 'Login::tesLogin');
$routes->post('/home/tesLogin', 'Home::tesLogin');
$routes->get('/sk', 'Home::sk');

$routes->get('/sukses', 'Home::berhasil');
$routes->get('/admin', 'Admin::index', ['filter' => 'auth']);
$routes->get('/admin/mUser', 'Admin::mUser', ['filter' => 'auth']);
$routes->get('/jurusan', 'Jurusan::index', ['filter' => 'auth']);
$routes->get('/formulir', 'Formulir::index', ['filter' => 'auth']);
$routes->get('/daftarUlang', 'DaftarUlang::index', ['filter' => 'auth']);
$routes->get('/tes', 'Tes::index', ['filter' => 'auth']);


// verifikator
$routes->get('/verifikator', 'Verifikator::index', ['filter' => 'auth']);
$routes->get('/verifikator/daftarSiswa', 'Verifikator::daftarSiswa', ['filter' => 'auth']);
$routes->get('/verifikator/dataPendaftar', 'Verifikator::dataPendaftar', ['filter' => 'auth']);
$routes->get('/verifikator/formulir', 'Verifikator::formulir', ['filter' => 'auth']);
$routes->get('/verifikator/daftarUlang', 'Verifikator::daftarUlang', ['filter' => 'auth']);
$routes->get('/verifikator/tes', 'Verifikator::tes', ['filter' => 'auth']);
$routes->get('/verifikator/pengumuman', 'Verifikator::pengumuman', ['filter' => 'auth']);
$routes->get('/verifikator/status', 'Verifikator::statusPendaftar', ['filter' => 'auth']);
$routes->get('/verifikator/laporan', 'Verifikator::laporan', ['filter' => 'auth']);

// siswa

$routes->get('/siswa/dashboard/(:any)', 'Siswa::dashboard/$1', ['filter' => 'authUser']);
$routes->get('/siswa/pointerSiswa/(:any)', 'Siswa::pointerSiswa/$1', ['filter' => 'authUser']);
$routes->get('/siswa/formulir', 'Siswa::formulir', ['filter' => 'authUser']);
$routes->get('/siswa/check-form-payment/(:any)', 'Siswa::checkFormulirPayment/$1', ['filter' => 'authUser']);
$routes->get('/siswa/check-rereg-payment/(:any)', 'Siswa::checkReregPayment/$1', ['filter' => 'authUser']);
$routes->get('/siswa/resend-invoice/(:any)', 'Siswa::resendInvoice/$1', ['filter' => 'authUser']);
$routes->get('/siswa/resend-rereg-invoice/(:any)', 'Siswa::resendReregInvoice/$1', ['filter' => 'authUser']);
$routes->get('/siswa/pengumuman', 'Siswa::pengumuman', ['filter' => 'authUser']);
$routes->get('/siswa/daftar-ulang', 'Siswa::daftarUlang', ['filter' => 'authUser']);



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
