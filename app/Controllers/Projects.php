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
        helper(['form', 'url']);
        $projectModel = model('App\Models\admin\projects');
        $request = \Config\Services::request();
        $rules = [
            'project_title' => "required",
            'project_type' => "required",
            'sponsered_body' => "required",
            'project_state' => 'required',
            'project_district' => 'required',
            'location' => 'required',
            'session' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'about_the_project' => 'required',
            
        ];
        if (!$this->validate($rules)) {
            $error = [
                'errors' => $this->validator->getErrors(),
            ];
            return view('requires/header') . view('registration', $error) . view('requires/footer');
        } else {
            $data = $request->getPost();

            $insertData = array(
                'project_title' => $data['project_title'],
                'project_type' => $data['project_type'],
                'sponsered_body' => $data['sponsered_body'],
                'project_state' => $data['project_state'],
                'project_district' => $data['project_district'],
                'location' => $data['location'],
                'session' => $data['session'],
                'status' => $data['status'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'about_project' => $data['about_the_project'],                
            
            );
            $projectsModel->insert($insertData);

            return view('data_inserted_successfully', ["form_data" => $data]);
        }
        // print_r($request->getPost());
    }
}
