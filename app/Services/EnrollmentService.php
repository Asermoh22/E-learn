<?php

namespace App\Services;

use App\Repositories\EnrollmentRepo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EnrollmentService
{
    protected EnrollmentRepo $enrollmentRepo;

    public function __construct(EnrollmentRepo $enrollmentRepo)
    {
        $this->enrollmentRepo = $enrollmentRepo;
    }

    public function create(array $data)
    {
        
        return $this->enrollmentRepo->create([
            'student_id' => $data['student_id'],
            'course_id' => $data['course_id'],
            'enrolled_at' => now(),
        ]);
    }

    public function getEnrollmentsByStudentId(int $studentId)
    {
        return $this->enrollmentRepo->getEnrollmentsByStudentId($studentId);
         
    }

    public function getEnrollmentsByCourseId(int $courseId)
    {
        return $this->enrollmentRepo->getEnrollmentsByCourseId($courseId);
         
    }

    public function cancelEnrollment(int $enrollmentId)
    {
        return $this->enrollmentRepo->cancelEnrollment($enrollmentId);
    }
}
