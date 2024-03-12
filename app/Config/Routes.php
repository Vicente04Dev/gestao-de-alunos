<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);
$routes->get('profile', 'Home::profile');
/*

$routes->get('login', 'Home::login');
$routes->get('register', 'Home::register');
*/

