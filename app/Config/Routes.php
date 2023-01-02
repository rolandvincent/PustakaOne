<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/search', 'Home::cari');
$routes->get('/detail', 'Home::detail');
$routes->get('/login', 'Auth::index');
$routes->post('/auth/check', 'Auth::check');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/admin', 'Admin::index', ['filter' => 'admin']);
$routes->post('/admin/save', 'Admin::save', ['filter' => 'auth']);
$routes->post('/admin/add', 'Admin::add', ['filter' => 'admin']);
$routes->get('/admin/delete', 'Admin::delete', ['filter' => 'admin']);
$routes->get('/admin/delete/buku/(:num)', 'Admin::hapus_buku/$1', ['filter' => 'admin']);
$routes->get('/admin/kelola-member', 'Admin::kelolaMember', ['filter' => 'admin']);
$routes->get('/admin/kelola-pustakawan', 'Admin::kelolaPustakawan', ['filter' => 'admin']);
$routes->get('/admin/kelola-buku', 'Admin::kelolaBuku', ['filter' => 'admin']);
$routes->get('/admin/detail_user/([\w\d\-]+)', 'Admin::user_detail/$1', ['filter' => 'admin']);
$routes->get('/admin/edit_user', 'Admin::user_edit', ['filter' => 'admin']);
$routes->get('/admin/edit/buku/(:num)', 'Admin::edit_buku/$1', ['filter' => 'admin']);
$routes->post('/admin/edit/buku', 'Admin::edit_buku_apply', ['filter' => 'admin']);
$routes->get('/admin/change/membership/(:any)', 'Admin::changeMembership/$1', ['filter' => 'admin']);
$routes->post('/admin/change/membership', 'Admin::changeMembership_apply', ['filter' => 'admin']);
$routes->get('/admin/add_user', 'Admin::user_add', ['filter' => 'admin']);
$routes->get('/admin/add/buku', 'Admin::buku_add', ['filter' => 'admin']);
$routes->post('/admin/add/buku', 'Admin::buku_add_apply', ['filter' => 'admin']);
$routes->get('/admin/detail/buku/(:num)', 'Admin::detail_buku/$1', ['filter' => 'admin']);
$routes->get('/member', 'Member::index', ['filter' => 'auth']);
$routes->get('/member/profil/view', 'Member::view_profile', ['filter' => 'auth']);
$routes->get('/profil/edit', 'Member::edit_profile', ['filter' => 'auth']);
$routes->get('/profil/edit-password', 'Member::change_password', ['filter' => 'auth']);
$routes->post('/profil/edit-password', 'Member::apply_password', ['filter' => 'auth']);
$routes->get('/logout', 'Auth::logout');

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
