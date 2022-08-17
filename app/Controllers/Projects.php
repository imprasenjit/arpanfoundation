<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Config\Services;

class Projects extends AdminBaseController
{
    public function index()
    {
        return $this->layout('projects/projects_list');
    }
    public function add()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->route('login');
        }

        $data = [
            'project_title' => "",
            'project_type' => "",
            'sponsored_body' => "",
            'project_state' => '',
            'project_district' => '',
            'location' => '',
            'session' => '',
            'status' => '',
            'start_date' => '',
            'end_date' => '',
            'project_value' => '',
            'about_the_project' => '',
        ];
        return $this->layout('projects/projects_entry', ["action" => "projects/save", "project_data" => (object)$data, "submit_button" => "Add"]);
    }

    public function save()
    {
        helper(['form', 'url']);
        $projectModel = model('App\Models\admin\projectModel');
        $request = \Config\Services::request();
        // $session = \Config\Services::session();
        $data = $request->getPost();
        $rules = [

            'project_title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project title is required',
                ]
            ],
            'project_type' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project type is required',
                ]
            ],
            'sponsored_body' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Sponsored body is required',
                ]
            ],
            'project_state' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project State is required',
                ]
            ],
            'project_district' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project state is required',
                ]
            ],
            'location' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project location is required',
                ]
            ],
            'session' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project session is required',
                ]
            ],
            'status' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Project Status is required',
                ]
            ],
            'start_date' => 'required',
            'end_date' => 'required',

            'project_value' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'project value is required',
                ]
            ],
            'about_the_project' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'About project is required',
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return $this->layout('projects/projects_entry', ["action" => "projects/save", "project_data" => (object)$data, 'errors' => $this->validator->getErrors(), "submit_button" => "Add"]);
        } else {

            $insertData = array(
                'project_title' => $data['project_title'],
                'project_type' => $data['project_type'],
                'sponsered_body' => $data['sponsered_body'],
                'project_state' => $data['project_state'],
                'project_district' => $data['project_district'],
                'location' => $data['location'],
                'sponsored_body' => $data['sponsored_body'],
                'session' => $data['session'],
                'status' => $data['status'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'about_project' => $data['about_the_project'],
            );
            // $this->pre($insertData);
            $projectModel->insert($insertData);
            return redirect()->to('projects/');
            // return view('admin/requires/header') . view('admin/requires/sidebar', $data) . view('admin/projects/projects_entry', ["message" => "Data Inserted Successfully"]) . view('admin/requires/footer');
        }
        // print_r($request->getPost());
    }
    public function edit($project_id)
    {
        if (!$this->isLoggedIn()) {
            return redirect()->route('login');
        }
        $projectModel = model('App\Models\admin\projectModel');
        $data = $projectModel->getProjectById($project_id);
        return $this->layout('projects/projects_entry', ["project_id" => $project_id, "action" => "projects/update", "project_data" => $data[0], "submit_button" => "Update"]);
    }
    public function update()
    {
        helper(['form', 'url']);
        $projectModel = model('App\Models\admin\projectModel');
        $request = \Config\Services::request();
        // $session = \Config\Services::session();
        $data = $request->getPost();

        $rules =
            [
                'project_title' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Project title is required',
                    ]
                ],
                'project_type' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Project type is required',
                    ]
                ],
                'sponsored_body' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Project Sponsored body is required',
                    ]
                ],
                'project_state' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Project State is required',
                    ]
                ],
                'project_district' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Project state is required',
                    ]
                ],
                'location' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Project location is required',
                    ]
                ],
                'session' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Project session is required',
                    ]
                ],
                'status' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Project Status is required',
                    ]
                ],
                'start_date' => 'required',
                'end_date' => 'required',
            ];
        if (!$this->validate($rules)) {
            // print_r($this->validator->getErrors());
            // die;
            return $this->layout('projects/projects_entry', ["action" => "projects/update", "project_data" => (object)$data, 'errors' => $this->validator->getErrors(), "submit_button" => "Update"]);
        } else {

            $updateData = array(
                'project_title' => $data['project_title'],
                'project_type' => $data['project_type'],
                'sponsored_body' => $data['sponsored_body'],
                'project_state' => $data['project_state'],
                'project_district' => $data['project_district'],
                'location' => $data['location'],
                'session' => $data['session'],
                'status' => $data['status'],
                'start_date' => date('Y-m-d', strtotime($data['start_date'])),
                'end_date' => date('Y-m-d', strtotime($data['end_date'])),
                'about_project' => $data['about_the_project'],
            );
            if ($projectModel->update_record($data['project_id'], $updateData)) {
                return redirect()->to('projects/edit/' . $data['project_id']);
            } else {
                return $this->layout('projects/projects_entry', ["action" => "projects/update", "project_data" => (object)$updateData, 'errors' => [], "submit_button" => "Update"]);
            }
        }
    }
    public function get_records()
    {
        $request = \Config\Services::request();
        $post = $request->getPost();
        $projectModel = model('App\Models\admin\projectModel');
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
                $action = "";
                $action .= '<a href="#!" data-id="' . $rows->project_id . '" data-toggle="tooltip" data-placement="top" title="View User" class="btn btn-primary view"><span class="fa fa-eye" aria-hidden="true"></span>&nbsp;View</a>';
                $action .= '<a href="' . base_url('projects/edit/' . '' . $rows->project_id) . '" data-toggle="tooltip" data-placement="top" title="Edit User" class="btn btn-warning edit"><i class="fas fa-pen"></i></span>&nbsp;Edit</a>';
                $action .= '<a href="#!" data-id="' . $rows->project_id . '" data-toggle="tooltip" data-placement="top" title="Delete User" class="btn btn-danger delete"><i class="fas fa-ban"></i>&nbsp;Delete</a>';

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
    public function delete_project()
    {
        $request = \Config\Services::request();
        $post = $request->getPost();

        if ($post["project_id"] != '' && $post["project_id"] != 0) {
            $projectModel = model('App\Models\admin\projectModel');
            // print_r($post["project_id"]);
            $projectModel->delete($post["project_id"], true);
            $json_data = array(
                "status" => true,
                "message" => "Record deleted successfully"
            );
        } else {
            $json_data = array(
                "status" => false,
                "message" => "Something went wrong."
            );
        }
        echo json_encode($json_data);
    }
}
