@extends('layouts.app')

@section('title', 'E-Learn | Professional Dashboard')

@section('content')

<!-- Google Font: Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root {
    --brand-main: #E44320;
    --brand-gradient: linear-gradient(135deg, #E44320 0%, #FF6B4A 100%);
    --bg-dark: #0A0A0A;
    --surface: #141414;
    --surface-light: #1E1E1E;
    --surface-lighter: #2A2A2A;
    --text-main: #FFFFFF;
    --text-muted: #A1A1AA;
    --text-dim: #6B6B6B;
    --card-radius: 32px;
    --border-color: rgba(255,255,255,0.05);
    --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: var(--bg-dark);
    color: var(--text-main);
    font-family: 'Inter', sans-serif;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
}

/* Premium Scrollbar */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: var(--surface);
}

::-webkit-scrollbar-thumb {
    background: var(--brand-main);
    border-radius: 20px;
}

::-webkit-scrollbar-thumb:hover {
    background: #c73a1a;
}

/* Sidebar Styling - Ultra Premium */
#sidebar {
    position: fixed;
    top: 20px;
    left: -300px;
    width: 280px;
    height: calc(100vh - 40px);
    background: var(--surface);
    border-radius: var(--card-radius);
    padding: 40px 25px;
    transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1000;
    box-shadow: var(--shadow-xl);
    border: 1px solid var(--border-color);
    backdrop-filter: blur(10px);
    display: flex;
    flex-direction: column;
}

#sidebar.active {
    left: 20px;
}

#sidebar .brand-side {
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 40px;
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    color: white;
    letter-spacing: -1px;
}

#sidebar .brand-side span {
    color: var(--brand-main);
    background: rgba(228,67,32,0.1);
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 14px;
}

.sidebar-menu {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

#sidebar a {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 20px;
    color: var(--text-muted);
    text-decoration: none;
    border-radius: 18px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

#sidebar a::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: var(--brand-main);
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

#sidebar a:hover::before,
#sidebar a.active::before {
    transform: scaleY(1);
}

#sidebar a i {
    width: 24px;
    font-size: 18px;
}

#sidebar a:hover,
#sidebar a.active {
    background: rgba(228,67,32,0.08);
    color: var(--text-main);
    padding-left: 25px;
}

#sidebar a.active {
    background: linear-gradient(90deg, rgba(228,67,32,0.15) 0%, transparent 100%);
    color: var(--brand-main);
}

#sidebar form {
    margin-top: auto;
}

#sidebar form button {
    width: 100%;
    padding: 14px 20px;
    border-radius: 18px;
    color: #ff4d4d !important;
    display: flex;
    align-items: center;
    gap: 14px;
    transition: 0.3s;
    border: 1px solid rgba(255,77,77,0.1);
}

#sidebar form button:hover {
    background: rgba(255,77,77,0.1);
}

/* Main Wrapper */
.main-layout {
    padding: 30px;
    transition: 0.4s;
    margin-left: 0;
}

/* Navbar - Ultra Modern */
.nav-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(20, 20, 20, 0.8);
    backdrop-filter: blur(20px);
    padding: 12px 30px;
    border-radius: 100px;
    border: 1px solid var(--border-color);
    margin-bottom: 40px;
    position: sticky;
    top: 20px;
    z-index: 100;
}

.brand {
    font-size: 24px;
    font-weight: 800;
    letter-spacing: -1px;
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    cursor: pointer;
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-icon {
    width: 40px;
    height: 40px;
    background: rgba(255,255,255,0.03);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    cursor: pointer;
    transition: 0.3s;
    border: 1px solid var(--border-color);
    position: relative;
}

.nav-icon:hover {
    background: rgba(228,67,32,0.1);
    color: var(--brand-main);
    transform: translateY(-2px);
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    width: 18px;
    height: 18px;
    background: var(--brand-main);
    border-radius: 50%;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border: 2px solid var(--surface);
}

.user-pill {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 6px 18px 6px 8px;
    background: rgba(255,255,255,0.03);
    border-radius: 100px;
    border: 1px solid var(--border-color);
    cursor: pointer;
    transition: 0.3s;
}

.user-pill:hover {
    background: rgba(255,255,255,0.08);
    border-color: rgba(228,67,32,0.3);
}

.user-pill img {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--brand-main);
}

