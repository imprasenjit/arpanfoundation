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
        $session = \Config\Services::session();
        $data = [
            "firstName" => $session->firstname,
            "lastName" => $session->lastname
        ];
        return $this->layout('projects/projects_entry');
        // return view('admin/requires/header') . view('admin/requires/sidebar', $data) . view('admin/projects/projects_entry') . view('admin/requires/footer');
    }
    public function save()
    {
        helper(['form', 'url']);
        $projectModel = model('App\Models\admin\projectModel');
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $rules = [
            'project_title' => "required",
            'project_type' => "required",
            'sponsored_body' => "required",
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
            return $this->layout('projects/projects_entry', $error);
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
            $projectModel->insert($insertData);
            return $this->layout('projects/projects_entry', ["message" => "Data Inserted Successfully"]);
            // return view('admin/requires/header') . view('admin/requires/sidebar', $data) . view('admin/projects/projects_entry', ["message" => "Data Inserted Successfully"]) . view('admin/requires/footer');
        }
        // print_r($request->getPost());
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
