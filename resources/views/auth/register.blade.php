@extends('layouts.app')

@section('title', 'Create Account')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="nav-logo" style="justify-content: center; margin-bottom: 24px;">
            <i class="fa-solid fa-lines-leaning" style="color: #E44320;"></i>
            <span class="logo-text">E<span class="accent">Learn</span></span>
        </div>
        <h2>Create Account</h2>
        <p class="subtitle">Join us today to get started with your account.</p>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name" required placeholder="John Doe">
            </div>

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="name@company.com">
            </div>

           <div class="input-group">
                <label for="role">Role</label>
                <select name="role" id="role" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="student">Student</option>
                    <option value="instructor">Instructor</option>
                </select>
            </div>
            
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required placeholder="••••••••">
            </div>
            
            <button type="submit" class="btn-primary">Create Account</button>
        </form>
        
        <p class="footer-text">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
    </div>
</div>

<style>
/* Shared Styles */
body {
    background-color: #1C1718;
    color: #D9D9D9;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    margin: 0;
}

.auth-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 24px;
}
.nav-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    justify-content: center;
}

.input-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 16px;
}

.input-group label {
    margin-bottom: 6px;
    color: #D9D9D9;
    font-size: 14px;
}

.input-group select {
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #333;
    background-color: #1C1718;
    color: #D9D9D9;
    font-size: 14px;
}

.input-group select:focus {
    outline: none;
    border-color: #E44320;
}
.nav-logo i {
    font-size: 36px;
    color: #E44320;
}

.nav-logo .logo-text {
    font-size: 2rem;
    font-weight: 700;
    color: #FFFFFF;
}

.nav-logo .logo-text .accent {
    color: #E44320;
}
.auth-card {
    background-color: #252121; /* Subtle contrast from background */
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    width: 100%;
    max-width: 440px;
    text-align: center;
}

.auth-card h2 {
    color: #FFFFFF;
    margin: 0 0 8px 0;
    font-size: 1.75rem;
    font-weight: 700;
}

.subtitle {
    color: #D9D9D9;
    font-size: 0.95rem;
    margin-bottom: 32px;
    opacity: 0.8;
}

.input-group {
    margin-bottom: 18px;
    text-align: left;
}

.auth-card label {
    display: block;
    margin-bottom: 8px;
    font-size: 0.875rem;
    font-weight: 600;
    color: #D9D9D9;
}

.auth-card input {
    width: 100%;
    padding: 12px 16px;
    border-radius: 8px;
    border: 1px solid #3d393a;
    background-color: #1C1718;
    color: #FFFFFF;
    font-size: 1rem;
    transition: all 0.2s ease;
    box-sizing: border-box;
}

.auth-card input:focus {
    outline: none;
    border-color: #E44320;
    box-shadow: 0 0 0 3px rgba(228, 67, 32, 0.15);
}

.btn-primary {
    width: 100%;
    padding: 14px;
    background-color: #E44320;
    color: #FFFFFF;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-top: 12px;
}

.btn-primary:hover {
    background-color: #ff5733;
    transform: translateY(-1px);
}

.btn-primary:active {
    transform: translateY(0);
}

.footer-text {
    margin-top: 24px;
    font-size: 0.9rem;
    color: #D9D9D9;
}

.auth-card a {
    color: #E44320;
    text-decoration: none;
    font-weight: 600;
}

.auth-card a:hover {
    text-decoration: underline;
}
</style>
@endsection