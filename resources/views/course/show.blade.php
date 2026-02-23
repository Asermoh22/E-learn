@extends('layouts.app')

@section('title', 'E-Learn | ' . $course->title)

@section('content')

<!-- Google Font: Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root {
    --brand-main: #E44320;
    --brand-gradient: linear-gradient(135deg, #E44320 0%, #FF6B4A 100%);
    --bg-dark: #0D0D0D;
    --surface: #171717;
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

/* Main Layout */
.main-layout {
    max-width: 1440px;
    margin: 0 auto;
    padding: 30px;
}

/* Navbar */
.nav-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: var(--surface);
    padding: 15px 30px;
    border-radius: 100px;
    border: 1px solid var(--border-color);
    margin-bottom: 40px;
    backdrop-filter: blur(10px);
    position: sticky;
    top: 20px;
    z-index: 100;
}

.brand {
    font-size: 28px;
    font-weight: 800;
    letter-spacing: -1px;
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    cursor: pointer;
}

.search-bar {
    flex: 0 1 400px;
    display: flex;
    align-items: center;
    background: rgba(255,255,255,0.03);
    border-radius: 100px;
    padding: 10px 20px;
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.search-bar:focus-within {
    border-color: var(--brand-main);
    box-shadow: 0 0 0 4px rgba(228,67,32,0.1);
}

.search-bar i {
    color: var(--text-muted);
    margin-right: 10px;
}

.search-bar input {
    background: transparent;
    border: none;
    color: var(--text-main);
    font-size: 14px;
    width: 100%;
    outline: none;
}

.search-bar input::placeholder {
    color: var(--text-dim);
}

.user-menu {
    display: flex;
    align-items: center;
    gap: 20px;
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
    transition: all 0.3s ease;
}

.user-pill:hover {
    background: rgba(255,255,255,0.08);
    border-color: var(--brand-main);
}

.user-pill img {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--brand-main);
}

.logout-btn {
    background: transparent;
    border: 1px solid var(--border-color);
    color: #ff4d4d;
    padding: 10px 20px;
    border-radius: 100px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
}

.logout-btn:hover {
    background: rgba(255,77,77,0.1);
    border-color: #ff4d4d;
}

/* Breadcrumb */
.breadcrumb {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 30px;
    color: var(--text-muted);
    font-size: 14px;
}

.breadcrumb a {
    color: var(--text-muted);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb a:hover {
    color: var(--brand-main);
}

.breadcrumb i {
    font-size: 12px;
    color: var(--text-dim);
}

/* Course Hero Section */
.course-hero {
    background: linear-gradient(135deg, var(--surface) 0%, #1E1E1E 100%);
    border-radius: var(--card-radius);
    padding: 50px;
    position: relative;
    overflow: hidden;
    margin-bottom: 40px;
    border: 1px solid var(--border-color);
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.course-hero::before {
    content: "";
    position: absolute;
    top: -30%;
    right: -5%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(228,67,32,0.15) 0%, transparent 70%);
    border-radius: 50%;
}

.course-hero-content {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: center;
}

.course-hero-left .badge-container {
    display: flex;
    gap: 15px;
    margin-bottom: 25px;
    flex-wrap: wrap;
}

.course-badge {
    background: var(--brand-gradient);
    color: white;
    padding: 8px 18px;
    border-radius: 100px;
    font-size: 13px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
}

.course-badge.outline {
    background: transparent;
    border: 1px solid var(--brand-main);
    color: var(--brand-main);
    box-shadow: none;
}

.course-hero-left h1 {
    font-size: 48px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 20px;
    letter-spacing: -2px;
}

.course-hero-left h1 span {
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.course-description {
    color: var(--text-muted);
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 30px;
}

.course-meta-large {
    display: flex;
    gap: 30px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.meta-icon {
    width: 50px;
    height: 50px;
    background: rgba(228,67,32,0.1);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-main);
    font-size: 20px;
}

.meta-text h4 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 5px;
}

.meta-text p {
    color: var(--text-muted);
    font-size: 14px;
}

.course-actions-large {
    display: flex;
    gap: 20px;
    align-items: center;
    flex-wrap: wrap;
}

.btn-primary {
    background: var(--brand-gradient);
    color: white;
    border: none;
    padding: 16px 40px;
    border-radius: 100px;
    font-weight: 700;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
    text-decoration: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(228,67,32,0.4);
}

.btn-secondary {
    background: transparent;
    color: var(--text-main);
    border: 1px solid var(--border-color);
    padding: 16px 40px;
    border-radius: 100px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.btn-secondary:hover {
    border-color: var(--brand-main);
    color: var(--brand-main);
    transform: translateY(-2px);
}

.btn-wishlist-large {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: transparent;
    border: 1px solid var(--border-color);
    color: var(--text-muted);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.btn-wishlist-large:hover {
    background: rgba(228,67,32,0.1);
    border-color: var(--brand-main);
    color: var(--brand-main);
    transform: scale(1.1);
}

.course-hero-right {
    background: var(--surface-light);
    border-radius: 28px;
    overflow: hidden;
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow-xl);
}

.course-preview-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.course-preview-overlay {
    padding: 25px;
    border-top: 1px solid var(--border-color);
    background: var(--surface);
}

.preview-stats {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.preview-stat {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-muted);
    font-size: 14px;
}

.preview-stat i {
    color: var(--brand-main);
}

.preview-instructor {
    display: flex;
    align-items: center;
    gap: 15px;
}

.preview-instructor img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--brand-main);
}

.instructor-info h5 {
    font-size: 16px;
    margin-bottom: 5px;
}

.instructor-info p {
    color: var(--text-muted);
    font-size: 13px;
}

/* Course Content Grid */
.course-content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    margin-bottom: 50px;
    animation: fadeInUp 0.8s ease-out;
}

/* Main Content */
.content-card {
    background: var(--surface);
    border-radius: 28px;
    padding: 30px;
    border: 1px solid var(--border-color);
    margin-bottom: 30px;
}

.content-card:last-child {
    margin-bottom: 0;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.card-header h2 {
    font-size: 24px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-header h2 i {
    color: var(--brand-main);
    font-size: 24px;
}

.card-header span {
    color: var(--text-muted);
    font-size: 14px;
    background: rgba(255,255,255,0.05);
    padding: 6px 14px;
    border-radius: 100px;
}

/* Learning Objectives */
.learning-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.learning-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-muted);
    font-size: 15px;
}

.learning-item i {
    color: var(--brand-main);
    font-size: 18px;
}

/* Curriculum */
.curriculum-section {
    border: 1px solid var(--border-color);
    border-radius: 20px;
    overflow: hidden;
}

.curriculum-item {
    border-bottom: 1px solid var(--border-color);
}

.curriculum-item:last-child {
    border-bottom: none;
}

.curriculum-header {
    padding: 20px;
    background: rgba(255,255,255,0.02);
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background 0.3s ease;
}

.curriculum-header:hover {
    background: rgba(228,67,32,0.05);
}

.curriculum-header h3 {
    font-size: 18px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.curriculum-header span {
    color: var(--text-muted);
    font-size: 14px;
}

.curriculum-content {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
}

.curriculum-item.active .curriculum-content {
    padding: 20px;
    max-height: 500px;
}

.lecture-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid var(--border-color);
}

.lecture-item:last-child {
    border-bottom: none;
}

.lecture-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.lecture-info i {
    color: var(--brand-main);
    width: 20px;
}

.lecture-info span {
    color: var(--text-main);
    font-size: 15px;
}

.lecture-duration {
    color: var(--text-muted);
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* Sidebar */
.sidebar-card {
    background: var(--surface);
    border-radius: 28px;
    padding: 30px;
    border: 1px solid var(--border-color);
    position: sticky;
    top: 120px;
    margin-bottom: 30px;
}

.sidebar-card:last-child {
    margin-bottom: 0;
}

.price-tag {
    font-size: 48px;
    font-weight: 800;
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
}

.price-tag small {
    font-size: 16px;
    color: var(--text-muted);
    font-weight: 400;
    -webkit-text-fill-color: var(--text-muted);
}

.included-list {
    list-style: none;
    margin: 25px 0;
}

.included-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--border-color);
    color: var(--text-muted);
}

