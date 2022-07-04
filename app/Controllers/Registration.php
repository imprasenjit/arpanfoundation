<?php


namespace App\Controllers;

use CodeIgniter\Controller;

use CodeIgniter\Config\Services;

class Registration extends BaseController
{

    public function index()
    {

        return view('requires/header') . view('registration') . view('requires/footer');
    }

    public function create()
    {
        helper(['form', 'url']);
        $registrationModel = model('App\Models\RegistrationModel');
        $request = \Config\Services::request();
        $rules = [
            'Email' => "required|valid_email",
            'Password' => "required",
            'ConfirmPassword' => "required",
            'FirstName' => 'required',
            'LastName' => 'required',
        ];
        if (!$this->validate($rules)) {
            $error = [
                'errors' => $this->validator->getErrors(),
            ];
            return view('requires/header') . view('registration', $error) . view('requires/footer');
        } else {
            $data = $request->getPost();

            $insertData = array(
                'firstname' => $data['FirstName'],
                'lastname' => $data['LastName'],
                'email' => $data['Email'],
                'password' => password_hash($data['Password'], PASSWORD_DEFAULT) // password_hash("admin",PASSWORD_DEFAULT)
            );
            $registrationModel->insert($insertData);

            return view('registration_success', ["form_date" => $data]);
        }
        // print_r($request->getPost());
    }
}
