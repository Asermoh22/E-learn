<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Services\InstructorService;
use App\Services\StudentService;

class RegisteredUserController extends Controller
{
    protected $instructorService;
    protected $studentService;

    public function __construct(InstructorService $instructorService, StudentService $studentService)
    {
        $this->instructorService = $instructorService;
        $this->studentService = $studentService;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required', 'in:instructor,student'], // Added validation for allowed roles
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'bio' => ['nullable', 'string', 'max:1000'], // Added validation for bio
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role === 'instructor') {
            $this->instructorService->create([
                'user_id' => $user->id,
                'bio' => $request->bio ?? null,
                'total_earnings' => 0,
            ]);
            return redirect(route('instructor.dashboard', absolute: false));
        } else {
            $this->studentService->create(['user_id' => $user->id]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}