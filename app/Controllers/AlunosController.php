<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunosModel;
use CodeIgniter\HTTP\ResponseInterface;

class AlunosController extends BaseController
{
    public function novo()
    {
        //
        $data['pageTitle'] = 'Cadastrando aluno';
        return view('pages/alunos/cadastrar', $data);
    }

    public function listar(){

        $model = model('AlunosModel');

        $data = ['title' => 'Lista de alunos', 'datas' => $model->findAll()];
        return view('pages/alunos/lista', $data);
    }
    public function delete($id = null){

        $model = new AlunosModel();

        $model->delete($id);

        $data = [
            'title' => "Dados removidos",
            'text' => "Os dados foram removidos com sucesso!!",
            'icon' => "success"
        ];

        return $this->response->setJSON($data);
    }

    public function create(){

        //Retorna o valor da imagem do campo do tipo FILE
        $file = $this->request->getFile('imagem');

        //Verifica se a imagem é um arquivo válido e se já não foi movida
        if($file->isValid() AND !$file->hasMoved()){

            $fileName = $file->getRandomName(); //Nome aleatório para a imagem
            $file->move('uploads/imagens_alunos/', $fileName);
        }

        $data = $this->request->getPost(['nome', 'turno', 'curso', 'classe', 'telefone','data_nascimento', 'sala', 'localizacao', 'obs']);

        $rules = [
            'nome' => 'required|max_length[255]',
            'turno' => 'required',
            'curso' => 'required',
            'classe' => 'required',
            'data_nascimento' => 'required',
            'obs' => 'min_length[8]',
            'sala' => 'required',
            'localizacao' => 'required',
            'telefone' => 'is_unique[alunos.telefone]',
        ];

        $message = [
            'nome' => [
                'required' => 'o nome do aluno é obrigatório',
                'max_length' => 'o tamnho máximo são 255 letras',
            ],
            'turno' => [
                'required' => 'escolha o turno'
            ],
            'curso' => [
                'required' => 'escolha o curso'
            ],
            'data_nascimento' => [
                'required' => 'selecione uma data de nascimento do aluno'
            ],
            'obs' => [
                'min_length' => 'o conteúdo deve ter no mínimo 8 letras'
            ],
            'classe' => [
                'required' => 'selecione a classe do aluno'
            ],
            'sala' => [
                'required' => 'digite a sala do aluno'
            ],
            'localizacao' => [
                'required' => 'digite a localização do aluno'
            ],
            'telefone' => [
                'is_unique' => 'já existe um aluno com esse número de telefone'
            ],
        ];

        if(!$this->validateData($data, $rules, $message)){
            return $this->novo();
        }

        $post = $this->validator->getValidated();
        $model = model('AlunosModel');

        $model->insert([
            'nome' => $post['nome'],
            'data_nascimento' => $post['data_nascimento'],
            'classe' => $post['classe'],
            'turno' => $post['turno'],
            'sala' => $post['sala'],
            'curso' => $post['curso'],
            'localizacao' => $post['localizacao'],
            'imagem' => $fileName,
            'telefone' => $post['telefone'],
            'obs' => $post['obs'],
            ]
        );

        $mensagem = ['title' => 'cadastro com sucesso', 'content' => 'Aluno cadastrado com sucesso'];
        return redirect()->to(base_url('alunos'))
            ->with('status', 'cadastro com sucesso')
            ->with('status_text', 'Aluno cadastrado com sucesso')
            ->with('status_icon', 'success')
            ->with('status_button', 'OK');

    }

    public function editar($id){
        
        $model = model('AlunosModel');

        $data = [
            'data' => $model->edict($id),
            'pageTitle' => "Editar dados do aluno"
        ];
        
        return view('pages/alunos/editar', $data);
    }
}
