<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardInstructorController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;






Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/courses/{course}/approve', [AdminController::class, 'approveCourse'])->name('admin.courses.approve');
    Route::patch('/courses/{course}/reject', [AdminController::class, 'rejectCourse'])->name('admin.courses.reject');
    Route::patch('/courses/{course}/publish', [AdminController::class, 'publishCourse'])->name('admin.courses.publish');
    Route::patch('/courses/{course}/Pending', [AdminController::class, 'PendingCourse'])->name('admin.courses.Pending');

});
Route::get('/dashboard/instructor', [DashboardInstructorController::class, 'index'])->middleware(['auth', 'verified'])->name('instructor.dashboard');
Route::get('/dashboard/student', [DashboardStudentController::class, 'index'] )->middleware(['auth', 'verified'])->name('student.dashboard');

Route::get('/dashboard/instructor/add-course',[CourseController::class, 'create'])->name('add-course');
Route::post('/dashboard-instructor/add-course', [CourseController::class, 'store'])->name('courses.store');
Route::get('/Course/Show/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::post('/sections/{course_id}', [SectionController::class, 'store'])->name('sections.store');
Route::put('/sections/{id}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('/sections/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('Lessons', LessonController::class)->middleware('auth');
Route::post('/enrollments/{course_id}', [EnrollmentController::class, 'store'])->name('enrollments.store');

Route::get('/', function () {
    return view('landing');
})->name('landing');

require __DIR__.'/auth.php';
