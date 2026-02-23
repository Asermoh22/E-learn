<?php

namespace App\Services;

use App\Repositories\SectionRepo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SectionService
{
    protected SectionRepo $sectionRepo;

    public function __construct(SectionRepo $sectionRepo)
    {
        $this->sectionRepo = $sectionRepo;
    }

    public function create(array $data)
    {
       

        return $this->sectionRepo->create([
            'course_id' => $data['course_id'],
            'title'         => $data['title'],
        ]);
    }

    // public function show(int $id)
    // {
    //     return $this->courseRepo->find($id);
    // }

    
}