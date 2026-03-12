<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function store(Request $request, int $course_id)
    {
       
        $data['course_id'] = $course_id;
        $data['student_id'] = Auth::user()->student->id;
        $enrollmentService = app()->make(\App\Services\EnrollmentService::class);
        $enrollment = $enrollmentService->create($data);

        return redirect()->back()->with('success', 'Enrollment successful');    }
}
