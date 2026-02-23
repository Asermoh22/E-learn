@extends('layouts.app')

@section('title', 'Add New Course | E-Learn')

@section('content')

<!-- Google Font: Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
    --input-bg: rgba(0, 0, 0, 0.2);
    --error-color: #ff4d4d;
    --success-color: #10b981;
    --warning-color: #f59e0b;
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

/* Toast Notification Container */
.toast-container {
    position: fixed;
    top: 30px;
    right: 30px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 15px;
    max-width: 400px;
    width: 100%;
    pointer-events: none;
}

/* Toast Notification */
.toast-notification {
    background: var(--surface-light);
    border-radius: 20px;
    padding: 16px 20px;
    box-shadow: var(--shadow-xl);
    border-left: 4px solid;
    display: flex;
    align-items: center;
    gap: 15px;
    transform: translateX(400px);
    animation: slideInRight 0.3s ease forwards, fadeOut 0.3s ease 4.7s forwards;
    pointer-events: auto;
    backdrop-filter: blur(10px);
    border: 1px solid var(--border-color);
    position: relative;
    overflow: hidden;
}

.toast-notification::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    width: 100%;
    background: rgba(255,255,255,0.1);
}

.toast-notification::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    width: 100%;
    background: currentColor;
    animation: progressBar 5s linear forwards;
}

@keyframes slideInRight {
    from {
        transform: translateX(400px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: translateX(0);
    }
    to {
        opacity: 0;
        transform: translateX(400px);
    }
}

@keyframes progressBar {
    from {
        width: 100%;
    }
    to {
        width: 0%;
    }
}

.toast-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.toast-content {
    flex: 1;
}

.toast-title {
    font-weight: 700;
    font-size: 0.95rem;
    margin-bottom: 4px;
    color: var(--text-main);
}

.toast-message {
    color: var(--text-muted);
    font-size: 0.85rem;
    line-height: 1.4;
}

.toast-close {
    color: var(--text-muted);
    cursor: pointer;
    font-size: 18px;
    transition: color 0.2s ease;
    padding: 5px;
}

.toast-close:hover {
    color: var(--text-main);
}

/* Toast Types */
.toast-error {
    border-left-color: var(--error-color);
}

.toast-error .toast-icon {
    background: rgba(255,77,77,0.1);
    color: var(--error-color);
}

.toast-error::after {
    background: var(--error-color);
}

.toast-success {
    border-left-color: var(--success-color);
}

.toast-success .toast-icon {
    background: rgba(16,185,129,0.1);
    color: var(--success-color);
}

.toast-success::after {
    background: var(--success-color);
}

.toast-warning {
    border-left-color: var(--warning-color);
}

.toast-warning .toast-icon {
    background: rgba(245,158,11,0.1);
    color: var(--warning-color);
}

.toast-warning::after {
    background: var(--warning-color);
}

/* Background Effects */
.background-glow {
    position: fixed;
    top: -30%;
    right: -10%;
    width: 800px;
    height: 800px;
    background: radial-gradient(circle, rgba(228,67,32,0.2) 0%, transparent 70%);
    border-radius: 50%;
    z-index: -1;
    pointer-events: none;
}

.background-glow-2 {
    position: fixed;
    bottom: -30%;
    left: -10%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(228,67,32,0.15) 0%, transparent 70%);
    border-radius: 50%;
    z-index: -1;
    pointer-events: none;
}

/* Main Layout */
.main-layout {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px;
    position: relative;
    z-index: 2;
}

/* Header */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
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

.header-left {
    display: flex;
    align-items: center;
    gap: 20px;
}

.back-btn {
    width: 50px;
    height: 50px;
    border-radius: 16px;
    background: var(--surface);
    border: 1px solid var(--border-color);
    color: var(--text-muted);
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 20px;
}

.back-btn:hover {
    background: var(--brand-main);
    color: white;
    transform: translateX(-5px);
    border-color: var(--brand-main);
}

.header-title h1 {
    font-size: 2.2rem;
    font-weight: 800;
    letter-spacing: -1px;
    margin-bottom: 8px;
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.header-title p {
    color: var(--text-muted);
    font-size: 0.95rem;
}

.header-stats {
    display: flex;
    gap: 15px;
}

.stat-badge {
    background: var(--surface);
    padding: 10px 20px;
    border-radius: 100px;
    border: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    gap: 10px;
}

.stat-badge i {
    color: var(--brand-main);
    font-size: 18px;
}

.stat-badge span {
    font-weight: 600;
}

.stat-badge small {
    color: var(--text-muted);
    font-size: 0.85rem;
    margin-left: 5px;
}

/* Form Container */
.form-container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    animation: fadeInUp 0.8s ease-out;
}

