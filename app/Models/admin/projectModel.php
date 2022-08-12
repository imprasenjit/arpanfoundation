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
        'project_id',
        'project_title',
        'project_type',
        'sponsered_body',
        'project_state',
        'project_district',
        'location',
        'sponsored_body',
        'session',
        'status',
        'start_date',
        'end_date',
        'about_project',
    ];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;


    public function countAllRows()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->countAll();
    }
    public function getProjectById($project_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('project_id', $project_id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function allRows($start = 0, $limit = 20, $orderBy = 'project_id', $dir = 'DESC')
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->limit($limit, $start);
        $builder->orderBy($orderBy, $dir);

        $query = $builder->get();
        return $query->getResult();
    }
    public function searchRows($start = 0, $limit = 20, $search, $orderBy = 'project_id', $dir = 'DESC')
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->limit($start, $limit);
        $builder->orderBy($orderBy, $dir);
        $builder->like('project_title', $search);
        $query = $builder->get();
        return $query->getResult();
    }
    public function totalSearchRows($search)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->like('project_title', $search);
        return $builder->countAll();
    }
    public function update_record($id, $data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where($this->primaryKey, $id);
        return $builder->update($data);
    }
}
