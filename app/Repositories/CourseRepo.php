<?php 

namespace App\Repositories;

use App\Models\Course;

class CourseRepo
{
    protected Course $model;

    public function __construct(Course $course)
    {
        $this->model = $course;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}