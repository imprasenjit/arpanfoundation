<?php


namespace App\Controllers;



class Registration extends BaseController
{

    public function index()
    {

        return view('requires/header') . view('registration') . view('requires/footer');
    }
}
