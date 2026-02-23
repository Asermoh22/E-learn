@extends('layouts.app')

@section('title', 'E-Learn | Student Dashboard')

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

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, var(--surface) 0%, #1E1E1E 100%);
    border-radius: var(--card-radius);
    padding: 60px;
    position: relative;
    overflow: hidden;
    margin-bottom: 50px;
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

.hero-section::before {
    content: "";
    position: absolute;
    top: -50%;
    right: -10%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(228,67,32,0.2) 0%, transparent 70%);
    border-radius: 50%;
}

.hero-section::after {
    content: "";
    position: absolute;
    left: 0;
    top: 50px;
    bottom: 50px;
    width: 6px;
    background: var(--brand-gradient);
    border-radius: 0 10px 10px 0;
}

.hero-content {
    position: relative;
    z-index: 1;
    max-width: 600px;
}

.hero-badge {
    background: rgba(228,67,32,0.1);
    color: var(--brand-main);
    padding: 8px 16px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    border: 1px solid rgba(228,67,32,0.2);
}

.hero-section h1 {
    font-size: 48px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 20px;
    letter-spacing: -2px;
}

.hero-section h1 span {
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    position: relative;
}

.hero-section p {
    color: var(--text-muted);
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 30px;
}

.hero-stats {
    display: flex;
    gap: 40px;
}

.stat-item h3 {
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 5px;
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.stat-item p {
    font-size: 14px;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-muted);
}

/* Filter Section */
.filter-section {
    margin-bottom: 40px;
    animation: fadeInUp 0.8s ease-out;
}

.filter-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 20px;
}

.filter-header h2 {
    font-size: 24px;
    font-weight: 700;
}

.filter-header h2 span {
    color: var(--brand-main);
    font-size: 16px;
    margin-left: 10px;
    background: rgba(228,67,32,0.1);
    padding: 4px 12px;
    border-radius: 100px;
}

.filter-tabs {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 12px 24px;
    border-radius: 100px;
    border: 1px solid var(--border-color);
    background: transparent;
    color: var(--text-muted);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.filter-btn i {
    font-size: 16px;
}

.filter-btn:hover {
    background: rgba(228,67,32,0.1);
    color: var(--brand-main);
    border-color: var(--brand-main);
}

.filter-btn.active {
    background: var(--brand-gradient);
    color: white;
    border-color: transparent;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
}

/* Course Stats Bar */
.course-stats-bar {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.stat-card {
    background: var(--surface);
    padding: 20px 25px;
    border-radius: 24px;
    display: flex;
    align-items: center;
    gap: 15px;
    border: 1px solid var(--border-color);
    flex: 1;
    min-width: 200px;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    border-color: var(--brand-main);
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
    font-size: 20px;
}

.stat-info h4 {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 5px;
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.stat-info p {
    color: var(--text-muted);
    font-size: 13px;
    font-weight: 500;
}

/* Course Grid Section */
.course-grid-section {
    margin-top: 30px;
    animation: fadeInUp 1s ease-out;
}

.course-grid-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 20px;
}

.course-grid-header h3 {
    font-size: 18px;
    font-weight: 500;
    color: var(--text-muted);
}

.sort-select {
    background: var(--surface);
    color: var(--text-main);
    border: 1px solid var(--border-color);
    padding: 12px 24px;
    border-radius: 100px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    outline: none;
    transition: all 0.3s ease;
}

.sort-select:hover {
    border-color: var(--brand-main);
}

.sort-select:focus {
    border-color: var(--brand-main);
    box-shadow: 0 0 0 4px rgba(228,67,32,0.1);
}

/* Course Grid */
.course-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 30px;
}

.course-item {
    background: var(--surface);
    border-radius: 28px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid var(--border-color);
    position: relative;
    animation: fadeInUp 0.6s ease-out;
}

.course-item:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(228,67,32,0.3);
}

.course-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: var(--brand-gradient);
    color: white;
    padding: 6px 14px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 700;
    z-index: 1;
    box-shadow: 0 5px 15px rgba(228,67,32,0.3);
    display: flex;
    align-items: center;
    gap: 6px;
}

