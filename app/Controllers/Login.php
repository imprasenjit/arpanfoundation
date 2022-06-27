<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {

        return view('requires/header') . view('login') . view('requires/footer');
    }
}
