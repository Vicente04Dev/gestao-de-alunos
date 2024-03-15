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
$routes->get('users', 'UserController::index', ['filter' => 'auth']);

//Alunos Routes
$routes->get('alunos', 'AlunosController::index', ['filter' => 'auth']);

//Professores Routes
$routes->get('professores', 'ProfessoresController::index', ['filter' => 'auth']);

//Encarregados Routes
$routes->get('encarregados', 'EncarregadosController::index', ['filter' => 'auth']);

//ROTAS DE CADASTRO
$routes->post('alunos/cadastro', 'AlunosController::create');