.course-thumb {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
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
    padding: 4px 12px;
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
    transition: width 0.3s ease;
}

.course-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid var(--border-color);
}

.instructor {
    display: flex;
    align-items: center;
    gap: 8px;
}

.instructor-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: var(--brand-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 600;
    color: white;
}

.instructor img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--brand-main);
}

.instructor span {
    font-size: 13px;
    color: var(--text-muted);
}

.course-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.course-price {
    font-weight: 700;
    color: var(--brand-main);
    font-size: 18px;
}

.course-price.free {
    color: #10b981;
}

.btn-course {
    background: transparent;
    color: var(--text-main);
    padding: 8px 16px;
    border-radius: 100px;
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-course:hover {
    background: var(--brand-main);
    border-color: var(--brand-main);
    color: white;
    transform: translateY(-2px);
}

.btn-wishlist {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: transparent;
    border: 1px solid var(--border-color);
    color: var(--text-muted);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-wishlist:hover {
    background: rgba(228,67,32,0.1);
    border-color: var(--brand-main);
    color: var(--brand-main);
    transform: scale(1.1);
}

.btn-wishlist.active {
    background: var(--brand-main);
    color: white;
    border-color: var(--brand-main);
}

/* No Results */
.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 40px;
    background: var(--surface);
    border-radius: var(--card-radius);
    border: 1px solid var(--border-color);
}

.no-results i {
    font-size: 64px;
    color: var(--text-muted);
    margin-bottom: 20px;
    opacity: 0.5;
}

.no-results h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.no-results p {
    color: var(--text-muted);
    font-size: 16px;
    margin-bottom: 20px;
}

/* Responsive */
@media (max-width: 992px) {
    .search-bar {
        display: none;
    }
    
    .course-grid {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    }
}

@media (max-width: 768px) {
    .main-layout {
        padding: 20px;
    }
    
    .hero-section {
        padding: 40px 30px;
    }
    
    .hero-section h1 {
        font-size: 36px;
    }
    
    .hero-stats {
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .filter-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .course-grid-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .sort-select {
        width: 100%;
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
    
    .hero-section h1 {
        font-size: 28px;
    }
    
    .stat-card {
        min-width: 100%;
    }
}
</style>

<div class="main-layout">
    <!-- Navbar -->
    <nav class="nav-bar">
        <div class="brand">E-Learn</div>
        <div class="search-bar">
            <i class="fa-solid fa-search"></i>
            <input type="text" id="searchInput" placeholder="Search for courses..." onkeyup="searchCourses()">
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <span class="hero-badge">
                <i class="fa-solid fa-bolt"></i> 
                LIMITED TIME OFFER
            </span>
            <h1>Upskill Your Future <span>Today</span></h1>
            <p>Access {{ $total }}+ expert-led courses with interactive projects and get certified in high-demand fields.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <h3>{{ $total }}+</h3>
                    <p>Courses</p>
                </div>
                <div class="stat-item">
                    <h3>{{ $totalstu }}k+</h3>
                    <p>Students</p>
                </div>
                <div class="stat-item">
                    <h3>98%</h3>
                    <p>Satisfaction</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="filter-header">
            <h2>Browse Courses <span id="courseCount">({{ $total }} Courses)</span></h2>
            <div class="filter-tabs">
    <a href="{{ route('student.dashboard', ['category' => 'all']) }}" class="filter-btn {{ ($categoryFilter ?? 'all') === 'all' ? 'active' : '' }}">
        <i class="fa-solid fa-layer-group"></i> All Courses
    </a>
    @foreach($categories as $category)
    <a href="{{ route('student.dashboard', ['category' => strtolower($category->name)]) }}" 
       class="filter-btn {{ ($categoryFilter ?? '') === strtolower($category->name) ? 'active' : '' }}">
        <i class="fa-solid fa-{{ $category->icon ?? 'folder' }}"></i> {{ $category->name }}
    </a>
    @endforeach
</div>

        <!-- Course Stats -->
        <div class="course-stats-bar">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-video"></i></div>
                <div class="stat-info">
                    <h4 id="totalCourses">{{ $total }}</h4>
                    <p>Total Courses</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
                <div class="stat-info">
                    <h4>{{ $totalhours }}+</h4>
                    <p>Learning Hours</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-certificate"></i></div>
                <div class="stat-info">
                    <h4>50+</h4>
                    <p>Certifications</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Grid Section -->
    <section class="course-grid-section">
        <div class="course-grid-header">
            <h3 id="resultsText">Showing all courses</h3>
            <select class="sort-select" id="sortSelect" onchange="sortCourses(this.value)">
                <option value="default">Sort by: Featured</option>
                <option value="price-low">Price: Low to High</option>
                <option value="price-high">Price: High to Low</option>
                <option value="rating">Highest Rated</option>
                <option value="newest">Newest First</option>
            </select>
        </div>

        <div class="course-grid" id="courseGrid">
            @forelse ($courses as $course)
            <div class="course-item" 
                 data-category="{{ strtolower($course->category->name ?? 'general') }}"
                 data-price="{{ $course->price }}"
                 data-rating="{{ $course->rating ?? 0 }}"
                 data-date="{{ $course->created_at }}"
                 data-title="{{ $course->title }}">
                
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

                <img src="{{ $course->image 
                            ? asset('storage/' . $course->image) 
                            : asset('images/default-course.jpg') }}" 
                     class="course-thumb" 
                     alt="{{ $course->title }}"
                     onerror="this.src='https://via.placeholder.com/400x200/141414/E44320?text={{ urlencode($course->title) }}'">               

                <div class="course-body">
                    <div class="course-meta">
                        <span class="course-category">
                            <i class="fa-regular fa-folder"></i> 
                            {{ $course->category->name ?? 'Uncategorized' }}
                        </span>
                        <div class="course-stats">
                            <span><i class="fa-regular fa-eye"></i> {{ number_format($course->views ?? 0) }}</span>
                            <span><i class="fa-regular fa-star"></i> {{ number_format($course->rating ?? 0, 1) }}</span>
                        </div>
                    </div>
                    
                    <h4>{{ $course->title }}</h4>
                    <p>{{ Str::limit($course->description, 100) }}</p>
                    
                    @if($course->lessons_count)
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $course->progress ?? rand(0,100) }}%"></div>
                    </div>
                    @endif
                    
                    <div class="course-footer">
                        <div class="instructor">
                            @if($course->instructor && $course->instructor->user)
                                @if($course->instructor->avatar)
                                    <img src="{{ asset('storage/' . $course->instructor->avatar) }}" 
                                         alt="{{ $course->instructor->user->name }}">
                                @else
                                    <div class="instructor-avatar">
                                        {{ strtoupper(substr($course->instructor->user->name, 0, 1)) }}
                                    </div>
                                @endif
                                <span>{{ $course->instructor->user->name }}</span>
                            @else
                                <div class="instructor-avatar">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <span>E-Learn Team</span>
                            @endif
                        </div>
                        
                        <div class="course-actions">
                            @if($course->price > 0)
                                <span class="course-price">${{ number_format($course->price, 2) }}</span>
                            @else
                                <span class="course-price free">Free</span>
                            @endif
                            
                            <a href="" class="btn-course">
                                <i class="fa-regular fa-eye"></i> View
                            </a>
                            
                            <button class="btn-wishlist" onclick="toggleWishlist({{ $course->id }}, this)" 
                                    title="Add to wishlist">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="no-results">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h3>No courses found</h3>
                <p>There are no courses available at the moment. Please check back later.</p>
                @if(request()->has('search') || request()->has('category'))
                    <a href="{{ route('student.dashboard') }}" class="btn-pro">
                        <i class="fa-solid fa-rotate"></i> Clear Filters
                    </a>
                @endif
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($courses, 'links'))
        <div class="pagination-wrapper" style="margin-top: 50px; display: flex; justify-content: center;">
            {{ $courses->links() }}
        </div>
        @endif
    </section>
</div>



@endsection