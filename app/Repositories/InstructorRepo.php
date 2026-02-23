<?php 

namespace App\Repositories;

use App\Models\Instructor;

class InstructorRepo
{
    protected $model;

    public function __construct(Instructor $instructor)
    {
        $this->model = $instructor;

    }

    public function create($instructor){
        return $this->model->create($instructor);
    }


}
