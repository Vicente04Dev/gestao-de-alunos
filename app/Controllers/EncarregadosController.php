<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EncarregadosController extends BaseController
{
    public function index()
    {
        //
        $data['pageTitle'] = 'Gerenciamento de Encarregados de educação';
        return view('pages/encarregados', $data);
    }
}
