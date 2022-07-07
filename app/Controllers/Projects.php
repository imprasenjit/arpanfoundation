<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use CodeIgniter\Config\Services;

class Projects extends BaseController
{

    public function index()
    {
    }

    public function add()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->route('login');
        }
        $session = \Config\Services::session();
        $data = [
            "firstName" => $session->firstname,
            "lastName" => $session->lastname
        ];
        return view('admin/requires/header') . view('admin/requires/sidebar', $data) . view('admin/projects/projects_entry') . view('admin/requires/footer');
    }
    public function save()
    {
    }
}