.included-list li:last-child {
    border-bottom: none;
}

.included-list li i {
    color: var(--brand-main);
    width: 20px;
}

.course-tags {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 20px;
}

.tag {
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--border-color);
    padding: 8px 16px;
    border-radius: 100px;
    font-size: 13px;
    color: var(--text-muted);
    transition: all 0.3s ease;
}

.tag:hover {
    border-color: var(--brand-main);
    color: var(--brand-main);
}

/* Reviews Section */
.reviews-section {
    grid-column: 1 / -1;
}

.review-card {
    background: var(--surface-light);
    border-radius: 24px;
    padding: 25px;
    border: 1px solid var(--border-color);
    margin-bottom: 20px;
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.reviewer-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.reviewer-info img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--brand-main);
}

.reviewer-info h4 {
    font-size: 16px;
    margin-bottom: 5px;
}

.reviewer-info p {
    color: var(--text-muted);
    font-size: 13px;
}

.review-rating {
    color: #ffb83b;
    display: flex;
    gap: 5px;
}

.review-text {
    color: var(--text-muted);
    line-height: 1.7;
}

/* Related Courses */
.related-courses {
    grid-column: 1 / -1;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    margin-top: 25px;
}

.related-course-item {
    background: var(--surface-light);
    border-radius: 24px;
    overflow: hidden;
    border: 1px solid var(--border-color);
    transition: all 0.4s ease;
}

