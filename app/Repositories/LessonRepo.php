<?php 

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepo
{
    protected Lesson $model;

    public function __construct(Lesson $lesson)
    {
        $this->model = $lesson;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find(int $id)
    {
        return $this->model->findorfail($id);
    }
    public function update(int $id, array $data)
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