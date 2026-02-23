<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardInstructorController extends Controller
{
    public function index()
    {
       $instructor=Auth::user()->instructor;
       $courses=$instructor->courses()->paginate(6);
        $stats=$instructor->courseStats();



        return view('dashboard-instructor', [
        'courses' => $courses,
        'count' => $stats['total'],
        'percentChange' => $stats['percentChange'],
        ]);
    }
}
