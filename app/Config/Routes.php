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

//Protected Routes
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('profile', 'UserController::profile', ['filter' => 'auth']);

//Users Routes
$routes->get('users', 'UserController::index');

//Alunos Routes
$routes->get('alunos', 'AlunosController::index');

//Professores Routes
$routes->get('professores', 'ProfessoresController::index');

//Encarregados Routes
$routes->get('encarregados', 'EncarregadosController::index');

