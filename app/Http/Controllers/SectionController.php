<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SectionService;
use App\Services\CourseService;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    protected SectionService $sectionService;
    protected CourseService $courseService;

    public function __construct(SectionService $sectionService, CourseService $courseService)
    {
        $this->sectionService = $sectionService;
        $this->courseService = $courseService;
    }

    public function store(Request $request, $course_id) 
    {
        $request->validate([
            'title' => 'required|string|max:255', 
        ]);

        $course = $this->courseService->show($course_id);
        
        if ($course->instructor_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }
        
        $section = $this->sectionService->create([
            'course_id' => $course_id,
            'title' => $request->title
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Section created successfully',
            'section' => $section
        ]);
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'title' => 'required|string|max:255', 
        ]);

        $section = $this->sectionService->show($id);
        $course = $this->courseService->show($section->course_id);
        
        if ($course->instructor_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }
        
        $updatedSection = $this->sectionService->update($id, [
            'title' => $request->title
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Section updated successfully',
            'section' => $updatedSection
        ]);
    }

    public function destroy($id) 
    {
        $section = $this->sectionService->show($id);
        $course = $this->courseService->show($section->course_id);
        
        if ($course->instructor_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }
        
        $this->sectionService->delete($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Section deleted successfully'
        ]);
    }
}