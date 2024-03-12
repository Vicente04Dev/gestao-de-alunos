<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->get('/', 'Home::index');

//service('auth')->routes($routes);

//Auth routes
$routes->get('/login', 'UserController::login');
$routes->get('/register', 'UserController::register');
$routes->get('/logout', 'UserController::destroy');

$routes->post('/register', 'UserController::store');
$routes->post('/login', 'UserController::loginStore');

$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('profile', 'Home::profile', ['filter' => 'auth']);
;

