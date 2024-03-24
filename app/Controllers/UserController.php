<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{

    public function index(){
        $data['pageTitle'] = 'Gerenciamento de usuários';
        return view('pages/users/cadastrar', $data);
    }
    public function create()
    {
        //
        $data = $this->request->getPost(['nome', 'usuario', 'senha', 'confirma_senha', 'papel']);
        $user = new UserModel();

        $rules = [
            'usuario' => 'required|is_unique[users.usuario]',
        'nome' => 'required',
        'senha' => 'required',
        'confirma_senha' => 'required|matches[senha]',
        'papel' => 'required'
        ];

        $message = [
            'usuario'=> [
                'required' => 'O nome de usuário é obrigatório!',
                'is_unique' => 'Esse nome de usuário já esta sendo usado. Escolha outro.'
            ],
            'senha'=> [
                'required' => 'A senha é obrigatória!'
            ],
            'nome'=> [
                'required' => 'Seu nome é obrigatório!'
            ],
            'confirma_senha' =>[
                'required' => 'Confirme a senha',
                'matches' => 'As senhas não coincidem.'
            ],
        ];

        if(!$this->validateData($data, $rules, $message)){
            return $this->index();
            
        }
        
        $post = $this->validator->getValidated();

        $user->insert([
            'nome' => $post['nome'],
            'usuario' => str_replace(' ', '-', trim(mb_strtolower($post['usuario']))),
            'senha' => $post['senha'],
            'papel' => $post['papel'],
        ]);
        
        return redirect()->route('admin');
        
    }

    public function listar(){

        $model = new UserModel();

        $data = [
            'pageTitle' => 'Lista de usuários',
            'datas' => $model->paginate(10),
            'pager' => $model->pager
        ];

        return view('pages/users/lista', $data);
    }

    public function delete($id){
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to(base_url('lista_users'));
    }
    public function login(): string
    {
        helper('form');
        return view('pages/auth/login');
    }
    public function register(): string
    {
        helper('form');
        return view('pages/auth/register');
    }
    public function loginStore()
    {
        helper('form');
        $validated = $this->validate(
            [
                'usuario' => 'required',
                'senha' => 'required',
            ],
            [
                'usuario'=> [
                    'required' => 'Digite seu nome de usuário!',
                ],
                'senha'=> [
                    'required' => 'A senha é obrigatória!'
                ]
            ]
            );
            
        if(!$validated){
            return redirect()->route('login')->with('erros', $this->validator->getErrors());
        }

        $user = new UserModel();
       // $inserted = $user->insert($this->request->getPost());
       $usuario = $this->request->getPost('usuario');
       $senha = $this->request->getPost('senha');

       $userFound = $user->select('nome, usuario, senha')->where(['usuario' => $usuario, 'senha'=> $senha])->first();
        
       if(!$userFound){
           return redirect()->route('login')->with("erro_login", "Usuário ou senha incorrecto");
        }
        
        session()->set('user', $userFound);
        unset($userFound->senha);

        return redirect()->route('admin');
        
    }
    
    public function destroy(){
        session()->destroy();
        return redirect()->route('login');
    }
}
