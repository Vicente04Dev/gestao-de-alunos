<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AlunosController extends BaseController
{
    public function index()
    {
        //
        $data['pageTitle'] = 'Gerenciamento de alunos';
        return view('pages/alunos', $data);
    }
}
