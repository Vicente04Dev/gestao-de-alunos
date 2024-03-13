<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfessoresController extends BaseController
{
    public function index()
    {
        //
        $data['pageTitle'] = 'Gerenciamento de professores';
        return view('pages/professores', $data);
    }
}
