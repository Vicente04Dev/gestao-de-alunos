<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{

    public function index(){
        $data['pageTitle'] = 'Gerenciamento de usuários';
        return view('pages/users', $data);
    }
    public function store()
    {
        //
        $validated = $this->validate(
            [
                'email' => 'required|valid_email|is_unique[users.email]',
                'nome' => 'required',
                'senha' => 'required',
            ],
            [
                'email'=> [
                    'required' => 'O email é obrigatório!',
                    'valid_email' => 'digite um email válido!',
                    'is_unique' => 'Esse endereço de email já está sendo usado'
                ],
                'senha'=> [
                    'required' => 'A senha é obrigatória!'
                ],
                'nome'=> [
                    'required' => 'Seu nome é obrigatório!'
                ]
            ]
            );

        if(!$validated){
            return redirect()->route('register')->with('erros', $this->validator->getErrors());
        }
        
        $user = new UserModel();
        $inserted = $user->insert($this->request->getPost());
        
        if($inserted){
            return redirect()->route('admin');
        }else{
            return redirect()->route('register')->with('erro_cadastro', 'Ocorreu um erro ao se cadastrar');
        }
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