/* Dashboard Header */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.header-title h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 8px;
}

.header-title p {
    color: var(--text-muted);
    font-size: 14px;
}

.header-actions {
    display: flex;
    gap: 15px;
}

.btn-primary {
    background: var(--brand-gradient);
    color: white;
    padding: 14px 28px;
    border-radius: 100px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: 0.3s;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(228,67,32,0.4);
}

.btn-secondary {
    background: rgba(255,255,255,0.03);
    color: var(--text-main);
    padding: 14px 28px;
    border-radius: 100px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: 0.3s;
    border: 1px solid var(--border-color);
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-secondary:hover {
    background: rgba(255,255,255,0.08);
    border-color: var(--brand-main);
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}

.stat-card {
    background: var(--surface);
    border-radius: 28px;
    padding: 25px;
    border: 1px solid var(--border-color);
    transition: 0.3s;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--brand-gradient);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.stat-card:hover::before {
    transform: scaleX(1);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.stat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.stat-icon {
    width: 50px;
    height: 50px;
    background: rgba(228,67,32,0.1);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-main);
    font-size: 22px;
}

.stat-change {
    color: #10b981;
    font-size: 13px;
    font-weight: 600;
    background: rgba(16,185,129,0.1);
    padding: 4px 10px;
    border-radius: 100px;
}

.stat-change.negative {
    color: #ef4444;
    background: rgba(239,68,68,0.1);
}

.stat-number {
    font-size: 36px;
    font-weight: 800;
    margin-bottom: 8px;
}

.stat-label {
    color: var(--text-muted);
    font-size: 14px;
}

/* Hero Card - Redesigned */
.pro-hero-card {
    background: linear-gradient(135deg, var(--surface) 0%, #1A1A1A 100%);
    border-radius: var(--card-radius);
    padding: 50px;
    position: relative;
    overflow: hidden;
    margin-bottom: 50px;
    border: 1px solid var(--border-color);
}

.hero-pattern {
    position: absolute;
    top: 0;
    right: 0;
    width: 500px;
    height: 100%;
    background: radial-gradient(circle at 70% 50%, rgba(228,67,32,0.15) 0%, transparent 50%);
}

.hero-content {
    position: relative;
    z-index: 1;
    max-width: 60%;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(228,67,32,0.1);
    color: var(--brand-main);
    padding: 8px 16px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 20px;
    border: 1px solid rgba(228,67,32,0.2);
}

.hero-content h1 {
    font-size: 48px;
    font-weight: 800;
    margin: 0 0 15px 0;
    letter-spacing: -2px;
    line-height: 1.1;
}

.hero-content h1 span {
    color: var(--brand-main);
    position: relative;
}

.hero-content p {
    color: var(--text-muted);
    font-size: 18px;
    margin-bottom: 30px;
    line-height: 1.6;
}

.hero-stats-mini {
    display: flex;
    gap: 30px;
}

.hero-stat-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.hero-stat-item i {
    font-size: 24px;
    color: var(--brand-main);
}

.hero-stat-item div p {
    margin: 0;
    font-size: 20px;
    font-weight: 700;
    color: white;
}

.hero-stat-item div span {
    font-size: 12px;
    color: var(--text-muted);
}

/* Quick Actions */
.quick-actions {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 50px;
}

.action-card {
    background: var(--surface);
    border-radius: 24px;
    padding: 25px;
    text-align: center;
    border: 1px solid var(--border-color);
    transition: 0.3s;
    cursor: pointer;
    text-decoration: none;
    color: white;
}

.action-card:hover {
    transform: translateY(-5px);
    background: var(--surface-light);
    border-color: var(--brand-main);
}

.action-icon {
    width: 60px;
    height: 60px;
    background: rgba(228,67,32,0.1);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: var(--brand-main);
    font-size: 24px;
    transition: 0.3s;
}

.action-card:hover .action-icon {
    background: var(--brand-main);
    color: white;
}

.action-card h4 {
    font-size: 18px;
    margin-bottom: 8px;
}

.action-card p {
    color: var(--text-muted);
    font-size: 13px;
}

/* Section Header */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.section-header h2 {
    font-size: 24px;
    font-weight: 700;
}

.section-header h2 span {
    color: var(--brand-main);
    margin-left: 10px;
    font-size: 16px;
}

.view-all {
    color: var(--brand-main);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.view-all:hover {
    gap: 12px;
}

/* Categories - Modern */
.cat-shelf {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.cat-btn {
    padding: 12px 24px;
    border-radius: 14px;
    border: 1px solid var(--border-color);
    background: transparent;
    color: var(--text-muted);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.cat-btn i {
    font-size: 16px;
}

.cat-btn:hover {
    background: rgba(228,67,32,0.1);
    color: var(--brand-main);
    border-color: var(--brand-main);
}

.cat-btn.active {
    background: var(--brand-gradient);
    color: white;
    border-color: transparent;
    box-shadow: 0 10px 20px rgba(228,67,32,0.2);
}

/* Course Grid */
.course-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.course-item {
    background: var(--surface);
    border-radius: 28px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid var(--border-color);
    position: relative;
}

.course-item:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(228,67,32,0.2);
}

.course-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: var(--brand-gradient);
    color: white;
    padding: 6px 12px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 700;
    z-index: 1;
    box-shadow: 0 5px 15px rgba(228,67,32,0.3);
}

.course-thumb {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: 0.4s;
}

.course-item:hover .course-thumb {
    transform: scale(1.05);
}

.course-body {
    padding: 25px;
}

.course-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.course-category {
    color: var(--brand-main);
    font-weight: 600;
    font-size: 13px;
    background: rgba(228,67,32,0.1);
    padding: 4px 10px;
    border-radius: 100px;
}

.course-stats {
    display: flex;
    gap: 15px;
    color: var(--text-muted);
    font-size: 13px;
}

.course-stats i {
    margin-right: 4px;
}

.course-body h4 {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 10px 0;
    line-height: 1.3;
}

.course-body p {
    color: var(--text-muted);
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.progress-bar {
    width: 100%;
    height: 6px;
    background: rgba(255,255,255,0.1);
    border-radius: 100px;
    margin-bottom: 20px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: var(--brand-gradient);
    border-radius: 100px;
    width: 75%;
}

.course-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.instructor {
    display: flex;
    align-items: center;
    gap: 8px;
}

.instructor img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
}

.instructor span {
    font-size: 13px;
    color: var(--text-muted);
}

.btn-course {
    background: transparent;
    color: var(--text-main);
    padding: 10px 20px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    transition: 0.3s;
    border: 1px solid var(--border-color);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-course:hover {
    background: var(--brand-main);
    border-color: var(--brand-main);
}

/* Activity Section */
.activity-section {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    margin-bottom: 50px;
}

.activity-card {
    background: var(--surface);
    border-radius: 28px;
    padding: 30px;
    border: 1px solid var(--border-color);
}

.activity-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.activity-header h3 {
    font-size: 20px;
    font-weight: 700;
}

.activity-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: rgba(255,255,255,0.02);
    border-radius: 18px;
    transition: 0.3s;
}

.activity-item:hover {
    background: rgba(255,255,255,0.04);
}

.activity-avatar {
    width: 45px;
    height: 45px;
    border-radius: 16px;
    background: rgba(228,67,32,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-main);
    font-size: 18px;
}

.activity-details {
    flex: 1;
}

.activity-details p {
    margin-bottom: 5px;
    font-weight: 500;
}

.activity-details span {
    color: var(--text-muted);
    font-size: 12px;
}

.activity-time {
    color: var(--text-muted);
    font-size: 12px;
}

/* Toggle Button */
#sidebar-toggle {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: var(--brand-gradient);
    color: white;
    border: none;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 1100;
    box-shadow: 0 15px 30px rgba(228,67,32,0.4);
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
}

#sidebar-toggle:hover {
    transform: scale(1.1) rotate(90deg);
}

/* Responsive */
@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .quick-actions {
        grid-template-columns: repeat(2, 1fr);
    }
    .activity-section {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .main-layout {
        padding: 20px;
    }
    .hero-content {
        max-width: 100%;
    }
    .hero-content h1 {
        font-size: 32px;
    }
    .nav-bar {
        padding: 12px 20px;
    }
    .nav-actions {
        gap: 10px;
    }
}
</style>

<!-- Toggle Button -->
<button id="sidebar-toggle"><i class="fa-solid fa-bars"></i></button>

<!-- Sidebar -->
<div id="sidebar">
    <a href="#" class="brand-side">
        E-Learn <span>PRO</span>
    </a>
    
    <div class="sidebar-menu">
        <a href="#" class="active"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="{{ route('add-course') }}"><i class="fa-solid fa-plus-circle"></i> Add Course</a>
        <a href="#"><i class="fa-solid fa-book-open"></i> My Courses</a>
        <a href="#"><i class="fa-solid fa-users"></i> Students</a>
        <a href="#"><i class="fa-solid fa-chart-line"></i> Analytics</a>
        <a href="#"><i class="fa-solid fa-credit-card"></i> Earnings</a>
        <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">
            <i class="fa-solid fa-power-off"></i>
            <span>Logout</span>
        </button>
    </form>
</div>

<div class="main-layout">
    <!-- Navbar -->
    <nav class="nav-bar">
        <div class="brand">E-Learn</div>
        
        <div class="nav-actions">
            <div class="nav-icon">
                <i class="fa-regular fa-message"></i>
                <span class="notification-badge">3</span>
            </div>
            <div class="nav-icon">
                <i class="fa-regular fa-bell"></i>
                <span class="notification-badge">5</span>
            </div>
            <div class="user-pill">
                <img src="{{ asset('images/default-profile.png') }}" alt="Profile">
                <span style="font-weight: 600;">{{ Auth::user()->name }}</span>
                <i class="fa-solid fa-chevron-down" style="font-size: 12px; color: var(--text-muted);"></i>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="header-title">
            <h1>Welcome back, {{ Auth::user()->name }}! 👋</h1>
            <p>Here's what's happening with your courses today.</p>
        </div>
        <div class="header-actions">
            <a href="#" class="btn-secondary">
                <i class="fa-regular fa-calendar"></i> Schedule
            </a>
            <a href="{{ route('add-course') }}" class="btn-primary">
                <i class="fa-solid fa-plus"></i> Create Course
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon"><i class="fa-solid fa-book-open"></i></div>
                <span class="stat-change">{{ $percentChange }}%</span>
            </div>
            <div class="stat-number">{{ $count }}</div>
            <div class="stat-label">Total Courses</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
                <span class="stat-change">+23%</span>
            </div>
            <div class="stat-number">1,234</div>
            <div class="stat-label">Enrolled Students</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon"><i class="fa-solid fa-dollar-sign"></i></div>
                <span class="stat-change">+8%</span>
            </div>
            <div class="stat-number">$12.4k</div>
            <div class="stat-label">Monthly Revenue</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon"><i class="fa-solid fa-star"></i></div>
                <span class="stat-change">4.8</span>
            </div>
            <div class="stat-number">98%</div>
            <div class="stat-label">Satisfaction Rate</div>
        </div>
    </div>

    <!-- Professional Hero Card -->
    <section class="pro-hero-card">
        <div class="hero-pattern"></div>
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-bolt"></i>
                INSTRUCTOR SPOTLIGHT
            </div>
            <h1>Your courses are <span>trending</span> this week</h1>
            <p>Your Advanced Web Development course has seen a 45% increase in enrollment. Keep up the great work!</p>
            
            <div class="hero-stats-mini">
                <div class="hero-stat-item">
                    <i class="fa-solid fa-eye"></i>
                    <div>
                        <p>2.4k</p>
                        <span>Views</span>
                    </div>
                </div>
                <div class="hero-stat-item">
                    <i class="fa-solid fa-user-plus"></i>
                    <div>
                        <p>156</p>
                        <span>New Students</span>
                    </div>
                </div>
                <div class="hero-stat-item">
                    <i class="fa-solid fa-comment"></i>
                    <div>
                        <p>48</p>
                        <span>Reviews</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <a href="#" class="action-card">
            <div class="action-icon"><i class="fa-solid fa-video"></i></div>
            <h4>Upload Lecture</h4>
            <p>Add new course content</p>
        </a>
        <a href="#" class="action-card">
            <div class="action-icon"><i class="fa-solid fa-pen"></i></div>
            <h4>Create Quiz</h4>
            <p>Test student knowledge</p>
        </a>
        <a href="#" class="action-card">
            <div class="action-icon"><i class="fa-solid fa-message"></i></div>
            <h4>Announcement</h4>
            <p>Message your students</p>
        </a>
        <a href="#" class="action-card">
            <div class="action-icon"><i class="fa-solid fa-chart-simple"></i></div>
            <h4>Analytics</h4>
            <p>View detailed reports</p>
        </a>
    </div>

    <!-- Categories -->
    <div class="section-header">
        <h2>Your Course Library <span>({{ $count }} courses)</span></h2>
        <a href="#" class="view-all">View All <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    
    <section class="cat-shelf">
        <button class="cat-btn active" onclick="filterCategory('all')">
            <i class="fa-solid fa-layer-group"></i> All Courses
        </button>
        <button class="cat-btn" onclick="filterCategory('web')">
            <i class="fa-solid fa-code"></i> Development
        </button>
        <button class="cat-btn" onclick="filterCategory('data')">
            <i class="fa-solid fa-chart-line"></i> Data Science
        </button>
        <button class="cat-btn" onclick="filterCategory('marketing')">
            <i class="fa-solid fa-bullhorn"></i> Marketing
        </button>
        <button class="cat-btn" onclick="filterCategory('design')">
            <i class="fa-solid fa-paint-brush"></i> Design
        </button>
    </section>

   <section class="course-grid">
    @foreach($courses as $course)
        <div class="course-item" data-category="{{ $course->category->name ?? 'General' }}">
            <span class="course-badge">
                @if($course->status == 'trending')
                    <i class="fa-solid fa-fire"></i> Trending
                @elseif($course->status == 'draft')
                    <i class="fa-regular fa-clock"></i> Draft
                @elseif($course->status == 'bestseller')
                    <i class="fa-regular fa-star"></i> Bestseller
                @endif
            </span>

            <img src="{{ $course->image 
                        ? asset('storage/' . $course->image) 
                        : asset('images/default-course.jpg') }}" 
                class="course-thumb">

            <div class="course-body">
                <div class="course-meta">
                    <span class="course-category">{{ $course->category->name ?? 'General' }}</span>
                    <div class="course-stats">
                        <span><i class="fa-regular fa-eye"></i> {{ $course->views ?? 0 }}</span>
                        <span><i class="fa-regular fa-star"></i> {{ $course->rating ?? '0.0' }}</span>
                    </div>
                </div>
                <h4>{{ $course->title }}</h4>
                <p>{{ $course->description }}</p>

                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ $course->progress ?? 0 }}%"></div>
                </div>

                <div class="course-footer">
                    <div class="instructor">
                    <i class="fa-solid fa-circle-user" style="color: rgb(99, 230, 190);"></i>                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    {{-- <a href="{{ route(name: 'courses.edit', $course->id) }}" class="btn-course">
                        <i class="fa-solid fa-pen"></i> Edit
                    </a> --}}
                </div>
            </div>
        </div>
    @endforeach
