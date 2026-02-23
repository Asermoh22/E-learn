<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepo
{
    protected $model;

    public function __construct(Student $student)
    {
        $this->model = $student;

    }

    public function create($student){
        return $this->model->create($student);

    }
}