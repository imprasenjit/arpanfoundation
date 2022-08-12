<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Config\Services;

class Students extends AdminBaseController
{
    public function index()
    {
        return $this->layout('students/students_list');
    }
    public function add()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->route('login');
        }
       
        $data = [           
            'session' => '',
            'project_title' => '',
            'center' => '',
            'student_name' => '',
            'village' => '',
            'landmark' => '',
            'district' => '',
            'state' => '',
            'pincode' => '',
            'dob' => '',
            'gender' => '',
            'caste' => '',
            'religion' => '',
            'phone_no' => '',
            'email' => '',
            'father_name' => '',
            'mother_name' => '',
            'guardian_name' => '',
            'guardian_contact' => '',
            'family_income' => '',
            'hslc_board' => '',
            'hslc_div' => '',
            'hslc_yop' => '',
            'hslc_marksheet' => '',
            'hslc_certificate' => '',
            'hs_board' => '',
            'hs_div' => '',
            'hs_yop' => '',
            'hs_marksheet' => '',
            'hs_certificate' => '',
            'grad-uni' => '',
            'grad_div' => '',
            'grad_yop' => '',
            'grad_marksheet' => '',
            'grad_certificate' => '',
            'photo' => '',
            'signature' => '',
            'other_doc' => '',
            'pan_no' => '',

        ];
        return $this->layout('students/students_entry', ["action" => "students/save", "students_data" => (object)$data, "submit_button" => "Add"]);
        
    }
    public function save()
    {
        helper(['form', 'url']);
        $projectModel = model('App\Models\admin\studentsModel');
        $request = \Config\Services::request();
        // $session = \Config\Services::session();
        $data = $request->getPost();
        $rules = [
            'session' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Session is required',
                ]
            ],
            'project_title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project title is required',
                ]
            ],
            'center' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Center is required',
                ]
            ],
            'student_name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Student name is required',
                ]
            ],
            'village' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project state is required',
                ]
            ],
            'landmark' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project location is required',
                ]
            ],
            'district' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project session is required',
                ]
            ],
            'state' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'pincode' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'dob' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'gender' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'caste' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'religion' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'phone_no' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'father_name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'mother_name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'guardian_name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'guardian_contact' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'family_income' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hslc_board' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hslc_div' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hslc_yop' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hslc_marksheet' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hslc_certificate' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hs_board' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hs_div' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hs_yop' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hs_marksheet' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'hs_certificate' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'grad_uni' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'grad_div' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'grad_yop' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'grad_marksheet' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'grad_certificate' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'photo' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'signature' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'other_doc' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'pan_no' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            
        ];
        if (!$this->validate($rules)) {
            return $this->layout('students/students_entry', ["action" => "students/save", "students_data" => (object)$data, 'errors' => $this->validator->getErrors(), "submit_button" => "Add"]);
        } else {

            $insertData = array(               
                'session' => $data['session'],
                'project_title' => $data['project_title'],
                'center' => $data['center'],
                'student_name' => $data['student_name'],
                'village' => $data['village'],
                'landmark' => $data['landmark'],
                'district' => $data['district'],
                'state' => $data['state'],
                'pincode' => $data['pincode'],
                'dob' => $data['dob'],
                'gender' => $data['gender'],
                'caste' => $data['caste'],
                'religion' => $data['religion'],
                'phone_no' => $data['phone_no'],
                'email' => $data['email'],
                'father_name' => $data['father_name'],
                'mother_name' => $data['mother_name'],
                'guardian_name' => $data['guardian_name'],
                'guardian_contact' => $data['guardian_contact'],
                'family_income' => $data['family_income'],
                'hslc_board' => $data['hslc_board'],
                'hslc_div' => $data['hslc_div'],
                'hslc_yop' => $data['hslc_yop'],
                'hslc_marksheet' => $data['hslc_marksheet'],
                'hslc_certificate' => $data['hslc_certificate'],
                'hs_board' => $data['hs_board'],
                'hs_div' => $data['hs_div'],
                'hs_yop' => $data['hs_yop'],
                'hs_marksheet' => $data['hs_marksheet'],
                'hs_certificate' => $data['hs_certificate'],
                'grad-uni' => $data['uni'],
                'grad_div' => $data['grad_div'],
                'grad_yop' => $data['grad_yop'],
                'grad_marksheet' => $data['grad_marksheet'],
                'grad_certificate' => $data['grad_certificate'],
                'photo' => $data['photo'],
                'signature' => $data['signature'],
                'other_doc' => $data['other_doc'],
                'pan_no' => $data['pan_no'],
            );
            $studentsModel->insert($insertData);
            return $this->layout('students/students_entry', ["message" => "Data Inserted Successfully"]);
            // return view('admin/requires/header') . view('admin/requires/sidebar', $data) . view('admin/students/students_entry', ["message" => "Data Inserted Successfully"]) . view('admin/requires/footer');
        }
        // print_r($request->getPost());
    }
    public function get_records()
    {
        $request = \Config\Services::request();
        $post = $request->getPost();
        $projectModel = model('App\Models\admin\studentsModel');
        $columns = array(
            0 => "project_id",
            1 => "project_name",
            2 => "project_type",
            3 => "sponsored_body",
            4 => "state",
            5 => "session",
        );
        $limit = $post["length"];
        $start = $post["start"];
        $order = $columns[$post["order"][0]["column"]];
        $dir = $post["order"][0]["dir"];
        $totalData = $projectModel->countAllRows();
        $totalFiltered = $totalData;
        if (empty($post["search"]["value"])) {
            $records = $projectModel->allRows($start, $limit, $order, $dir);
        } else {
            $search = $post["search"]["value"];
            $records = $projectModel->searchRows($start, $limit, $search, $order, $dir);
            $totalFiltered = $projectModel->totalSearchRows($search);
        }
        $data = array();

        if (!empty($records)) {
            foreach ($records as $rows) {
                $nestedData = array();
                if ($rows->status == 0) {
                    $action = '<a href="#!" data-id="' . $rows->project_id . '" data-toggle="tooltip" data-placement="top" title="Approve User" class="btn btn-primary approve"><span class="fa fa-check" aria-hidden="true"></span>&nbsp;Approve</a>';
                } else {
                    $action = '<a href="#!" data-id="' . $rows->project_id . '" data-toggle="tooltip" data-placement="top" title="Disapprove User" class="btn btn-danger unapprove"><span class="fa fa-times" aria-hidden="true"></span>&nbsp;Disapprove</a>';
                }
                $nestedData["project_id"] = $rows->project_id;
                $nestedData["name"] = $rows->project_title;
                $nestedData["type"] = $rows->project_type;
                $nestedData["sponsored_body"] = $rows->sponsored_body;
                // $nestedData["time"] = date('d-m-Y H:i', strtotime($rows->created_at));
                $nestedData["state"] = $rows->project_state;
                $nestedData["session"] = $rows->session;
                $nestedData["action"] = $action;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($post["draw"]),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        echo json_encode($json_data);
    }
}