</section>

    <!-- Activity Section -->
    <div class="activity-section">
        <div class="activity-card">
            <div class="activity-header">
                <h3>Recent Student Activity</h3>
                <a href="#" class="view-all">View All</a>
            </div>
            
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-avatar">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="activity-details">
                        <p>John Doe completed "Advanced Web Architecture"</p>
                        <span>Lesson 24: React Hooks Deep Dive</span>
                    </div>
                    <span class="activity-time">5 min ago</span>
                </div>
                
                <div class="activity-item">
                    <div class="activity-avatar">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="activity-details">
                        <p>Sarah Smith started "Machine Learning Models"</p>
                        <span>Getting started with Python</span>
                    </div>
                    <span class="activity-time">15 min ago</span>
                </div>
                
                <div class="activity-item">
                    <div class="activity-avatar">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="activity-details">
                        <p>Mike Johnson left a review</p>
                        <span>★★★★★ "Best course ever!"</span>
                    </div>
                    <span class="activity-time">1 hour ago</span>
                </div>
            </div>
        </div>
        
        <div class="activity-card">
            <div class="activity-header">
                <h3>Pending Tasks</h3>
                <span class="stat-change">3 tasks</span>
            </div>
            
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-avatar" style="background: rgba(16,185,129,0.1); color: #10b981;">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </div>
                    <div class="activity-details">
                        <p>Grade 12 assignments</p>
                        <span>Machine Learning course</span>
                    </div>
                    <span class="activity-time">Due today</span>
                </div>
                
                <div class="activity-item">
                    <div class="activity-avatar" style="background: rgba(245,158,11,0.1); color: #f59e0b;">
                        <i class="fa-regular fa-message"></i>
                    </div>
                    <div class="activity-details">
                        <p>Reply to 5 student questions</p>
                        <span>Q&A section</span>
                    </div>
                    <span class="activity-time">2 pending</span>
                </div>
                
                <div class="activity-item">
                    <div class="activity-avatar" style="background: rgba(239,68,68,0.1); color: #ef4444;">
                        <i class="fa-regular fa-calendar"></i>
                    </div>
                    <div class="activity-details">
                        <p>Update course content</p>
                        <span>Web Development module</span>
                    </div>
                    <span class="activity-time">Tomorrow</span>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination-wrapper" style="margin-top: 50px; display: flex; justify-content: center;">
            {{ $courses->links() }}
        </div>
</div>

<script>
function filterCategory(cat) {
    document.querySelectorAll('.course-item').forEach(c => {
        c.style.display = (cat === 'all' || c.dataset.category === cat) ? 'block' : 'none';
    });
    
    document.querySelectorAll('.cat-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');
}

// Sidebar toggle
const sidebar = document.getElementById('sidebar');
const toggleBtn = document.getElementById('sidebar-toggle');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

// Close sidebar when clicking outside (optional)
document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target) && sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
    }
});

// Update active state based on scroll or click (for demo)
document.querySelectorAll('#sidebar a').forEach(link => {
    link.addEventListener('click', function(e) {
        if (!this.classList.contains('brand-side') && !this.closest('form')) {
            e.preventDefault();
            document.querySelectorAll('#sidebar a').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    });
});

// Simulate real-time updates
function updateStats() {
    // This would be replaced with actual AJAX calls
    console.log('Stats updated');
}

// Refresh data every 30 seconds
setInterval(updateStats, 30000);
</script>

@endsection