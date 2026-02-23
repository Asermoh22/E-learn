<?php 

namespace App\Repositories;

use App\Models\Section;

class SectionRepo
{
    protected Section $model;

    public function __construct(Section $section)
    {
        $this->model = $section;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find(int $id)
    {
        return $this->model->findorfail($id);
    }
    
}