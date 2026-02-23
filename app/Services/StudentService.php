<?php

namespace App\Services;
use App\Repositories\StudentRepo;
use App\Models\Student;

class StudentService{
    protected $studentRepo;

    public function __construct(StudentRepo $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }
    public function create(array $data){
        return $this->studentRepo->create([
            'user_id' => $data['user_id']
        ]);
    }
    

}