.related-course-item:hover {
    transform: translateY(-5px);
    border-color: var(--brand-main);
    box-shadow: var(--shadow-xl);
}

.related-course-item img {
    width: 100%;
    height: 160px;
    object-fit: cover;
}

.related-course-body {
    padding: 20px;
}

.related-course-body h4 {
    font-size: 18px;
    margin-bottom: 10px;
}

.related-course-body p {
    color: var(--text-muted);
    font-size: 13px;
    margin-bottom: 15px;
}

.related-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.related-price {
    font-weight: 700;
    color: var(--brand-main);
}

.related-price.free {
    color: #10b981;
}

.btn-related {
    background: transparent;
    border: 1px solid var(--border-color);
    color: var(--text-main);
    padding: 8px 16px;
    border-radius: 100px;
    font-size: 13px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-related:hover {
    background: var(--brand-main);
    border-color: var(--brand-main);
}

/* Responsive */
@media (max-width: 1200px) {
    .course-hero-content {
        grid-template-columns: 1fr;
    }
    
    .course-content-grid {
        grid-template-columns: 1fr;
    }
    
    .sidebar-card {
        position: static;
    }
}

@media (max-width: 992px) {
    .search-bar {
        display: none;
    }
    
    .learning-list {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .main-layout {
        padding: 20px;
    }
    
    .course-hero {
        padding: 30px;
    }
    
    .course-hero-left h1 {
        font-size: 32px;
    }
    
    .meta-item {
        width: 100%;
    }
    
    .course-actions-large {
        flex-direction: column;
        align-items: stretch;
    }
    
    .btn-primary, .btn-secondary {
        text-align: center;
        justify-content: center;
    }
    
    .btn-wishlist-large {
        align-self: center;
    }
}

@media (max-width: 480px) {
    .user-menu {
        gap: 10px;
    }
    
    .logout-btn span {
        display: none;
    }
    
    .logout-btn {
        padding: 10px;
    }
    
    .course-hero-left h1 {
        font-size: 28px;
    }
    
    .card-header {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<div class="main-layout">
    <!-- Navbar -->
    <nav class="nav-bar">
        <div class="brand" onclick="window.location='{{ route('student.dashboard') }}'">E-Learn</div>
        <div class="search-bar">
            <i class="fa-solid fa-search"></i>
            <input type="text" placeholder="Search for courses..." onkeypress="if(event.key==='Enter') window.location='{{ route('student.dashboard') }}?search='+this.value">
        </div>
        <div class="user-menu">
            <div class="user-pill" onclick="toggleUserMenu()">
                <img src="{{ Auth::user()->profile_photo ?? asset('images/default-profile.png') }}" alt="Profile">
                <span style="font-weight: 600;">{{ Auth::user()->name }}</span>
                <i class="fa-solid fa-chevron-down" style="font-size: 12px; color: var(--text-muted);"></i>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fa-solid fa-power-off"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('student.dashboard') }}">Home</a>
        <i class="fa-solid fa-chevron-right"></i>
        <a href="{{ route('student.dashboard', ['category' => strtolower($course->category->name ?? '')]) }}">
            {{ $course->category->name ?? 'Courses' }}
        </a>
        <i class="fa-solid fa-chevron-right"></i>
        <span>{{ Str::limit($course->title, 50) }}</span>
    </div>

    <!-- Course Hero Section -->
    <section class="course-hero">
        <div class="course-hero-content">
            <div class="course-hero-left">
                <div class="badge-container">
                    @if($course->level)
                    <span class="course-badge">
                        @if($course->level == 'Beginner')
                            <i class="fa-solid fa-seedling"></i> Beginner
                        @elseif($course->level == 'Intermediate')
                            <i class="fa-solid fa-chart-line"></i> Intermediate
                        @elseif($course->level == 'Advanced')
                            <i class="fa-solid fa-rocket"></i> Advanced
                        @else
                            {{ $course->level }}
                        @endif
                    </span>
                    @endif
                    
                    @if($course->is_popular ?? false)
                    <span class="course-badge outline">
                        <i class="fa-solid fa-fire"></i> Most Popular
                    </span>
                    @endif
                    
                    @if($course->is_new ?? true)
                    <span class="course-badge outline">
                        <i class="fa-solid fa-star"></i> New
                    </span>
                    @endif
                </div>
                
                <h1>{{ $course->title }} <span>Course</span></h1>
                <p class="course-description">{{ $course->short_description ?? $course->description }}</p>
                
                <div class="course-meta-large">
                    <div class="meta-item">
                        <div class="meta-icon"><i class="fa-solid fa-clock"></i></div>
                        <div class="meta-text">
                            <h4>{{ $course->duration ?? '20+' }} hours</h4>
                            <p>Total duration</p>
                        </div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-icon"><i class="fa-solid fa-video"></i></div>
                        <div class="meta-text">
                            <h4>{{ $course->lessons_count ?? 150 }}+</h4>
                            <p>Lessons</p>
                        </div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-icon"><i class="fa-solid fa-users"></i></div>
                        <div class="meta-text">
                            <h4>{{ number_format($course->students_count ?? 15234) }}</h4>
                            <p>Enrolled</p>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="course-actions-large">
                    @if(Auth::user()->enrollments->contains('course_id', $course->id))
                    <a href="" class="btn-primary">
                        <i class="fa-solid fa-play"></i> Continue Learning
                    </a>
                    @else
                    <form action="{{ route('course.enroll', $course->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-primary">
                            <i class="fa-solid fa-graduation-cap"></i> 
                            @if($course->price > 0)
                                Enroll Now - ${{ number_format($course->price, 2) }}
                            @else
                                Enroll Now - Free
                            @endif
                        </button>
                    </form>
                    @endif
                    
                    <button class="btn-wishlist-large" onclick="toggleWishlist({{ $course->id }}, this)">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div> --}}
            </div>
            
            <div class="course-hero-right">
                <img src="{{ $course->image 
                            ? asset('storage/' . $course->image) 
                            : asset('images/default-course.jpg') }}" 
                     class="course-preview-image" 
                     alt="{{ $course->title }}">
                
                <div class="course-preview-overlay">
                    <div class="preview-stats">
                        <span class="preview-stat">
                            <i class="fa-regular fa-star"></i> {{ number_format($course->rating ?? 4.8, 1) }} ({{ number_format($course->reviews_count ?? 1234) }} reviews)
                        </span>
                        <span class="preview-stat">
                            <i class="fa-regular fa-clock"></i> Last updated {{ $course->updated_at->diffForHumans() }}
                        </span>
                    </div>
                    
                    <div class="preview-instructor">
                        @if($course->instructor && $course->instructor->user)
                            @if($course->instructor->avatar)
                                <img src="{{ asset('storage/' . $course->instructor->avatar) }}" 
                                     alt="{{ $course->instructor->user->name }}">
                            @else
                                <div class="instructor-avatar" style="width:50px;height:50px;font-size:20px;">
                                    {{ strtoupper(substr($course->instructor->user->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="instructor-info">
                                <h5>Created by {{ $course->instructor->user->name }}</h5>
                                <p>{{ $course->instructor->title ?? 'Expert Instructor' }}</p>
                            </div>
                        @else
                            <div class="instructor-avatar" style="width:50px;height:50px;font-size:20px;">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div class="instructor-info">
                                <h5>E-Learn Team</h5>
                                <p>Expert Instructors</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Content Grid -->
    <div class="course-content-grid">
        <!-- Main Content Column -->
        <div class="main-content">
            <!-- About This Course -->
            <div class="content-card">
                <div class="card-header">
                    <h2><i class="fa-solid fa-circle-info"></i> About This Course</h2>
                </div>
                <div class="card-body">
                    <p style="color: var(--text-muted); line-height: 1.8; margin-bottom: 25px;">
                        {{ $course->detailed_description ?? $course->description }}
                    </p>
                    
                    <h3 style="margin-bottom: 20px; font-size: 20px;">What you'll learn</h3>
                    <div class="learning-list">
                        @forelse($course->learning_objectives ?? [] as $objective)
                        <div class="learning-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>{{ $objective }}</span>
                        </div>
                        @empty
                        <div class="learning-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Master the fundamentals of {{ $course->category->name ?? 'this subject' }}</span>
                        </div>
                        <div class="learning-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Build real-world projects and applications</span>
                        </div>
                        <div class="learning-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Understand advanced concepts and best practices</span>
                        </div>
                        <div class="learning-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Get certified and boost your career</span>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Course Curriculum -->
            <div class="content-card">
                <div class="card-header">
                    <h2><i class="fa-solid fa-list-ul"></i> Course Curriculum</h2>
                    <span>{{ $course->sections_count ?? 12 }} sections • {{ $course->lessons_count ?? 150 }} lessons</span>
                </div>
                <div class="card-body">
                    <div class="curriculum-section">
                        @for($i = 1; $i <= min(($course->sections_count ?? 5), 5); $i++)
                        <div class="curriculum-item {{ $i == 1 ? 'active' : '' }}">
                            <div class="curriculum-header" onclick="toggleCurriculum(this)">
                                <h3>
                                    <i class="fa-solid fa-chevron-right" style="font-size: 14px; transition: transform 0.3s ease;"></i>
                                    Section {{ $i }}: {{ ['Introduction', 'Basics', 'Advanced Concepts', 'Projects', 'Final Assessment'][$i-1] ?? 'Course Content' }}
                                </h3>
                                <span>{{ rand(5, 15) }} lectures • {{ rand(45, 120) }} mins</span>
                            </div>
                            <div class="curriculum-content">
                                @for($j = 1; $j <= rand(5, 8); $j++)
                                <div class="lecture-item">
                                    <div class="lecture-info">
                                        <i class="fa-regular fa-circle-play"></i>
                                        <span>Lecture {{ $j }}: {{ ['Introduction', 'Getting Started', 'Core Concepts', 'Examples', 'Practice', 'Quiz', 'Summary'][$j-1] ?? 'Lesson Content' }}</span>
                                    </div>
                                    <div class="lecture-duration">
                                        <i class="fa-regular fa-clock"></i> {{ rand(5, 20) }}:00
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Requirements -->
            <div class="content-card">
                <div class="card-header">
                    <h2><i class="fa-solid fa-clipboard-list"></i> Requirements</h2>
                </div>
                <div class="card-body">
                    <ul style="list-style: none;">
                        <li style="display: flex; gap: 12px; margin-bottom: 15px; color: var(--text-muted);">
                            <i class="fa-solid fa-check" style="color: var(--brand-main);"></i>
                            <span>No prior experience needed. This course is designed for beginners.</span>
                        </li>
                        <li style="display: flex; gap: 12px; margin-bottom: 15px; color: var(--text-muted);">
                            <i class="fa-solid fa-check" style="color: var(--brand-main);"></i>
                            <span>A computer with internet connection and willingness to learn.</span>
                        </li>
                        <li style="display: flex; gap: 12px; margin-bottom: 15px; color: var(--text-muted);">
                            <i class="fa-solid fa-check" style="color: var(--brand-main);"></i>
                            <span>Basic computer skills and familiarity with using web browsers.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="sidebar">
            <div class="sidebar-card">
                <div class="price-tag">
                    @if($course->price > 0)
                        ${{ number_format($course->price, 2) }}
                        <small>one-time</small>
                    @else
                        Free
                        <small>forever</small>
                    @endif
                </div>

                {{-- <div class="sidebar-actions" style="margin-bottom: 25px;">
                    @if(Auth::user()->enrollments->contains('course_id', $course->id))
                    <a href="{{ route('course.learn', $course->id) }}" class="btn-primary" style="width: 100%; text-align: center; justify-content: center; margin-bottom: 10px;">
                        <i class="fa-solid fa-play"></i> Continue Learning
                    </a>
                    @else
                    <form action="{{ route('course.enroll', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; margin-bottom: 10px;">
                            <i class="fa-solid fa-graduation-cap"></i> 
                            @if($course->price > 0)
                                Enroll Now - ${{ number_format($course->price, 2) }}
                            @else
                                Enroll Now - Free
                            @endif
                        </button>
                    </form>
                    @endif
                    
                    <button class="btn-secondary" style="width: 100%; justify-content: center;" onclick="toggleWishlist({{ $course->id }}, this)">
                        <i class="fa-regular fa-heart"></i> Add to Wishlist
                    </button>
                </div> --}}

                <h3 style="margin-bottom: 15px;">This course includes:</h3>
                <ul class="included-list">
                    <li><i class="fa-solid fa-video"></i> {{ $course->hours ?? '20' }} hours on-demand video</li>
                    <li><i class="fa-solid fa-file"></i> {{ $course->articles_count ?? 25 }} articles</li>
                    <li><i class="fa-solid fa-download"></i> {{ $course->resources_count ?? 15 }} downloadable resources</li>
                    <li><i class="fa-solid fa-key"></i> Full lifetime access</li>
                    <li><i class="fa-solid fa-mobile-screen"></i> Access on mobile and TV</li>
                    <li><i class="fa-solid fa-certificate"></i> Certificate of completion</li>
                </ul>

                <div class="course-tags">
                    <span class="tag">{{ $course->category->name ?? 'Development' }}</span>
                    <span class="tag">{{ $course->level ?? 'Beginner' }}</span>
                    @if($course->language ?? true)
                    <span class="tag">English</span>
                    @endif
                    @if($course->subtitles ?? true)
                    <span class="tag">Subtitles</span>
                    @endif
                </div>
            </div>

            {{-- <div class="sidebar-card">
                <h3 style="margin-bottom: 20px;">Share this course</h3>
                <div style="display: flex; gap: 15px;">
                    <a href="#" style="width: 45px; height: 45px; border-radius: 50%; background: rgba(59,89,152,0.1); color: #3b5998; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" style="width: 45px; height: 45px; border-radius: 50%; background: rgba(0,172,238,0.1); color: #00acee; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" style="width: 45px; height: 45px; border-radius: 50%; background: rgba(10,102,194,0.1); color: #0a66c2; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" style="width: 45px; height: 45px; border-radius: 50%; background: rgba(228,67,32,0.1); color: var(--brand-main); display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;">
                        <i class="fa-regular fa-envelope"></i>
                    </a>
                </div>
            </div> --}}
        </div>

        <!-- Reviews Section -->
        <div class="reviews-section content-card">
            <div class="card-header">
                <h2><i class="fa-regular fa-star"></i> Student Reviews</h2>
                <span>{{ $course->reviews_count ?? 1245 }} reviews</span>
            </div>
            
            <div class="reviews-list">
                @for($i = 1; $i <= 3; $i++)
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <img src="https://randomuser.me/api/portraits/{{ $i % 2 == 0 ? 'women' : 'men' }}/{{ 20 + $i }}.jpg" alt="Reviewer">
                            <div>
                                <h4>{{ ['Sarah Johnson', 'Michael Chen', 'Emily Rodriguez'][$i-1] }}</h4>
                                <p>{{ rand(1, 12) }} months ago</p>
                            </div>
                        </div>
                        <div class="review-rating">
                            @for($j = 1; $j <= 5; $j++)
                            <i class="fa-solid fa-star {{ $j <= 5 ? 'active' : '' }}"></i>
                            @endfor
                        </div>
                    </div>
                    <p class="review-text">
                        "{{ ['This course exceeded my expectations! The instructor explains complex topics in an easy-to-understand way. Highly recommended!', 
                            'Great content and excellent production quality. The projects really helped solidify my understanding.',
                            'One of the best courses I\'ve taken. The curriculum is well-structured and the instructor is very knowledgeable.'][$i-1] }}"
                    </p>
                </div>
                @endfor
            </div>
        </div>

        <!-- Related Courses -->
        @if(isset($relatedCourses) && $relatedCourses->count() > 0)
        <div class="related-courses content-card">
            <div class="card-header">
                <h2><i class="fa-solid fa-layer-group"></i> Related Courses</h2>
                <a href="{{ route('student.dashboard', ['category' => strtolower($course->category->name ?? '')]) }}" style="color: var(--brand-main); text-decoration: none;">View all →</a>
            </div>
            
            <div class="related-grid">
                @foreach($relatedCourses as $related)
                <div class="related-course-item">
                    <img src="{{ $related->image 
                                ? asset('storage/' . $related->image) 
                                : 'https://via.placeholder.com/300x160/141414/E44320?text=' . urlencode($related->title) }}" 
                         alt="{{ $related->title }}">
                    <div class="related-course-body">
                        <h4>{{ $related->title }}</h4>
                        <p>{{ Str::limit($related->short_description ?? $related->description, 60) }}</p>
                        <div class="related-footer">
                            @if($related->price > 0)
                                <span class="related-price">${{ number_format($related->price, 2) }}</span>
                            @else
                                <span class="related-price free">Free</span>
                            @endif
                            <a href="{{ route('courses.show', $related->id) }}" class="btn-related">View Course</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<script>
