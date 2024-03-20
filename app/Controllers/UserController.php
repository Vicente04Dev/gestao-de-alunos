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

        $rules = [
                'usuario' => 'required',
                'nome' => 'required',
                'senha' => 'required',
                'confirma_senha' => 'required|matches[senha]',
                'papel' => 'required'
            ];

        $messages = [
                'usuario'=> [
                    'required' => 'O nome de usuário é obrigatório!',
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
                ]
            ];

        if(!$this->validateData($data, $rules, $messages)){
            return $this->index();
            
        }
        
        $post = $this->validator->getValidated();

        $user = new UserModel();
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
                'email' => 'required|valid_email',
                'senha' => 'required',
            ],
            [
                'email'=> [
                    'required' => 'O email é obrigatório!',
                    'valid_email' => 'digite um email válido!',
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
       $email = $this->request->getPost('email');
       $senha = $this->request->getPost('senha');

       $userFound = $user->select('nome, email, senha')->where(['email' => $email, 'senha'=> $senha])->first();
        
       if(!$userFound){
           return redirect()->route('login')->with("erro_login", "Email ou senha incorrecto");
        }
        
        session()->set('user', $userFound);
        unset($userFound['senha']);

        return redirect()->route('admin');
        
    }
    
    public function destroy(){
        session()->destroy();
        return redirect()->route('login');
    }
}
