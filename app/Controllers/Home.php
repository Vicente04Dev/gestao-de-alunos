<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['pageTitle'] = "Casa";
        return view('home', $data);
    }
    public function profile(): string
    {
        $data['pageTitle'] = "Perfil";
        return view('pages/profile', $data);
    }
}
