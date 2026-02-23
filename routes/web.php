<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardInstructorController;
use App\Http\Controllers\DashboardStudentController;





// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard/instructor', function () {
//     return view('dashboard-instructor');
// })->middleware(['auth', 'verified'])->name('instructor.dashboard');

Route::get('/dashboard/instructor', [DashboardInstructorController::class, 'index'])->middleware(['auth', 'verified'])->name('instructor.dashboard');
Route::get('/dashboard/student', [DashboardStudentController::class, 'index'] )->middleware(['auth', 'verified'])->name('student.dashboard');

// Route::get('/dashboard/student', function () {
//     return view('dashboard-student');
// })->middleware(['auth', 'verified'])->name('student.dashboard');


Route::get('/dashboard/instructor/add-course',[CourseController::class, 'create'])->name('add-course');

Route::post('/dashboard-instructor/add-course', [CourseController::class, 'store'])->name('courses.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('landing');
})->name('landing');

require __DIR__.'/auth.php';
