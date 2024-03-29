<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunosModel;
use App\Models\EncarregadosModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class AlunosController extends BaseController
{
    public function novo()
    {
        //
        $encarregadosModel = new EncarregadosModel();

        $data = [
            'pageTitle' => 'Cadastrando aluno',
            'encarregados' => $encarregadosModel->select('id, nome')->findAll()
        ];

        return view('pages/alunos/cadastrar', $data);
    }

    public function listar(){

        $model = model('AlunosModel');

        //Using Join

        $model->select('alunos.id as id, alunos.nome as nome, alunos.classe as classe, alunos.turno as turno, alunos.telefone as telefone, alunos.sala as sala, e.nome as encarregado');

        $model->join('encarregados as e', 'alunos.encarregado_id = e.id', 'left');

        //End join
    
        $data = ['title' => 'Lista de alunos', 'datas' => $model->paginate(10), 'pager' => $model->pager];
        return view('pages/alunos/lista', $data);
    }
    public function delete($id = null){

        $model = new AlunosModel();

        try {

            $model->delete($id);
            
        } catch (DatabaseException $th) {
            //throw $th;
            return redirect()->to(base_url('lista_alunos'))
            ->with('type', 'falha_exclusao_aluno')
            ->with('status', 'Impossível excluir')
            ->with('status_text', 'O aluno que deseja excluir está associado a um encarregado de educação. Remova primeira a associação com o encarregado e volta a excluir.')
            ->with('status_icon', 'error')
            ->with('status_button', 'OK');
        }

        

        return redirect()->to(base_url('lista_alunos'))
            ->with('type', 'exclusao_aluno')
            ->with('status', 'Excluído com sucesso')
            ->with('status_text', 'Aluno excluído com sucesso.')
            ->with('status_icon', 'success')
            ->with('status_button', 'OK');
    }

    public function create(){

        //Retorna o valor da imagem do campo do tipo FILE
        $file = $this->request->getFile('imagem');

        //Verifica se a imagem é um arquivo válido e se já não foi movida
        /*
        if($file->isValid() AND !$file->hasMoved()){

            $fileName = $file->getRandomName(); //Nome aleatório para a imagem
            $file->move('uploads/imagens_alunos/', $fileName);
        }
        */
        $data = $this->request->getPost(['nome', 'turno', 'curso', 'classe', 'telefone','data_nascimento', 'encarregado', 'sala', 'localizacao', 'obs']);

        $rules = [
            'nome' => 'required|max_length[255]',
            'turno' => 'required',
            'curso' => 'required',
            'classe' => 'required',
            'data_nascimento' => 'required',
            'obs' => 'max_length[500]',
            'sala' => 'required',
            'localizacao' => 'required',
            'telefone' => 'max_length[20]',
            'encarregado' => 'required'
        ];

        $message = [
            'nome' => [
                'required' => 'o nome do aluno é obrigatório',
                'max_length' => 'o tamnho máximo são 255 letras',
            ],
            'encarregado' => [
                'required' => 'escolha um encarregado'
            ],
            'turno' => [
                'required' => 'escolha o turno'
            ],
            'curso' => [
                'required' => 'escolha o curso'
            ],
            'data_nascimento' => [
                'required' => 'selecione uma data de nascimento do aluno.'
            ],
            'obs' => [
                'max_length' => 'o conteúdo excedeu o limite de 500 letras.'
            ],
            'classe' => [
                'required' => 'selecione a classe do aluno.'
            ],
            'sala' => [
                'required' => 'digite a sala do aluno'
            ],
            'localizacao' => [
                'required' => 'digite a localização do aluno'
            ],
            'telefone' => [
                'max_length' => 'o número de telfone está num formato inválido!'
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
            'telefone' => $post['telefone'],
            'encarregado_id' => $post['encarregado'],
            'obs' => $post['obs'],
            ]
        );

        return redirect()->to(base_url('alunos'))
            ->with('type', 'cadastro_aluno')
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

    private function getStudants_Parents(){

        $db = db_connect();

        $builder = $db->table('alunos as a');

        $builder->select('a.id as id, a.nome as nome, a.classe as classe, a.turno as turno, a.telefone as telefone, a.sala as sala, e.nome as encarregado');

        $builder->join('encarregados as e', 'a.encarregado_id = e.id', 'left');

        $result = $builder->get()->getResultObject();

        return $result;
    }
}
