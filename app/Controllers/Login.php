<?php

namespace App\Controllers;

use CodeIgniter\Config\Services;

class Login extends BaseController
{
    public function index()
    {
        return view('requires/header') . view('login') . view('requires/footer');
    }
    public function auth()
    {
        helper(['form', 'url']);
        $loginModel = model('App\Models\LoginModel');
        $request = \Config\Services::request();
        $rules = [
            'email' => "required|valid_email",
            'password' => "required",
        ];
        if (!$this->validate($rules)) {
            $error = [
                'errors' => $this->validator->getErrors(),
            ];
            return view('requires/header') . view('login', $error) . view('requires/footer');
        } else {
            $data = $request->getPost();
            $user = $loginModel->where('email', $data['email'])->first();
            // echo '<pre>';
            // print_r($user['password']);
            // die;
            if (password_verify($data['password'], $user['password'])) {
                $session = \Config\Services::session();
                $session->set([
                    "user_id" => $user["user_id"],
                    "firstname" => $user["firstname"],
                    "lastname" => $user["lastname"],
                    "email" => $user["email"],
                    "isLoggedIn" => true
                ]);
                return redirect()->route('dashboard');
            } else {
                $error = [
                    'errors' => ["invalid credientials"]
                ];
                return view('requires/header') . view('login', $error) . view('requires/footer');
            }
        }
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->route('login');
    }
}
