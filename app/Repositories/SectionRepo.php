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
    public function updatesection(int $id, array $data)
    {
        $section = $this->model->findorfail($id);
        $section->update($data);
        return $section;
    }

    public function delete(int $id)
    {
        $section = $this->model->findorfail($id);
        return $section->delete();
    }
    
}