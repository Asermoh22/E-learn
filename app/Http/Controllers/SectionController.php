<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SectionService;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    protected SectionService $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title'     => 'required|string|max:255',
        ]);

        $section = $this->sectionService->create($request->only('course_id', 'title'));

        return response()->json([
            'success' => true,
            'section' => $section
        ]);
    }
}

