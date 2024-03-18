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

//Redirecionamentos
$routes->addRedirect('/', 'admin');

//Protected Routes
$routes->get('admin', 'Home::admin', ['filter' => 'auth']);

//Users Routes
$routes->get('users', 'UserController::index', ['filter' => 'auth']);

//Alunos Routes
$routes->get('alunos', 'AlunosController::novo', ['filter' => 'auth']);
$routes->get('aluno/apagar/(:num)', 'AlunosController::delete/$1', ['filter' => 'auth']);
$routes->get('lista_alunos', 'AlunosController::listar', ['filter' => 'auth']);
$routes->get('editar_aluno/(:num)', 'AlunosController::editar/$1', ['filter' => 'auth']);

$routes->post('cadastro_alunos', 'AlunosController::create');

//Professores Routes
$routes->get('professores', 'ProfessoresController::index', ['filter' => 'auth']);

//Encarregados Routes
$routes->get('encarregados', 'EncarregadosController::index', ['filter' => 'auth']);

//ROTAS DE CADASTRO

