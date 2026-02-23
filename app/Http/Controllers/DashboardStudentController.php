<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Category;
use App\Models\Instructor;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardStudentController extends Controller
{
    public function index(Request $request)
    {
        $categoryFilter = $request->query('category'); // e.g., ?category=web
        
        $coursesQuery = Course::with('category', 'instructor.user');

        if ($categoryFilter && $categoryFilter !== 'all') {
                $coursesQuery->whereHas('category', function ($q) use ($categoryFilter) {
                    $q->whereRaw('LOWER(name) = ?', [strtolower($categoryFilter)]);
                });
            }
        $courses = $coursesQuery->paginate(6)->withQueryString();
        $categories = Category::all();
        $total = $coursesQuery->count(); 
        $totalhours=Course::totalhours();
        $totalstu=Student::totalStudent();

        return view('dashboard-student',[
            'total' => $total,
            'totalstu'=>$totalstu,
            'totalhours' => $totalhours,
            'courses' => $courses,
            'categories' => $categories,


        ]);
    }
}
