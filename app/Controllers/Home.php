<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['pageTitle'] = "Casa";
        return view('home', $data);
    }
    public function admin(): string
    {
        $data['pageTitle'] = "Casa";
        return view('admin', $data);
    }
}
