<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table      = 'projects';
    protected $primaryKey = 'project_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

   // protected $allowedFields = ['firstname', 'lastname', 'password', 'email'];

    protected $useTimestamps = true;
    protected $project_titleField  = 'project_title';
    protected $project_typeField  = 'project_type';
    protected $project_bodyField  = 'project_body';
    protected $project_stateField  = 'project_state';
    protected $project_districtField  = 'project_district';
    protected $locationField  = 'location';
    protected $sessionField  = 'session';
    protected $statusField  = 'status';
    protected $start_dateField  = 'start_date';
    protected $end_dateField  = 'end_date';
    protected $project_valueField  = 'project_value';
    protected $about_projectField  = 'about_project';
    
}
