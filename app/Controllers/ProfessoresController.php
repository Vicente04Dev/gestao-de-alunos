<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfessoresModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProfessoresController extends BaseController
{
    public function index()
    {
        //
        $usuariosModel = new UserModel();
        $data = [
            'pageTitle' => 'Cadastrando professor',
            'usuarios' => $usuariosModel->select('id, nome')->findAll()
        ];
        return view('pages/professores/cadastrar', $data);
    }

    public function delete($id){

        $model = new ProfessoresModel();

        $model->delete($id);

        return redirect()->to(base_url('professores_lista'));
    }
    public function listar(){

        $model = new ProfessoresModel();

        $data = [
            'pageTitle' => 'Lista dos professores',
            'datas' => $model->paginate(10),
            'pager' => $model->pager
        ];

        return view('pages/professores/lista', $data);
    }
    public function create(){

        $data = $this->request->getPost(['nome', 'data_nascimento', 'nivel', 'telefone', 'localizacao', 'obs', 'usuario']);

        $rules = [
            'nome' => 'required|max_length[255]',
            'data_nascimento' => 'required',
            'nivel' => 'required',
            'telefone' => 'required',
            'localizacao' => 'required',
            'obs' => 'max_length[500]',
            'usuario' => 'required'
        ];

        $message = [
            'nome' => [
                'required' => 'o nome do professor é obrigatório',
                'max_length' => 'o tamnho máximo são 255 letras',
            ],
            'usuario' => [
                'required' => 'escolha o usuário do professor'
            ],
            'data_nascimento' => [
                'required' => 'selecione uma data de nascimento.'
            ],
            'obs' => [
                'max_length' => 'o conteúdo excedeu o limite de 500 letras.'
            ],
            'nivel' => [
                'required' => 'digite o nível acadêmico do professor.'
            ],
            'localizacao' => [
                'required' => 'digite a localização do professor'
            ],
            'telefone' => [
                'required' => 'digite o nº de telefone do professor.'
            ],
        ];

        if(!$this->validateData($data, $rules, $message)){
            return $this->index();
        }

        $post = $this->validator->getValidated();
        $model = new ProfessoresModel();

        $model->insert([
            'nome' => $post['nome'],
            'data_nascimento' => $post['data_nascimento'],
            'nivel_academico' => $post['nivel'],
            'localizacao' => $post['localizacao'],
            'telefone' => $post['telefone'],
            'obs' => $post['obs'],
            'user_id' => $post['usuario'],
        ]);

        return redirect()->to(base_url('professores'))
            ->with('type', 'cadastro_professor')
            ->with('status', 'Cadastro com sucesso')
            ->with('status_text', 'Professor cadastrado com sucesso')
            ->with('status_icon', 'success')
            ->with('status_button', 'OK');

    }
}
