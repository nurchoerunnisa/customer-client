<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/customer', 'Customer::index');
$routes->post('/customer/tambah', 'Customer::sendData');
$routes->get('/customer/edit/(:num)', 'Customer::edit/$1');
$routes->post('/customer/update', 'Customer::editpesananmobil');
$routes->get('/customer/hapus/(:num)', 'Customer::hapus/$1');