<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\CourseService;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $courseService;
    
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    
    public function dashboard()
    {
        $courses = Course::with(['category', 'instructor'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        
        $pendingCount = Course::where('status', 'pending')->count();
        $approvedCount = Course::where('status', 'approved')->count();
        $rejectedCount = Course::where('status', 'rejected')->count();
        $publishedCount = Course::where('status', 'published')->count();
        $totalCourses = Course::count();
        
        return view('dashboard', compact(
            'courses', 
            'pendingCount', 
            'approvedCount', 
            'rejectedCount',
            'publishedCount',
            'totalCourses'
        ));
    }

    public function approveCourse(Course $course)
    {
        $this->courseService->approveCourse($course->id);        
        // Optional: Send notification to instructor
        // Notification::send($course->instructor, new CourseApproved($course));
        
        return back()->with('success', 'Course approved successfully!');
    }

    public function rejectCourse(Course $course)
    {
        // $request->validate([
        //     'rejection_reason' => 'required|string|max:500'
        // ]);
        
        $this->courseService->rejectCourse($course->id);
        
        // Store rejection reason separately if needed
        // $course->update([
        //     'rejection_reason' => $request->rejection_reason
        // ]);
        
        // Optional: Send notification to instructor with reason
        // Notification::send($course->instructor, new CourseRejected($course, $request->rejection_reason));
        
        return back()->with('success', 'Course rejected with feedback.');
    }

    public function PendingCourse(Course $course)
    {
        $this->courseService->pendingCourse($course->id);        
        return back()->with('success', 'Course status set to pending.');
    }

    public function publishCourse(Course $course)
    {
        try {
            $this->courseService->publishCourse($course->id);        
            return back()->with('success', 'Course published successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}