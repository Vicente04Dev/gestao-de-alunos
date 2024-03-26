<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunosModel;
use App\Models\DisciplinasModel;
use App\Models\NotasModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class NotasController extends BaseController
{
    public function index()
    {
        //
        $time = new Time();
        $ano_passado = new Time('-1 year');

        $disciplinasModel = new DisciplinasModel();
        $alunosModel = new AlunosModel();
        
        $data = [
            'pageTitle' => "Cadastro de notas",
            'ano_actual' => $time->getYear(),
            'ano_passado' => $ano_passado->getYear(),
            'disciplinas' => $disciplinasModel->findAll(),
            'alunos'      => $alunosModel->select('id, nome')->findAll()
        ];

        return view('pages/notas/cadastrar', $data);
    }

    public function create(){
        $notasModel = new NotasModel();

        $data = $this->request->getPost(['aluno_id', 'disciplina_id', 'trimestre', 'ano_lectivo', 'mac', 'npp', 'npt', 'mt']);

        $rules = [
            'aluno_id' => 'required',
            'disciplina_id' => 'required',
            'trimestre' => 'required',
            'ano_lectivo' => 'required',
            'mac' => 'required',
            'npp' => 'required',
            'npt' => 'required',
            'mt' => 'required',
        ];

        $messages = [
            'aluno_id' => [
                'required' => 'O nome do aluno é obrigatório.'
            ],
            'disciplina_id' => [
                'required' => 'Selecione a disciplina.'
            ],
            'trimestre' => [
                'required' => 'Selecione o trimestre.'
            ],
            'ano_lectivo' => [
                'required' => 'Escolha o ano lectivo.'
            ],
            'mac' => [
                'required' => 'Digite o MAC'
            ],
            'npp' => [
                'required' => 'Digite a NPP.'
            ],
            'npt' => [
                'required' => 'Digite a NPT'
            ],
            'mt' => [
                'required' => 'Calcule a média do trimestre.'
            ],
        ];

        if(! $this->validateData($data, $rules, $messages)){
            return $this->index();
        }

        $validaDatas = $this->validator->getValidated();

        $notasModel->insert($validaDatas);

        return redirect()->to(base_url('notas_alunos'))
            ->with('type', 'cadastro_notas')
            ->with('status', 'cadastro com sucesso')
            ->with('status_text', 'Notas cadastradas com sucesso')
            ->with('status_icon', 'success')
            ->with('status_button', 'OK');
    }
}
