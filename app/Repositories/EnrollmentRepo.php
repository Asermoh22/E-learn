<?php 

namespace App\Repositories;

use App\Models\Enrollment;

class EnrollmentRepo
{
    protected $model;

    public function __construct(Enrollment $enrollment)
    {
        $this->model = $enrollment;

    }

    public function create($data){
        return $this->model->create($data);
    }

    public function getEnrollmentsByStudentId($studentId)
    {
        return $this->model->where('student_id', $studentId)->get();
    }

    public function getEnrollmentsByCourseId($courseId)
    {
        return $this->model->where('course_id', $courseId)->get();
    }

    public function cancelEnrollment($enrollmentId)
    {
        $enrollment = $this->model->find($enrollmentId);
        if ($enrollment) {
            return $enrollment->delete();
        }
        return false;
    }


}