// Toggle curriculum sections
function toggleCurriculum(element) {
    const parent = element.closest('.curriculum-item');
    parent.classList.toggle('active');
    
    const icon = element.querySelector('i');
    if (parent.classList.contains('active')) {
        icon.style.transform = 'rotate(90deg)';
    } else {
        icon.style.transform = 'rotate(0deg)';
    }
}

// Toggle wishlist
function toggleWishlist(courseId, button) {
    button.classList.toggle('active');
    const icon = button.querySelector('i');
    
    if (button.classList.contains('active')) {
        icon.classList.remove('fa-regular');
        icon.classList.add('fa-solid');
        
        // Show success message
        showNotification('Added to wishlist!', 'success');
    } else {
        icon.classList.remove('fa-solid');
        icon.classList.add('fa-regular');
        
        // Show removed message
        showNotification('Removed from wishlist', 'info');
    }
    
    // Here you would typically make an AJAX call to update the wishlist
}

// Show notification
function showNotification(message, type = 'success') {
    // Create notification element
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: ${type === 'success' ? 'linear-gradient(135deg, #10b981, #059669)' : 'linear-gradient(135deg, #3b82f6, #2563eb)'};
        color: white;
        padding: 15px 25px;
        border-radius: 100px;
        font-weight: 600;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        z-index: 1000;
        animation: slideIn 0.3s ease;
    `;
    notification.textContent = message;
    
    // Add animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);
    
    // Add to body
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideIn 0.3s ease reverse';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Initialize curriculum sections
document.addEventListener('DOMContentLoaded', function() {
    // Set initial icon rotations
    document.querySelectorAll('.curriculum-item.active .curriculum-header i').forEach(icon => {
        icon.style.transform = 'rotate(90deg)';
    });
});

// Toggle user menu
function toggleUserMenu() {
    // Implement user menu dropdown if needed
    console.log('User menu clicked');
}
</script>

@endsection