/* Main Form Card */
.form-card {
    background: var(--surface);
    border-radius: var(--card-radius);
    padding: 35px;
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow-xl);
    position: relative;
    overflow: hidden;
}

.form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--brand-gradient);
}

.form-section {
    margin-bottom: 35px;
    padding-bottom: 30px;
    border-bottom: 1px solid var(--border-color);
}

.form-section:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 25px;
}

.section-title i {
    width: 40px;
    height: 40px;
    background: rgba(228,67,32,0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-main);
    font-size: 20px;
}

.section-title h2 {
    font-size: 1.3rem;
    font-weight: 700;
}

.section-title p {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin-top: 4px;
}

/* Form Groups */
.form-group {
    margin-bottom: 22px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text-main);
}

.form-group label i {
    color: var(--brand-main);
    margin-right: 8px;
    font-size: 14px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 14px 18px;
    border-radius: 16px;
    border: 1px solid var(--border-color);
    background: var(--input-bg);
    color: var(--text-main);
    font-size: 0.95rem;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.form-group textarea {
    min-height: 120px;
    resize: vertical;
    line-height: 1.6;
}

.form-group input:hover,
.form-group select:hover,
.form-group textarea:hover {
    border-color: rgba(228,67,32,0.3);
    background: rgba(255,255,255,0.02);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--brand-main);
    box-shadow: 0 0 0 4px rgba(228, 67, 32, 0.15);
    background: rgba(0,0,0,0.3);
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: var(--text-dim);
}

/* Form Row for 2 columns */
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

/* Custom Select */
.select-wrapper {
    position: relative;
}

.select-wrapper select {
    appearance: none;
    padding-right: 45px;
}

.select-wrapper i {
    position: absolute;
    right: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    pointer-events: none;
    transition: color 0.3s ease;
}

.select-wrapper:hover i {
    color: var(--brand-main);
}

/* Image Upload */
.image-upload {
    border: 2px dashed var(--border-color);
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    background: var(--input-bg);
}

.image-upload:hover {
    border-color: var(--brand-main);
    background: rgba(228,67,32,0.02);
}

.image-upload i {
    font-size: 48px;
    color: var(--brand-main);
    margin-bottom: 15px;
    opacity: 0.8;
}

.image-upload h4 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--text-main);
}

.image-upload p {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin-bottom: 15px;
}

.image-upload small {
    color: var(--text-dim);
    font-size: 0.8rem;
    display: block;
}

.image-upload input[type="file"] {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.image-preview {
    margin-top: 15px;
    max-width: 200px;
    margin-left: auto;
    margin-right: auto;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid var(--border-color);
    display: none;
}

.image-preview img {
    width: 100%;
    height: auto;
    display: block;
}

/* Sidebar Cards */
.sidebar-card {
    background: var(--surface);
    border-radius: 28px;
    padding: 25px;
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow-xl);
    margin-bottom: 25px;
    position: relative;
    overflow: hidden;
}

.sidebar-card::before {
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

.sidebar-card:hover::before {
    transform: scaleX(1);
}

.card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--border-color);
}

.card-header i {
    width: 36px;
    height: 36px;
    background: rgba(228,67,32,0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-main);
    font-size: 18px;
}

.card-header h3 {
    font-size: 1.1rem;
    font-weight: 700;
}

/* Checklist */
.checklist-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--border-color);
}

.checklist-item:last-child {
    border-bottom: none;
}

.checklist-item i {
    width: 24px;
    height: 24px;
    border-radius: 8px;
    background: rgba(16,185,129,0.1);
    color: #10b981;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

.checklist-item span {
    flex: 1;
    font-size: 0.95rem;
}

.checklist-item small {
    color: var(--text-muted);
    font-size: 0.85rem;
}

/* Price Input */
.price-input {
    position: relative;
}

.price-input i {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--brand-main);
    font-size: 18px;
}

.price-input input {
    padding-left: 45px;
}

/* Tips List */
.tip-item {
    display: flex;
    gap: 12px;
    margin-bottom: 15px;
    padding: 12px;
    background: rgba(255,255,255,0.02);
    border-radius: 12px;
}

.tip-item i {
    color: var(--brand-main);
    font-size: 18px;
    margin-top: 2px;
}

.tip-content h4 {
    font-size: 0.95rem;
    font-weight: 600;
    margin-bottom: 4px;
}

