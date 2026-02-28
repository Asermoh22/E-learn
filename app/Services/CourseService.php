<?php

namespace App\Services;

use App\Repositories\CourseRepo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CourseService
{
    protected CourseRepo $courseRepo;

    public function __construct(CourseRepo $courseRepo)
    {
        $this->courseRepo = $courseRepo;
    }

    public function create(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $data['image']->store('courses', 'public');
        }

        return $this->courseRepo->create([
            'instructor_id' => $data['instructor_id'],
            'category_id'   => $data['category_id'],
            'title'         => $data['title'],
            'description'   => $data['description'],
            'price'         => $data['price'],
            'level'         => $data['level'],
            'duration'      => $data['duration'],
            'image'         => $data['image'] ?? null,
        ]);
    }

    public function show(int $id)
    {
        return $this->courseRepo->find($id);
    }

    public function sectionCount(int $courseId)
    {
        return $this->courseRepo->sectioncount($courseId);
    }

    
}