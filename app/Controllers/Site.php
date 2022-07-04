<?php

namespace App\Controllers;

use App\controllers;

class Site extends BaseController
{
    public function index()
    {
        return view('site/home');
    }
}
