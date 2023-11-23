<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//view
$routes->get('/', 'FrontEnd::home');
$routes->get('/produk/home', 'Produk::home');
$routes->get('/produk/pemesanan', 'Pemesanan::home');
$routes->get('/produk/tambah', 'Produk::tambah');
$routes->get('/keranjang', 'Keranjang::home');
//proses
$routes->post('/produk/save', 'Produk::save');
$routes->delete('/keranjang/hapus/(:num)', 'Keranjang::hapus/$1');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');
$routes->get('/produk/edit/(:segment)', 'Produk::edit/$1');
$routes->post('/produk/update/(:num)', 'Produk::update/$1');
$routes->post('/frontend/byid', 'FrontEnd::getProdukById');
$routes->post('/keranjang/edit', 'Keranjang::edit');
$routes->post('/keranjang/update', 'Keranjang::update');
$routes->post('/produk/keranjang', 'FrontEnd::keranjang');
$routes->post('/produk/checkout', 'Checkout::checkout');
