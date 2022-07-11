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

    protected $allowedFields = [
        'project_title',
        'project_type',
        'sponsered_body',
        'project_state',
        'project_district',
        'location',
        'session',
        'status',
        'start_date',
        'end_date',
        'about_project',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