.tip-content p {
    color: var(--text-muted);
    font-size: 0.85rem;
    line-height: 1.5;
}

/* Submit Buttons */
.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

.btn-primary {
    flex: 1;
    padding: 16px 32px;
    background: var(--brand-gradient);
    color: white;
    border: none;
    border-radius: 100px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
    text-decoration: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 30px rgba(228,67,32,0.4);
}

.btn-primary i {
    font-size: 18px;
    transition: transform 0.3s ease;
}

.btn-primary:hover i {
    transform: translateX(5px);
}

.btn-secondary {
    padding: 16px 32px;
    background: transparent;
    color: var(--text-main);
    border: 1px solid var(--border-color);
    border-radius: 100px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
}

.btn-secondary:hover {
    background: rgba(255,255,255,0.03);
    border-color: var(--brand-main);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 992px) {
    .form-container {
        grid-template-columns: 1fr;
    }
    
    .header-stats {
        display: none;
    }
    
    .toast-container {
        max-width: 350px;
        right: 20px;
        top: 20px;
    }
}

@media (max-width: 768px) {
    .main-layout {
        padding: 20px;
    }
    
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .form-card {
        padding: 25px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .toast-container {
        max-width: calc(100% - 40px);
        right: 20px;
        left: 20px;
    }
}

@media (max-width: 480px) {
    .page-header h1 {
        font-size: 1.8rem;
    }
    
    .section-title {
        flex-direction: column;
        text-align: center;
        gap: 8px;
    }
    
    .checklist-item {
        flex-wrap: wrap;
    }
}
</style>

<!-- Toast Notifications Container -->
<div class="toast-container" id="toastContainer">
    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="toast-notification toast-error animate__animated animate__slideInRight" data-toast>
            <div class="toast-icon">
                <i class="fa-solid fa-circle-exclamation"></i>
            </div>
            <div class="toast-content">
                <div class="toast-title">Validation Error</div>
                <div class="toast-message">{{ $error }}</div>
            </div>
            <div class="toast-close" onclick="this.closest('[data-toast]').remove()">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        @endforeach
    @endif

    @if(session('success'))
    <div class="toast-notification toast-success animate__animated animate__slideInRight" data-toast>
        <div class="toast-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="toast-content">
            <div class="toast-title">Success</div>
            <div class="toast-message">{{ session('success') }}</div>
        </div>
        <div class="toast-close" onclick="this.closest('[data-toast]').remove()">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="toast-notification toast-error animate__animated animate__slideInRight" data-toast>
        <div class="toast-icon">
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <div class="toast-content">
            <div class="toast-title">Error</div>
            <div class="toast-message">{{ session('error') }}</div>
        </div>
        <div class="toast-close" onclick="this.closest('[data-toast]').remove()">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    @endif

    @if(session('warning'))
    <div class="toast-notification toast-warning animate__animated animate__slideInRight" data-toast>
        <div class="toast-icon">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <div class="toast-content">
            <div class="toast-title">Warning</div>
            <div class="toast-message">{{ session('warning') }}</div>
        </div>
        <div class="toast-close" onclick="this.closest('[data-toast]').remove()">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    @endif
</div>

<!-- Background Effects -->
<div class="background-glow"></div>
<div class="background-glow-2"></div>

<div class="main-layout">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <a href="{{ route('instructor.dashboard') }}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="header-title">
                <h1>Create New Course</h1>
                <p>Share your knowledge with the world</p>
            </div>
        </div>
        <div class="header-stats">
            <div class="stat-badge">
                <i class="fa-regular fa-clock"></i>
                <span>Draft <small>not published</small></span>
            </div>
            <div class="stat-badge">
                <i class="fa-regular fa-bookmark"></i>
                <span>New Course</span>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data" id="courseForm">
        @csrf
        
        <div class="form-container">
            <!-- Left Column - Main Form -->
            <div class="form-card">
                <!-- Basic Information Section -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fa-solid fa-info-circle"></i>
                        <div>
                            <h2>Basic Information</h2>
                            <p>Tell students what your course is about</p>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <label>
                            <i class="fa-solid fa-heading"></i>
                            Course Title
                        </label>
                        <input type="text" 
                               name="title" 
                               value="{{ old('title') }}"
                               required 
                               placeholder="e.g., Complete Web Development Bootcamp 2024"
                               maxlength="255"
                               class="@error('title') is-invalid @enderror">
                        @error('title')
                            <div class="error-message" style="display: none;"></div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label>
                            <i class="fa-solid fa-align-left"></i>
                            Course Description
                        </label>
                        <textarea name="description" 
                                  required 
                                  placeholder="Describe what students will learn, course requirements, and who this course is for..."
                                  class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="error-message" style="display: none;"></div>
                        @enderror
                    </div>

                    <!-- Category and Level Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>
                                <i class="fa-solid fa-layer-group"></i>
                                Category
                            </label>
                            <div class="select-wrapper">
                                <select name="category_id" required class="@error('category_id') is-invalid @enderror">
                                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            @error('category_id')
                                <div class="error-message" style="display: none;"></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                <i class="fa-solid fa-signal"></i>
                                Level
                            </label>
                            <div class="select-wrapper">
                                <select name="level" required class="@error('level') is-invalid @enderror">
                                    <option value="" disabled {{ old('level') ? '' : 'selected' }}>Select level</option>
                                    <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                    <option value="all-levels" {{ old('level') == 'all-levels' ? 'selected' : '' }}>All Levels</option>
                                </select>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            @error('level')
                                <div class="error-message" style="display: none;"></div>
                            @enderror
                        </div>
                    </div>

                    <!-- Duration and Price Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>
                                <i class="fa-regular fa-clock"></i>
                                Duration
                            </label>
                            <div class="select-wrapper">
                                <select name="duration" required class="@error('duration') is-invalid @enderror">
                                    <option value="" disabled {{ old('duration') ? '' : 'selected' }}>Course duration</option>
                                    <option value="0-2" {{ old('duration') == '0-2' ? 'selected' : '' }}>0-2 hours</option>
                                    <option value="2-5" {{ old('duration') == '2-5' ? 'selected' : '' }}>2-5 hours</option>
                                    <option value="5-10" {{ old('duration') == '5-10' ? 'selected' : '' }}>5-10 hours</option>
                                    <option value="10-20" {{ old('duration') == '10-20' ? 'selected' : '' }}>10-20 hours</option>
                                    <option value="20+" {{ old('duration') == '20+' ? 'selected' : '' }}>20+ hours</option>
                                </select>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            @error('duration')
                                <div class="error-message" style="display: none;"></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                <i class="fa-solid fa-tag"></i>
                                Price ($)
                            </label>
                            <div class="price-input">
                                <i class="fa-solid fa-dollar-sign"></i>
                                <input type="number" 
                                       name="price" 
                                       value="{{ old('price') }}"
                                       required 
                                       placeholder="49.99"
                                       step="0.01"
                                       min="0"
                                       class="@error('price') is-invalid @enderror">
                            </div>
                            @error('price')
                                <div class="error-message" style="display: none;"></div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Course Image Section -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fa-solid fa-image"></i>
                        <div>
                            <h2>Course Image</h2>
                            <p>Upload a compelling cover image for your course</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="image-upload" id="imageUploadArea">
                            <i class="fa-solid fa-cloud-upload-alt"></i>
                            <h4>Drag & drop or click to upload</h4>
                            <p>Upload a course cover image (JPG, PNG, or WebP)</p>
                            <small>Max file size: 2MB | Recommended: 1280x720px</small>
                            <input type="file" 
                                   name="image" 
                                   id="courseImage" 
                                   accept="image/jpeg,image/png,image/webp"
                                   class="@error('image') is-invalid @enderror">
                        </div>
                        <div class="image-preview" id="imagePreview">
                            <img src="" alt="Preview">
                        </div>
                        @error('image')
                            <div class="error-message" style="display: none;"></div>
                        @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        Create Course
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    <a href="{{ route('instructor.dashboard') }}" class="btn-secondary">
                        Cancel
                    </a>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="sidebar">
                <!-- Publishing Checklist -->
                <div class="sidebar-card">
                    <div class="card-header">
                        <i class="fa-solid fa-check-circle"></i>
                        <h3>Publishing Checklist</h3>
                    </div>
                    <div class="checklist-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Course title</span>
                        <small>Required</small>
                    </div>
                    <div class="checklist-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Description</span>
                        <small>Required</small>
                    </div>
                    <div class="checklist-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Category & Level</span>
                        <small>Required</small>
                    </div>
                    <div class="checklist-item">
                        <i class="fa-regular fa-circle"></i>
                        <span>Course image</span>
                        <small>Optional</small>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="sidebar-card">
                    <div class="card-header">
                        <i class="fa-solid fa-lightbulb"></i>
                        <h3>Pro Tips</h3>
                    </div>
                    
                    <div class="tip-item">
                        <i class="fa-solid fa-pen"></i>
                        <div class="tip-content">
                            <h4>Write a compelling title</h4>
                            <p>Use keywords students might search for. Keep it clear and benefit-focused.</p>
                        </div>
                    </div>

                    <div class="tip-item">
                        <i class="fa-solid fa-align-left"></i>
                        <div class="tip-content">
                            <h4>Detailed description</h4>
                            <p>Explain what students will learn, prerequisites, and who this course is for.</p>
                        </div>
                    </div>

                    <div class="tip-item">
                        <i class="fa-solid fa-image"></i>
                        <div class="tip-content">
                            <h4>High-quality image</h4>
                            <p>Use a clear, professional image that represents your course content well.</p>
                        </div>
                    </div>

                    <div class="tip-item">
                        <i class="fa-solid fa-tag"></i>
                        <div class="tip-content">
                            <h4>Pricing strategy</h4>
                            <p>Research similar courses and price competitively. You can always adjust later.</p>
                        </div>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="sidebar-card">
                    <div class="card-header">
                        <i class="fa-solid fa-chart-line"></i>
                        <h3>Course Statistics</h3>
                    </div>
                    
                    <div style="text-align: center; padding: 20px 0;">
                        <div style="font-size: 3rem; font-weight: 800; color: var(--brand-main); margin-bottom: 10px;">
                            0
                        </div>
                        <p style="color: var(--text-muted);">Courses published</p>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; text-align: center;">
                        <div>
                            <div style="font-size: 1.5rem; font-weight: 700;">$0</div>
                            <div style="color: var(--text-muted); font-size: 0.85rem;">Total earnings</div>
                        </div>
                        <div>
                            <div style="font-size: 1.5rem; font-weight: 700;">0</div>
                            <div style="color: var(--text-muted); font-size: 0.85rem;">Students</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Image Upload Preview Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('courseImage');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = imagePreview.querySelector('img');
    const uploadArea = document.getElementById('imageUploadArea');

    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file size
                if (file.size > 2 * 1024 * 1024) {
                    showToast('error', 'File too large', 'Image must be less than 2MB');
                    this.value = '';
                    return;
                }

                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    showToast('error', 'Invalid file type', 'Please upload JPG, PNG, or WebP images only');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                    uploadArea.style.borderColor = '#10b981';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
                uploadArea.style.borderColor = '';
            }
        });

        // Drag and drop functionality
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--brand-main)';
            this.style.background = 'rgba(228,67,32,0.05)';
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '';
            this.style.background = '';
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '';
            this.style.background = '';
            
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                // Validate file size
                if (file.size > 2 * 1024 * 1024) {
                    showToast('error', 'File too large', 'Image must be less than 2MB');
                    return;
                }
                
                imageInput.files = e.dataTransfer.files;
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    }

    // Auto-remove toasts after 5 seconds
    const toasts = document.querySelectorAll('[data-toast]');
    toasts.forEach(toast => {
        setTimeout(() => {
            if (toast && toast.parentNode) {
                toast.remove();
            }
        }, 5000);
    });

    // Function to show toast notifications
    window.showToast = function(type, title, message) {
        const container = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${type} animate__animated animate__slideInRight`;
        toast.setAttribute('data-toast', '');
        
        let icon = '';
        if (type === 'error') icon = 'circle-exclamation';
        else if (type === 'success') icon = 'circle-check';
        else if (type === 'warning') icon = 'triangle-exclamation';
        
        toast.innerHTML = `
            <div class="toast-icon">
                <i class="fa-solid fa-${icon}"></i>
            </div>
            <div class="toast-content">
                <div class="toast-title">${title}</div>
                <div class="toast-message">${message}</div>
            </div>
            <div class="toast-close" onclick="this.closest('[data-toast]').remove()">
                <i class="fa-solid fa-xmark"></i>
            </div>
        `;
        
        container.appendChild(toast);
        
        setTimeout(() => {
            if (toast && toast.parentNode) {
                toast.remove();
            }
        }, 5000);
    };
});

// Form validation before submit
document.getElementById('courseForm')?.addEventListener('submit', function(e) {
    const title = this.querySelector('[name="title"]').value;
    const description = this.querySelector('[name="description"]').value;
    const category = this.querySelector('[name="category_id"]').value;
    const level = this.querySelector('[name="level"]').value;
    const duration = this.querySelector('[name="duration"]').value;
    const price = this.querySelector('[name="price"]').value;

    if (!title || !description || !category || !level || !duration || !price) {
        e.preventDefault();
        showToast('error', 'Validation Error', 'Please fill in all required fields');
    }
});
</script>

@endsection