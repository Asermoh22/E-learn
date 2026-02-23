<?php

namespace App\Services;
use App\Repositories\InstructorRepo;

class InstructorService{
    protected $InstructorRepo;

    public function __construct(InstructorRepo $InstructorRepo)
    {
        $this->InstructorRepo = $InstructorRepo;
    }
    public function create(array $data){
        return $this->InstructorRepo->create([
            'user_id' => $data['user_id'],
            'bio' => $data['bio'] ?? null,
            'total_earnings' => $data['total_earnings'] ?? 0,
        ]);
    }
    

}
