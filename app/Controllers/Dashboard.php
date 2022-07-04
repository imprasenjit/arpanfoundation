<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->route('login');
        }
        $session = \Config\Services::session();
        $data = [
            "firstName" => $session->firstname,
            "lastName" => $session->lastname
        ];
        return view('admin/requires/header') . view('admin/requires/sidebar', $data) . view('admin/dashboard') . view('admin/requires/footer');
    }

    public function profile()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->route('login');
        }
        $session = \Config\Services::session();
        $data = [
            "firstName" => $session->firstname,
            "lastName" => $session->lastname,
            "email" => $session->email
        ];
        return view('admin/requires/header') . view('admin/requires/sidebar', $data) . view('admin/profile', $data) . view('admin/requires/footer');
    }
}
