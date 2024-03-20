<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EncarregadosModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;

class EncarregadosController extends BaseController
{
    public function novo()
    {
        //
        $data['pageTitle'] = 'Cadastrando encarregado';
        return view('pages/encarregados/cadastrar', $data);
    }

    public function delete($id){

        $model = new EncarregadosModel();

        try {

            $model->delete($id);
            return redirect()->to(base_url('lista_encarregados'))
            ->with('type', 'exclusao_encarregado')
            ->with('status', 'Excluído com sucesso')
            ->with('status_text', 'O encarregado foi excluido com sucesso')
            ->with('status_icon', 'success')
            ->with('status_button', 'OK');

        } catch (DatabaseException $th) {
            //throw $th;
            return redirect()->to(base_url('lista_encarregados'))
            ->with('type', 'falha_exclusao_encarregado')
            ->with('status', 'Impossível excluir')
            ->with('status_text', 'O encarregado que deseja excluir está associado a um ou mais alunos. Remova primeira a associação com os alunos e volta a excluir.')
            ->with('status_icon', 'error')
            ->with('status_button', 'OK');
        }
    }
    public function editar($id){

        $model = new EncarregadosModel();

        $data = [
            'data' => $model->find($id),
            'pageTitle' => 'Editando dados do encarregado'
        ];

        return view('pages/encarregados/editar', $data);
    }
    public function listar(){

        $model = new EncarregadosModel();

        $data = [
            'title' => 'Lista dos encarregados',
            'datas' => $model->paginate(10),
            'pager' => $model->pager
        ];

        return view('pages/encarregados/lista', $data);
    }
    public function create(){
        
        $data = $this->request->getPost(['nome', 'data_nascimento', 'profissao', 'telefone', 'localizacao', 'obs']);

        $rules = [
            'nome' => 'required|max_length[255]',
            'data_nascimento' => 'required',
            'profissao' => 'required',
            'telefone' => 'required',
            'localizacao' => 'required',
            'obs' => 'max_length[500]'
        ];

        $message = [
            'nome' => [
                'required' => 'o nome do encarregado é obrigatório!',
                'max_length'=> 'o tamnho máximo são 255 letras.',
            ],
            'data_nascimento' => [
                'required' => 'escolha uma data de nascimento.'
            ],
            'profissao' => [
                'required' => 'digite a profissão do encarregado.'
            ],
            'telefone' => [
                'required' => 'digite o nº de telefone do encarregado.'
            ],
            'localizacao' => [
                'required' => 'digite a localização do encarregado.'
            ],
            'obs' => [
                'obs' => 'Você excedeu o limite de letras ao escrever a observação.'
            ],
        ];

        if(!$this->validateData($data, $rules, $message)){
           return $this->novo();
        }

        $validData = $this->validator->getValidated();
        $model = new EncarregadosModel();

        $model->insert([
            'nome' => $validData['nome'],
            'data_nascimento' => $validData['data_nascimento'],
            'profissao' => $validData['profissao'],
            'telefone' => $validData['telefone'],
            'localizacao' => $validData['localizacao'],
            'obs' => $validData['obs'],
        ]);

        return redirect()->to(base_url('encarregados'))
            ->with('type', 'cadastro_encarregado')
            ->with('status', 'Cadastro com sucesso')
            ->with('status_text', 'Encarregado cadastrado com sucesso')
            ->with('status_icon', 'success')
            ->with('status_button', 'OK');
    }
}
