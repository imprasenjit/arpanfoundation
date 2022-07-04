<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use CodeIgniter\Config\Services;

class Admin extends BaseController
{

    public function index()
    {
        $session = \Config\Services::session();
        echo  $session->get('firstname');
        return view('requires/header') . view('admin/admin') . view('requires/footer');
    }
}
