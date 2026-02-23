<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CourseService;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
class CourseController extends Controller
{
    public function __construct(protected CourseService $courseService)
    {}

    public function create(){
        $categories = Category::all();
        return view('course.add',['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'price'       => 'required|numeric',
            'level'       => 'required|string',
            'duration'    => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $instructor = Auth::user()->instructor; 
        if(!$instructor) {
            return back()->with('error','You are not registered as an instructor');
        }
        $data['instructor_id'] = $instructor->id;  
        $data['image'] = $request->file('image');

        $this->courseService->create($data);

        return back()->with('success', 'Course created successfully');
    }

    public function show(Request $request, int $id)
    {
        $course = $this->courseService->show($id);
        $user=Auth::user();
        if($user->role==='instructor'){
            return view('course.instructor.show', [
                'course' => $course,
            ]);
        }else{
            return view('course.show', [
                        'course' => $course,
                    ]);
        }
       
    }
}
