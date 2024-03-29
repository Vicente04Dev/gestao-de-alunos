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
$routes->get('lista_users', 'UserController::listar', ['filter' => 'auth']);
$routes->get('apagar_user/(:num)', 'UserController::delete/$1', ['filter' => 'auth']);
$routes->post('cadastro_users', 'UserController::create', ['filter' => 'auth']);

//Alunos Routes
$routes->get('alunos', 'AlunosController::novo', ['filter' => 'auth']);
$routes->get('aluno/apagar/(:num)', 'AlunosController::delete/$1', ['filter' => 'auth']);
$routes->get('lista_alunos', 'AlunosController::listar', ['filter' => 'auth']);
$routes->get('aluno_editar/(:num)', 'AlunosController::editar/$1', ['filter' => 'auth']);
$routes->post('cadastro_alunos', 'AlunosController::create');

//Notas Routes
$routes->get('notas_alunos', 'NotasController::index', ['filter' => 'auth']);
$routes->post('cadastro_notas', 'NotasController::create', ['filter' => 'auth']);


//Professores Routes
$routes->get('professores', 'ProfessoresController::index', ['filter' => 'auth']);
$routes->get('professores_lista', 'ProfessoresController::listar', ['filter' => 'auth']);
$routes->get('apagar_professor/(:num)', 'ProfessoresController::delete/$1', ['filter' => 'auth']);
$routes->post('cadastro_professor', 'ProfessoresController::create', ['filter' => 'auth']);

//Encarregados Routes
$routes->get('encarregados', 'EncarregadosController::novo', ['filter' => 'auth']);
$routes->get('lista_encarregados', 'EncarregadosController::listar', ['filter' => 'auth']);
$routes->get('editar_encarregado/(:num)', 'EncarregadosController::editar/$1', ['filter' => 'auth']);
$routes->get('apagar_encarregado/(:num)', 'EncarregadosController::delete/$1', ['filter' => 'auth']);
$routes->post('cadastro_encarregado', 'EncarregadosController::create', ['filter' => 'auth']);

//ROTAS DE CADASTRO

