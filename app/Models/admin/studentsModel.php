<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'student_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
            'session' ,
            'project_title' ,
            'center' ,
            'student_name' ,
            'village' ,
            'landmark' ,
            'district' ,
            'state' ,
            'pincode' ,
            'dob' ,
            'gender' ,
            'caste' ,
            'religion' ,
            'phone_no' ,
            'email' ,
            'father_name' ,
            'mother_name' ,
            'guardian_name' ,
            'guardian_contact' ,
            'family_income' ,
            'hslc_board' ,
            'hslc_div' ,
            'hslc_yop' ,
            'hslc_marksheet' ,
            'hslc_certificate' ,
            'hs_board' ,
            'hs_div' ,
            'hs_yop' ,
            'hs_marksheet' ,
            'hs_certificate' ,
            'grad-uni' ,
            'grad_div' ,
            'grad_yop' ,
            'grad_marksheet' ,
            'grad_certificate' ,
            'photo' ,
            'signature' ,
            'other_doc' ,
            'pan_no' ,
    ];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function countAllRows()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->countAll();
    }

    public function getStudentById($student_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('student_id', $student_id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function allRows($start = 0, $limit = 20, $orderBy = 'student_id', $dir = 'DESC')
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->limit($limit, $start);
        $builder->orderBy($orderBy, $dir);

        $query = $builder->get();
        return $query->getResult();
    }
    public function searchRows($start = 0, $limit = 20, $search, $orderBy = 'student_id', $dir = 'DESC')
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->limit($start, $limit);
        $builder->orderBy($orderBy, $dir);
        $builder->like('student_name', $search);
        $query = $builder->get();
        return $query->getResult();
    }
    public function totalSearchRows($search)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->like('student_name', $search);
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
