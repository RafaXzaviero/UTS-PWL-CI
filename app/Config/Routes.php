<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'DashboardController::index');
$routes->get('/main', 'DashboardController::index');

$routes->match(['get', 'post'], '/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

// Route dashboard berdasarkan role dengan filter auth dan role check
$routes->get('/admin', 'DashboardController::admin', ['filter' => 'auth:admin']);
$routes->get('/user', 'DashboardController::user', ['filter' => 'auth:user']);


$routes->get('produk', 'ProdukController::index', ['filter' => 'auth']);

$routes->post('transaksi/tambah-ke-keranjang', 'TransaksiController::tambahKeKeranjang');

$routes->get('keranjang', 'TransaksiController::keranjang');
$routes->post('transaksi/update-keranjang', 'TransaksiController::updateKeranjang');
$routes->get('keranjang/count', 'TransaksiController::jumlahItemKeranjang');
$routes->post('transaksi/hapus-item', 'TransaksiController::hapusItem');

//kategori
$routes->get('kategori', 'CateController::index');
$routes->get('kategori/(:segment)', 'CateController::show/$1');









