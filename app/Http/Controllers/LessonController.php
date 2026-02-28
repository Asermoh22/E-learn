<?php

namespace App\Http\Controllers;
use App\Services\LessonService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected LessonService $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string|max:255',
            'content_type' => 'required|string|max:255',
            'content_url' => 'required|string|max:255',
            'duration' => 'required|integer',
        ]);

        $lesson = $this->lessonService->create($data);
        return response()->json($lesson, 201);
    }
}
