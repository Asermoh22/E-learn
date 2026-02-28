<?php

namespace App\Services;

use App\Repositories\LessonRepo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class LessonService
{
    protected LessonRepo $lessonRepo;

    public function __construct(LessonRepo $lessonRepo)
    {
        $this->lessonRepo = $lessonRepo;
    }

    public function create(array $data)
    {

        return $this->lessonRepo->create([
            'section_id' => $data['section_id'],
            'title'         => $data['title'],
            'content_type' => $data['content_type'],
            'content_url' => $data['content_url'],
            'duration' => $data['duration'],
        ]);
    }

    public function show(int $id)
    {
        return $this->lessonRepo->find($id);
    }

    public function update(int $id, array $data)
    {
        return $this->lessonRepo->update($id, [
            'title' => $data['title'],
            'content_type' => $data['content_type'],
            'content_url' => $data['content_url'],
            'duration' => $data['duration'],
        ]);
    }
    public function delete(int $id)
    {
        return $this->lessonRepo->delete($id);
    }

    
}