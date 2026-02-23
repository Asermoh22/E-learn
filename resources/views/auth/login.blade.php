@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <div class="nav-logo" style="justify-content: center; margin-bottom: 24px;">
            <i class="fa-solid fa-lines-leaning" style="color: #E44320;"></i>
            <span class="logo-text">E<span class="accent">Learn</span></span>
        </div>
        <h2>Welcome Back</h2>
        <p class="subtitle">Please enter your details to sign in.</p>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="name@company.com" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="••••••••">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn-primary">Sign In</button>
        </form>
        
        <p class="footer-text">Don't have an account? <a href="{{ route('register') }}">Create account</a></p>
    </div>
</div>

<style>
/* Base Reset & Typography */
body {
    background-color: #1C1718;
    color: #D9D9D9;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    margin: 0;
}
.nav-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    justify-content: center;
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
.login-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 24px;
}

.login-card {
    background-color: #252122; /* Slightly lighter than body for depth */
    padding: 48px;
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    width: 100%;
    max-width: 420px;
}

.login-card h2 {
    color: #FFFFFF;
    margin: 0 0 8px 0;
    font-size: 1.75rem;
    font-weight: 700;
    letter-spacing: -0.025em;
}

.subtitle {
    color: #D9D9D9;
    font-size: 0.95rem;
    margin-bottom: 32px;
    opacity: 0.8;
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
}

.login-card label {
    display: block;
    margin-bottom: 8px;
    font-size: 0.875rem;
    font-weight: 600;
    color: #D9D9D9;
}

.login-card input {
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

.login-card input:focus {
    outline: none;
    border-color: #E44320;
    box-shadow: 0 0 0 3px rgba(228, 67, 32, 0.2);
}

.login-card input::placeholder {
    color: #666;
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
    transition: transform 0.1s ease, background-color 0.2s ease;
    margin-top: 8px;
}

.btn-primary:hover {
    background-color: #ff5733; /* Slightly lighter orange */
}

.btn-primary:active {
    transform: scale(0.98);
}

.footer-text {
    margin-top: 32px;
    font-size: 0.9rem;
    color: #D9D9D9;
}

.login-card a {
    color: #E44320;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s;
}

.login-card a:hover {
    text-decoration: underline;
    color: #ff5733;
}
</style>
@endsection