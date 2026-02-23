@extends('layouts.app')

@section('title', 'E-Learn | Instructor - ' . $course->title)

@section('content')

<!-- Google Font: Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Chart.js for analytics -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- SortableJS for drag and drop -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

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
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
    --info: #3b82f6;
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

/* Instructor Specific Nav */
.instructor-badge {
    background: rgba(228,67,32,0.1);
    color: var(--brand-main);
    padding: 8px 18px;
    border-radius: 100px;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    border: 1px solid rgba(228,67,32,0.2);
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

/* Breadcrumb with Actions */
.breadcrumb-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 20px;
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: 10px;
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

.action-buttons {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.btn-action {
    padding: 12px 24px;
    border-radius: 100px;
    font-weight: 600;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
}

.btn-action.primary {
    background: var(--brand-gradient);
    color: white;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
}

.btn-action.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(228,67,32,0.4);
}

.btn-action.secondary {
    background: transparent;
    border: 1px solid var(--border-color);
    color: var(--text-main);
}

.btn-action.secondary:hover {
    border-color: var(--brand-main);
    color: var(--brand-main);
}

.btn-action.warning {
    background: rgba(239,68,68,0.1);
    color: var(--danger);
    border: 1px solid rgba(239,68,68,0.2);
}

.btn-action.warning:hover {
    background: rgba(239,68,68,0.2);
    border-color: var(--danger);
}

/* Course Header - Instructor Version */
.instructor-course-header {
    background: linear-gradient(135deg, var(--surface) 0%, #1E1E1E 100%);
    border-radius: var(--card-radius);
    padding: 40px;
    position: relative;
    overflow: hidden;
    margin-bottom: 40px;
    border: 1px solid var(--border-color);
}

.header-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    position: relative;
    z-index: 1;
}

.header-left .course-status {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.status-badge {
    padding: 8px 18px;
    border-radius: 100px;
    font-size: 13px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.status-badge.published {
    background: rgba(16,185,129,0.1);
    color: var(--success);
    border: 1px solid rgba(16,185,129,0.2);
}

.status-badge.draft {
    background: rgba(245,158,11,0.1);
    color: var(--warning);
    border: 1px solid rgba(245,158,11,0.2);
}

.status-badge.review {
    background: rgba(59,130,246,0.1);
    color: var(--info);
    border: 1px solid rgba(59,130,246,0.2);
}

.header-left h1 {
    font-size: 42px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 15px;
    letter-spacing: -1px;
}

.header-left h1 i {
    color: var(--brand-main);
    font-size: 32px;
    margin-left: 10px;
}

.course-meta-tags {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 25px;
}

.meta-tag {
    background: rgba(255,255,255,0.03);
    padding: 8px 16px;
    border-radius: 100px;
    font-size: 13px;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 8px;
    border: 1px solid var(--border-color);
}

.header-right {
    background: var(--surface-light);
    border-radius: 28px;
    padding: 25px;
    border: 1px solid var(--border-color);
}

.quick-stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.quick-stat-item {
    text-align: center;
    padding: 15px;
    background: rgba(255,255,255,0.02);
    border-radius: 20px;
}

.quick-stat-value {
    font-size: 32px;
    font-weight: 800;
    color: var(--brand-main);
    margin-bottom: 5px;
}

.quick-stat-label {
    color: var(--text-muted);
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Analytics Dashboard */
.analytics-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
    margin-bottom: 40px;
}

.analytics-card {
    background: var(--surface);
    border-radius: 24px;
    padding: 25px;
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.analytics-card:hover {
    transform: translateY(-5px);
    border-color: var(--brand-main);
}

.analytics-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.analytics-icon {
    width: 50px;
    height: 50px;
    background: rgba(228,67,32,0.1);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-main);
    font-size: 20px;
}

.analytics-trend {
    font-size: 13px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 100px;
}

.analytics-trend.up {
    background: rgba(16,185,129,0.1);
    color: var(--success);
}

.analytics-trend.down {
    background: rgba(239,68,68,0.1);
    color: var(--danger);
}

.analytics-value {
    font-size: 36px;
    font-weight: 800;
    margin-bottom: 5px;
}

.analytics-label {
    color: var(--text-muted);
    font-size: 14px;
}

/* Tab Navigation */
.instructor-tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
    border-bottom: 1px solid var(--border-color);
    padding-bottom: 20px;
    overflow-x: auto;
}

.tab-btn {
    padding: 12px 28px;
    border-radius: 100px;
    background: transparent;
    border: 1px solid var(--border-color);
    color: var(--text-muted);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 8px;
}

.tab-btn:hover {
    border-color: var(--brand-main);
    color: var(--brand-main);
}

.tab-btn.active {
    background: var(--brand-gradient);
    color: white;
    border-color: transparent;
}

/* Content Sections */
.content-section {
    display: none;
    animation: fadeIn 0.5s ease;
}

.content-section.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.section-card {
    background: var(--surface);
    border-radius: 28px;
    padding: 30px;
    border: 1px solid var(--border-color);
    margin-bottom: 30px;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.section-header h2 {
    font-size: 24px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-header h2 i {
    color: var(--brand-main);
}

/* Curriculum Management */
.curriculum-editor {
    border: 1px solid var(--border-color);
    border-radius: 20px;
    overflow: hidden;
}

.curriculum-section-item {
    border-bottom: 1px solid var(--border-color);
}

.curriculum-section-header {
    padding: 20px;
    background: rgba(255,255,255,0.02);
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
}

.section-title {
    display: flex;
    align-items: center;
    gap: 15px;
    flex: 1;
}

.section-title .drag-handle {
    color: var(--text-muted);
    cursor: move;
}

.section-title .drag-handle:hover {
    color: var(--brand-main);
}

.section-title-text {
    font-weight: 600;
    color: var(--text-main);
}

.section-title-input {
    background: transparent;
    border: 1px solid var(--border-color);
    color: var(--text-main);
    font-size: 16px;
    font-weight: 600;
    padding: 8px 12px;
    border-radius: 8px;
    width: 100%;
    max-width: 400px;
}

.section-title-input:focus {
    outline: none;
    border-color: var(--brand-main);
    background: rgba(255,255,255,0.05);
}

.section-actions {
    display: flex;
    gap: 10px;
}

.btn-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 1px solid var(--border-color);
    background: transparent;
    color: var(--text-muted);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-icon:hover {
    border-color: var(--brand-main);
    color: var(--brand-main);
    transform: scale(1.1);
}

.btn-icon.danger:hover {
    border-color: var(--danger);
    color: var(--danger);
}

.lecture-list {
    padding: 0 20px 20px 50px;
    display: none;
}

.curriculum-section-item.active .lecture-list {
    display: block;
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
    flex: 1;
}

.lecture-info i {
    color: var(--brand-main);
    width: 20px;
}

.lecture-info span {
    color: var(--text-main);
}

.lecture-meta {
    display: flex;
    align-items: center;
    gap: 15px;
}

.lecture-duration {
    display: flex;
    align-items: center;
    gap: 5px;
    color: var(--text-muted);
    font-size: 14px;
}

.add-lecture-btn {
    margin-left: 32px;
    padding: 12px;
    background: transparent;
    border: 1px dashed var(--border-color);
    border-radius: 12px;
    color: var(--text-muted);
    width: calc(100% - 32px);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 15px;
}

.add-lecture-btn:hover {
    border-color: var(--brand-main);
    color: var(--brand-main);
}

/* Students List */
.students-table {
    width: 100%;
    border-collapse: collapse;
}

.students-table th {
    text-align: left;
    padding: 15px;
    color: var(--text-muted);
    font-weight: 600;
    font-size: 13px;
    border-bottom: 1px solid var(--border-color);
}

.students-table td {
    padding: 15px;
    border-bottom: 1px solid var(--border-color);
}

.student-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.student-info img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.progress-badge {
    padding: 4px 12px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 600;
}

.progress-badge.completed {
    background: rgba(16,185,129,0.1);
    color: var(--success);
}

.progress-badge.in-progress {
    background: rgba(245,158,11,0.1);
    color: var(--warning);
}

/* Settings Form */
.settings-form {
    max-width: 800px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    color: var(--text-muted);
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 15px 20px;
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    color: var(--text-main);
    font-size: 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--brand-main);
    box-shadow: 0 0 0 4px rgba(228,67,32,0.1);
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

/* Chart Container */
.chart-container {
    height: 300px;
    margin-top: 20px;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.8);
    z-index: 1000;
    align-items: center;
    justify-content: center;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: var(--surface);
    border-radius: 28px;
    padding: 30px;
    width: 500px;
    max-width: 90%;
    border: 1px solid var(--border-color);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.modal-header h3 {
    font-size: 24px;
    font-weight: 700;
}

.modal-close {
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 24px;
    cursor: pointer;
}

.modal-close:hover {
    color: var(--brand-main);
}

.modal-footer {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    margin-top: 20px;
}

/* Responsive */
@media (max-width: 1200px) {
    .analytics-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .header-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 992px) {
    .main-layout {
        padding: 20px;
    }
}

@media (max-width: 768px) {
    .analytics-grid {
        grid-template-columns: 1fr;
    }
    
    .breadcrumb-bar {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .instructor-tabs {
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 10px;
    }
}

@media (max-width: 480px) {
    .user-menu {
        gap: 10px;
    }
    
    .action-buttons {
        width: 100%;
    }
    
    .btn-action {
        flex: 1;
        justify-content: center;
    }
}
</style>

<div class="main-layout">
    <!-- Navbar with Instructor Badge -->
    <nav class="nav-bar">
        <div class="brand">E-Learn</div>
        <div class="instructor-badge">
            <i class="fa-solid fa-chalkboard-user"></i>
            Instructor Dashboard
        </div>
        <div class="user-menu">
            <div class="user-pill">
                <img src="{{ Auth::user()->profile_photo ?? asset('images/default-profile.png') }}" alt="Profile">
                <span>{{ Auth::user()->name }}</span>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb with Actions -->
    <div class="breadcrumb-bar">
        <div class="breadcrumb">
            <a href="{{ route('instructor.dashboard') }}">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="">My Courses</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>{{ $course->title }}</span>
        </div>
        
        <div class="action-buttons">
            <a href="" class="btn-action secondary" target="_blank">
                <i class="fa-regular fa-eye"></i> Preview
            </a>
            <a href="" class="btn-action primary">
                <i class="fa-regular fa-pen-to-square"></i> Edit Course
            </a>
            @if($course->status == 'draft')
            <button class="btn-action primary" onclick="publishCourse({{ $course->id }})">
                <i class="fa-regular fa-circle-check"></i> Publish
            </button>
            @else
            <button class="btn-action warning" onclick="unpublishCourse({{ $course->id }})">
                <i class="fa-regular fa-circle-pause"></i> Unpublish
            </button>
            @endif
        </div>
    </div>

    <!-- Instructor Course Header -->
    <div class="instructor-course-header">
        <div class="header-grid">
            <div class="header-left">
                <div class="course-status">
                    <span class="status-badge {{ $course->status == 'published' ? 'published' : ($course->status == 'draft' ? 'draft' : 'review') }}">
                        <i class="fa-regular fa-{{ $course->status == 'published' ? 'circle-check' : ($course->status == 'draft' ? 'file-lines' : 'clock') }}"></i>
                        {{ ucfirst($course->status) }}
                    </span>
                    <span class="status-badge" style="background: rgba(228,67,32,0.1); color: var(--brand-main);">
                        <i class="fa-regular fa-star"></i> {{ number_format($course->rating ?? 4.8, 1) }} Rating
                    </span>
                </div>
                
                <h1>
                    {{ $course->title }}
                    <i class="fa-regular fa-pen-to-square" onclick="editTitle({{ $course->id }})" style="cursor: pointer; font-size: 24px;"></i>
                </h1>
                
                <div class="course-meta-tags">
                    <span class="meta-tag"><i class="fa-regular fa-folder"></i> {{ $course->category->name ?? 'Uncategorized' }}</span>
                    <span class="meta-tag"><i class="fa-regular fa-signal"></i> {{ $course->level ?? 'Beginner' }}</span>
                    <span class="meta-tag"><i class="fa-regular fa-language"></i> {{ $course->language ?? 'English' }}</span>
                    <span class="meta-tag"><i class="fa-regular fa-clock"></i> Updated {{ $course->updated_at->diffForHumans() }}</span>
                </div>
                
                <div style="color: var(--text-muted); line-height: 1.7;">
                    {{ Str::limit($course->description, 200) }}
                </div>
            </div>
            
            <div class="header-right">
                <div class="quick-stats">
                    <div class="quick-stat-item">
                        <div class="quick-stat-value">{{ number_format($course->enrollments_count ?? 1234) }}</div>
                        <div class="quick-stat-label">Students</div>
                    </div>
                    <div class="quick-stat-item">
                        <div class="quick-stat-value">${{ number_format($course->revenue ?? 45678) }}</div>
                        <div class="quick-stat-label">Revenue</div>
                    </div>
                    <div class="quick-stat-item">
                        <div class="quick-stat-value">{{ $course->sections_count ?? 0 }}</div>
                        <div class="quick-stat-label">Sections</div>
                    </div>
                    <div class="quick-stat-item">
                        <div class="quick-stat-value">{{ $course->lectures_count ?? 0 }}</div>
                        <div class="quick-stat-label">Lectures</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Dashboard -->
    <div class="analytics-grid">
        <div class="analytics-card">
            <div class="analytics-header">
                <div class="analytics-icon"><i class="fa-regular fa-users"></i></div>
                <span class="analytics-trend up"><i class="fa-regular fa-arrow-up"></i> +12%</span>
            </div>
            <div class="analytics-value">{{ number_format($enrollments_this_month ?? 234) }}</div>
            <div class="analytics-label">New students this month</div>
        </div>
        
        <div class="analytics-card">
            <div class="analytics-header">
                <div class="analytics-icon"><i class="fa-regular fa-chart-line"></i></div>
                <span class="analytics-trend up"><i class="fa-regular fa-arrow-up"></i> +8%</span>
            </div>
            <div class="analytics-value">{{ number_format($completion_rate ?? 78) }}%</div>
            <div class="analytics-label">Completion rate</div>
        </div>
        
        <div class="analytics-card">
            <div class="analytics-header">
                <div class="analytics-icon"><i class="fa-regular fa-star"></i></div>
                <span class="analytics-trend up"><i class="fa-regular fa-arrow-up"></i> +0.3</span>
            </div>
            <div class="analytics-value">{{ number_format($course->rating ?? 4.8, 1) }}</div>
            <div class="analytics-label">Average rating</div>
        </div>
        
        <div class="analytics-card">
            <div class="analytics-header">
                <div class="analytics-icon"><i class="fa-regular fa-clock"></i></div>
                <span class="analytics-trend down"><i class="fa-regular fa-arrow-down"></i> -5%</span>
            </div>
            <div class="analytics-value">{{ $average_watch_time ?? '4.2' }}h</div>
            <div class="analytics-label">Avg. watch time</div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="instructor-tabs">
        <button class="tab-btn active" onclick="switchTab('curriculum')">
            <i class="fa-regular fa-list-ul"></i> Curriculum
        </button>
        <button class="tab-btn" onclick="switchTab('students')">
            <i class="fa-regular fa-users"></i> Students ({{ $course->enrollments_count ?? 1234 }})
        </button>
        <button class="tab-btn" onclick="switchTab('analytics')">
            <i class="fa-regular fa-chart-bar"></i> Analytics
        </button>
        <button class="tab-btn" onclick="switchTab('reviews')">
            <i class="fa-regular fa-star"></i> Reviews ({{ $course->reviews_count ?? 89 }})
        </button>
        <button class="tab-btn" onclick="switchTab('settings')">
            <i class="fa-regular fa-gear"></i> Settings
        </button>
        <button class="tab-btn" onclick="switchTab('promotions')">
            <i class="fa-regular fa-tag"></i> Promotions
        </button>
    </div>

    <!-- Curriculum Tab -->
    <div id="curriculum" class="content-section active">
        <div class="section-card">
            <div class="section-header">
                <h2><i class="fa-regular fa-list-ul"></i> Course Curriculum</h2>
                <button class="btn-action primary" onclick="openAddSectionModal()">
                    <i class="fa-regular fa-plus"></i> Add Section
                </button>
            </div>
            
            <div class="curriculum-editor" id="curriculumContainer">
                @forelse($course->sections ?? [] as $section)
                <div class="curriculum-section-item" data-section-id="{{ $section->id }}" data-order="{{ $section->order ?? $loop->index }}">
                    <div class="curriculum-section-header">
                        <div class="section-title">
                            <i class="fa-regular fa-grip-vertical drag-handle"></i>
                            <span class="section-title-text">{{ $section->title }}</span>
                            <input type="text" class="section-title-input" value="{{ $section->title }}" style="display: none;">
                        </div>
                        <div class="section-actions">
                            <button class="btn-icon" onclick="editSection({{ $section->id }}, this)"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="btn-icon" onclick="duplicateSection({{ $section->id }})"><i class="fa-regular fa-copy"></i></button>
                            <button class="btn-icon danger" onclick="deleteSection({{ $section->id }})"><i class="fa-regular fa-trash-can"></i></button>
                            <button class="btn-icon toggle-section"><i class="fa-regular fa-chevron-down"></i></button>
                        </div>
                    </div>
                    
                    <div class="lecture-list">
                        @forelse($section->lectures ?? [] as $lecture)
                        <div class="lecture-item">
                            <div class="lecture-info">
                                <i class="fa-regular fa-grip-vertical" style="color: var(--text-muted); cursor: move;"></i>
                                <i class="fa-regular fa-circle-play"></i>
                                <span>{{ $lecture->title }}</span>
                            </div>
                            <div class="lecture-meta">
                                <div class="lecture-duration">
                                    <i class="fa-regular fa-clock"></i>
                                    <span>{{ $lecture->duration ?? '10:00' }}</span>
                                </div>
                                <button class="btn-icon"><i class="fa-regular fa-pen-to-square"></i></button>
                                <button class="btn-icon danger"><i class="fa-regular fa-trash-can"></i></button>
                            </div>
                        </div>
                        @empty
                        <div class="lecture-item">
                            <div class="lecture-info">
                                <i class="fa-regular fa-circle-info"></i>
                                <span style="color: var(--text-muted);">No lectures yet. Click "Add Lecture" to create one.</span>
                            </div>
                        </div>
                        @endforelse
                        
                        <button class="add-lecture-btn" onclick="openAddLectureModal({{ $section->id }})">
                            <i class="fa-regular fa-plus"></i> Add Lecture
                        </button>
                    </div>
                </div>
                @empty
                <div style="padding: 50px; text-align: center; color: var(--text-muted);">
                    <i class="fa-regular fa-layer-group" style="font-size: 48px; margin-bottom: 20px;"></i>
                    <h3>No Sections Yet</h3>
                    <p>Start building your course by adding your first section.</p>
                    <button class="btn-action primary" onclick="openAddSectionModal()" style="margin-top: 20px;">
                        <i class="fa-regular fa-plus"></i> Add First Section
                    </button>
                </div>
                @endforelse
            </div>
            
            <div style="margin-top: 30px; display: flex; gap: 15px; justify-content: flex-end;">
                <button class="btn-action secondary" onclick="previewCurriculum()">
                    <i class="fa-regular fa-eye"></i> Preview
                </button>
            </div>
        </div>
    </div>

    <!-- Students Tab -->
    <div id="students" class="content-section">
        <div class="section-card">
            <div class="section-header">
                <h2><i class="fa-regular fa-users"></i> Enrolled Students</h2>
                <div style="display: flex; gap: 15px;">
                    <input type="text" class="form-control" id="searchStudents" placeholder="Search students..." style="width: 250px;">
                    <button class="btn-action secondary" onclick="exportStudents()">
                        <i class="fa-regular fa-download"></i> Export
                    </button>
                </div>
            </div>
            
            <table class="students-table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Enrolled Date</th>
                        <th>Progress</th>
                        <th>Last Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="studentsTableBody">
                    {{-- @forelse($enrolled_students ?? [] as $student)
                    <tr>
                        <td>
                            <div class="student-info">
                                <img src="{{ $student->avatar ?? 'https://randomuser.me/api/portraits/men/1.jpg' }}" alt="">
                                <div>
                                    <div style="font-weight: 600;">{{ $student->name }}</div>
                                    <div style="color: var(--text-muted); font-size: 12px;">{{ $student->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $student->enrolled_at ?? '2024-01-15' }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 100px; height: 6px; background: rgba(255,255,255,0.1); border-radius: 100px;">
                                    <div style="width: {{ $student->progress ?? 75 }}%; height: 100%; background: var(--brand-gradient); border-radius: 100px;"></div>
                                </div>
                                <span class="progress-badge {{ ($student->progress ?? 75) >= 100 ? 'completed' : 'in-progress' }}">
                                    {{ $student->progress ?? 75 }}%
                                </span>
                            </div>
                        </td>
                        <td>{{ $student->last_active ?? '2 hours ago' }}</td>
                        <td>
                            <button class="btn-icon" onclick="messageStudent({{ $student->id }})"><i class="fa-regular fa-message"></i></button>
                            <button class="btn-icon" onclick="viewStudentProgress({{ $student->id }})"><i class="fa-regular fa-chart-simple"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 50px; color: var(--text-muted);">
                            <i class="fa-regular fa-users" style="font-size: 48px; margin-bottom: 20px;"></i>
                            <h3>No Students Yet</h3>
                            <p>Once students enroll, they'll appear here.</p>
                        </td>
                    </tr>
                    @endforelse --}}
                </tbody>
            </table>
            
            <div style="margin-top: 30px; display: flex; justify-content: center;">
                <button class="btn-action secondary" onclick="loadMoreStudents()">Load More</button>
            </div>
        </div>
    </div>

    <!-- Analytics Tab -->
    <div id="analytics" class="content-section">
        <div class="section-card">
            <div class="section-header">
                <h2><i class="fa-regular fa-chart-line"></i> Performance Overview</h2>
                <select class="form-control" id="analyticsPeriod" style="width: 150px;" onchange="updateAnalytics()">
                    <option value="7">Last 7 days</option>
                    <option value="30" selected>Last 30 days</option>
                    <option value="90">Last 90 days</option>
                    <option value="365">This year</option>
                </select>
            </div>
            
            <div class="chart-container">
                <canvas id="enrollmentChart"></canvas>
            </div>
        </div>
        
        <div class="section-card">
            <div class="section-header">
                <h2><i class="fa-regular fa-chart-pie"></i> Engagement Metrics</h2>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                <div>
                    <h3 style="margin-bottom: 15px;">Video Completion</h3>
                    <div style="height: 200px;">
                        <canvas id="completionChart"></canvas>
                    </div>
                </div>
                <div>
                    <h3 style="margin-bottom: 15px;">Quiz Performance</h3>
                    <div style="height: 200px;">
                        <canvas id="quizChart"></canvas>
                    </div>
                </div>
                <div>
                    <h3 style="margin-bottom: 15px;">Traffic Sources</h3>
                    <div style="height: 200px;">
                        <canvas id="trafficChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Tab -->
    <div id="settings" class="content-section">
        <div class="section-card">
            <div class="section-header">
                <h2><i class="fa-regular fa-gear"></i> Course Settings</h2>
            </div>
            
            <form class="settings-form" id="courseSettingsForm" onsubmit="saveSettings(event)">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Course Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $course->title }}" required>
                </div>
                
                <div class="form-group">
                    <label>Course Description</label>
                    <textarea class="form-control" name="description" rows="5" required>{{ $course->description }}</textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            {{-- @foreach($categories ?? [] as $category)
                            <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                            <option value="beginner" {{ $course->level == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ $course->level == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ $course->level == 'advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Language</label>
                        <select class="form-control" name="language">
                            <option value="English" {{ $course->language == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Spanish" {{ $course->language == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                            <option value="French" {{ $course->language == 'French' ? 'selected' : '' }}>French</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Price ($)</label>
                        <input type="number" class="form-control" name="price" value="{{ $course->price }}" step="0.01" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label>Discount Price ($)</label>
                        <input type="number" class="form-control" name="discount_price" value="{{ $course->discount_price }}" step="0.01" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label>Course Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                </div>
                
                <div style="display: flex; gap: 15px; justify-content: flex-end;">
                    <button type="button" class="btn-action secondary" onclick="resetSettings()">Cancel</button>
                    <button type="submit" class="btn-action primary">Save Settings</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Promotions Tab -->
    <div id="promotions" class="content-section">
        <div class="section-card">
            <div class="section-header">
                <h2><i class="fa-regular fa-tag"></i> Promotions & Coupons</h2>
                <button class="btn-action primary" onclick="openCreateCouponModal()">
                    <i class="fa-regular fa-plus"></i> Create Coupon
                </button>
            </div>
            
            <table class="students-table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Valid Until</th>
                        <th>Usage</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse($coupons ?? [] as $coupon)
                    <tr>
                        <td><strong>{{ $coupon->code }}</strong></td>
                        <td>{{ $coupon->discount }}% OFF</td>
                        <td>{{ $coupon->valid_until }}</td>
                        <td>{{ $coupon->used }}/{{ $coupon->limit }}</td>
                        <td><span class="status-badge {{ $coupon->is_active ? 'published' : 'draft' }}">{{ $coupon->is_active ? 'Active' : 'Expired' }}</span></td>
                        <td>
                            <button class="btn-icon"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="btn-icon danger"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 50px; color: var(--text-muted);">
                            <i class="fa-regular fa-tag" style="font-size: 48px; margin-bottom: 20px;"></i>
                            <h3>No Coupons Yet</h3>
                            <p>Create coupons to promote your course.</p>
                        </td>
                    </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Section Modal -->
<div id="addSectionModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Add New Section</h3>
            <button class="modal-close" onclick="closeAddSectionModal()">&times;</button>
        </div>
        
        <form id="addSectionForm">
            @csrf
            <div class="form-group">
                <label>Section Title</label>
                <input type="text" name="title" class="form-control" placeholder="e.g., Introduction to the Course" required>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-action secondary" onclick="closeAddSectionModal()">Cancel</button>
                <button type="submit" class="btn-action primary">Create Section</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Section Modal -->
<div id="editSectionModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Section</h3>
            <button class="modal-close" onclick="closeEditSectionModal()">&times;</button>
        </div>
        
        <form id="editSectionForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit_section_id" name="section_id">
            <div class="form-group">
                <label>Section Title</label>
                <input type="text" name="title" id="edit_section_title" class="form-control" required>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-action secondary" onclick="closeEditSectionModal()">Cancel</button>
                <button type="submit" class="btn-action primary">Update Section</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteSectionModal" class="modal">
    <div class="modal-content" style="width: 400px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <i class="fa-regular fa-triangle-exclamation" style="font-size: 48px; color: var(--danger); margin-bottom: 15px;"></i>
            <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 10px;">Delete Section?</h3>
            <p style="color: var(--text-muted);">This action cannot be undone. All lectures in this section will also be deleted.</p>
        </div>
        
        <form id="deleteSectionForm">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete_section_id" name="section_id">
            
            <div style="display: flex; gap: 15px; justify-content: center;">
                <button type="button" class="btn-action secondary" onclick="closeDeleteSectionModal()">Cancel</button>
                <button type="submit" class="btn-action warning">Delete Section</button>
            </div>
        </form>
    </div>
</div>

<script>
// Tab switching
function switchTab(tabId) {
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(tabId).classList.add('active');
    
    // Initialize charts when analytics tab is shown
    if (tabId === 'analytics') {
        setTimeout(initCharts, 100);
    }
}

// Initialize Sortable for drag and drop
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('curriculumContainer');
    if (container) {
        new Sortable(container, {
            animation: 150,
            handle: '.drag-handle',
            onEnd: function() {
                saveSectionOrder();
            }
        });
    }
    
    // Toggle section content
    document.addEventListener('click', function(e) {
        if (e.target.closest('.toggle-section')) {
            const sectionItem = e.target.closest('.curriculum-section-item');
            sectionItem.classList.toggle('active');
            
            const icon = e.target.closest('.toggle-section').querySelector('i');
            if (sectionItem.classList.contains('active')) {
                icon.style.transform = 'rotate(90deg)';
            } else {
                icon.style.transform = 'rotate(0deg)';
            }
        }
    });
});

// Save section order after drag and drop


// Section Modal Functions
function openAddSectionModal() {
    document.getElementById('addSectionModal').classList.add('active');
}

function closeAddSectionModal() {
    document.getElementById('addSectionModal').classList.remove('active');
    document.getElementById('addSectionForm').reset();
}

// Handle Add Section Form


// Edit Section Functions
function editSection(sectionId, button) {
    const sectionItem = button.closest('.curriculum-section-item');
    const titleSpan = sectionItem.querySelector('.section-title-text');
    const currentTitle = titleSpan.textContent;
    
    document.getElementById('edit_section_id').value = sectionId;
    document.getElementById('edit_section_title').value = currentTitle;
    document.getElementById('editSectionModal').classList.add('active');
}

function closeEditSectionModal() {
    document.getElementById('editSectionModal').classList.remove('active');
    document.getElementById('editSectionForm').reset();
}

// Handle Edit Section Form
document.getElementById('editSectionForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const sectionId = document.getElementById('edit_section_id').value;
    
    fetch(`/instructor/sections/${sectionId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update section title in DOM
            const sectionItem = document.querySelector(`.curriculum-section-item[data-section-id="${sectionId}"]`);
            const titleSpan = sectionItem.querySelector('.section-title-text');
            titleSpan.textContent = data.section.title;
            
            showNotification(data.message, 'success');
            closeEditSectionModal();
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        showNotification('Error updating section', 'error');
        console.error('Error:', error);
    });
});

// Delete Section Functions
function deleteSection(sectionId) {
    document.getElementById('delete_section_id').value = sectionId;
    document.getElementById('deleteSectionModal').classList.add('active');
}

function closeDeleteSectionModal() {
    document.getElementById('deleteSectionModal').classList.remove('active');
}

// Handle Delete Section Form
document.getElementById('deleteSectionForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const sectionId = document.getElementById('delete_section_id').value;
    
    fetch(`/instructor/sections/${sectionId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove section from DOM
            const sectionItem = document.querySelector(`.curriculum-section-item[data-section-id="${sectionId}"]`);
            sectionItem.remove();
            
            showNotification(data.message, 'success');
            closeDeleteSectionModal();
            
            // Show empty state if no sections left
            if (document.querySelectorAll('.curriculum-section-item').length === 0) {
                location.reload(); // Reload to show empty state
            }
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        showNotification('Error deleting section', 'error');
        console.error('Error:', error);
    });
});

// Duplicate Section
function duplicateSection(sectionId) {
    fetch(`/instructor/sections/${sectionId}/duplicate`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
            showNotification('Section duplicated successfully', 'success');
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        showNotification('Error duplicating section', 'error');
        console.error('Error:', error);
    });
}

// Lecture Functions (placeholder)
function openAddLectureModal(sectionId) {
    showNotification('Add lecture functionality coming soon', 'info');
}

// Course Actions
function publishCourse(courseId) {
    if (confirm('Are you sure you want to publish this course?')) {
        fetch(`/instructor/courses/${courseId}/publish`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Course published successfully', 'success');
                setTimeout(() => location.reload(), 1500);
            }
        });
    }
}

function unpublishCourse(courseId) {
    if (confirm('Are you sure you want to unpublish this course? Students will lose access.')) {
        fetch(`/instructor/courses/${courseId}/unpublish`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Course unpublished', 'info');
                setTimeout(() => location.reload(), 1500);
            }
        });
    }
}

function editTitle(courseId) {
    const newTitle = prompt('Enter new course title:', '{{ $course->title }}');
    if (newTitle) {
        fetch(`/instructor/courses/${courseId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ title: newTitle })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector('h1').innerHTML = newTitle + ' <i class="fa-regular fa-pen-to-square" onclick="editTitle({{ $course->id }})" style="cursor: pointer; font-size: 24px;"></i>';
                showNotification('Title updated', 'success');
            }
        });
    }
}



function resetSettings() {
    if (confirm('Discard all changes?')) {
        location.reload();
    }
}

// Student Functions
function searchStudents() {
    const searchTerm = document.getElementById('searchStudents').value.toLowerCase();
    const rows = document.querySelectorAll('#studentsTableBody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
}

document.getElementById('searchStudents')?.addEventListener('input', searchStudents);



function loadMoreStudents() {
    showNotification('Loading more students...', 'info');
}

function messageStudent(studentId) {
    showNotification('Messaging feature coming soon', 'info');
}

function viewStudentProgress(studentId) {
    showNotification('Progress view coming soon', 'info');
}

// Analytics Functions
function initCharts() {
    // Destroy existing charts if any
    Chart.helpers.each(Chart.instances, function(instance) {
        instance.destroy();
    });
    
    // Enrollment Chart
    const ctx1 = document.getElementById('enrollmentChart')?.getContext('2d');
    if (ctx1) {
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Enrollments',
                    data: [65, 78, 90, 85, 95, 110, 125, 140, 155, 170, 190, 210],
                    borderColor: '#E44320',
                    backgroundColor: 'rgba(228,67,32,0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#A1A1AA' }
                    }
                },
                scales: {
                    y: {
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: { color: '#A1A1AA' }
                    },
                    x: {
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: { color: '#A1A1AA' }
                    }
                }
            }
        });
    }
    
    // Completion Chart
    const ctx2 = document.getElementById('completionChart')?.getContext('2d');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'Not Started'],
                datasets: [{
                    data: [45, 35, 20],
                    backgroundColor: ['#10b981', '#E44320', '#6B6B6B'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#A1A1AA' }
                    }
                }
            }
        });
    }
    
    // Quiz Chart
    const ctx3 = document.getElementById('quizChart')?.getContext('2d');
    if (ctx3) {
        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['Quiz 1', 'Quiz 2', 'Quiz 3', 'Quiz 4'],
                datasets: [{
                    label: 'Average Score',
                    data: [85, 78, 92, 88],
                    backgroundColor: '#E44320',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: { color: '#A1A1AA' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#A1A1AA' }
                    }
                }
            }
        });
    }
    
    // Traffic Chart
    const ctx4 = document.getElementById('trafficChart')?.getContext('2d');
    if (ctx4) {
        new Chart(ctx4, {
            type: 'pie',
            data: {
                labels: ['Direct', 'Search', 'Social', 'Email'],
                datasets: [{
                    data: [40, 30, 20, 10],
                    backgroundColor: ['#E44320', '#10b981', '#3b82f6', '#f59e0b'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#A1A1AA' }
                    }
                }
            }
        });
    }
}

function updateAnalytics() {
    const period = document.getElementById('analyticsPeriod').value;
    showNotification(`Updating analytics for last ${period} days...`, 'info');
    // Here you would fetch new data and update charts
}

// Promotions Functions
function openCreateCouponModal() {
    showNotification('Create coupon feature coming soon', 'info');
}

// Notification System
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: ${type === 'success' ? 'linear-gradient(135deg, #10b981, #059669)' : 
                     type === 'error' ? 'linear-gradient(135deg, #ef4444, #dc2626)' : 
                     'linear-gradient(135deg, #3b82f6, #2563eb)'};
        color: white;
        padding: 15px 25px;
        border-radius: 100px;
        font-weight: 600;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        z-index: 9999;
        animation: slideIn 0.3s ease;
    `;
    notification.textContent = message;
    
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideIn 0.3s ease reverse';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Close modals when clicking outside
window.addEventListener('click', function(e) {
    document.querySelectorAll('.modal.active').forEach(modal => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
});
</script>

@endsection