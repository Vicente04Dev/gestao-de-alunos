<?php

use App\Controllers\UserController;
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
$routes->addRedirect('/', 'admin');

//admin routes
//Protected Routes
$routes->get('admin', 'Home::admin', ['filter' => 'auth']);

//Users Routes
$routes->get('users', 'UserController::index', ['as' => 'admin.users']);

//Alunos Routes
$routes->get('alunos', 'AlunosController::index', ['as' => 'admin.alunos']);

//Professores Routes
$routes->get('professores', 'ProfessoresController::index', ['as' => 'admin.professores']);

//Encarregados Routes
$routes->get('encarregados', 'EncarregadosController::index', ['as' => 'admin.encarregados']);
/*
$routes->group('admin',  ['filter' => 'auth'], static function($routes){


});
*/

