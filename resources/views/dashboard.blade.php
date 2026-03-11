@extends('layouts.app')

@section('title', 'E-Learn | Admin Dashboard')

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
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
    --info: #3b82f6;
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
    background: transparent;
    cursor: pointer;
    font-size: 16px;
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

/* Admin Hero Card */
.admin-hero-card {
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

/* Status Filters */
.status-filters {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.filter-btn {
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
    box-shadow: 0 10px 20px rgba(228,67,32,0.2);
}

/* Course Review Grid */
.review-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.review-card {
    background: var(--surface);
    border-radius: 28px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid var(--border-color);
    position: relative;
}

.review-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(228,67,32,0.2);
}

.review-header {
    padding: 20px 25px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.review-header h3 {
    font-size: 18px;
    font-weight: 700;
    margin: 0;
}

.review-thumb {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.review-body {
    padding: 25px;
}

.review-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    flex-wrap: wrap;
    gap: 10px;
}

.review-category {
    color: var(--brand-main);
    font-weight: 600;
    font-size: 13px;
    background: rgba(228,67,32,0.1);
    padding: 4px 10px;
    border-radius: 100px;
}

.review-stats {
    display: flex;
    gap: 15px;
    color: var(--text-muted);
    font-size: 13px;
}

.review-stats i {
    margin-right: 4px;
}

.review-body h4 {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 10px 0;
    line-height: 1.3;
}

.review-description {
    color: var(--text-muted);
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
    max-height: 80px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.instructor-info {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    padding: 10px 15px;
    background: rgba(255,255,255,0.02);
    border-radius: 16px;
}

.instructor-info i {
    font-size: 24px;
    color: var(--brand-main);
}

.instructor-info div {
    flex: 1;
}

.instructor-info div p {
    font-weight: 600;
    margin-bottom: 3px;
}

.instructor-info div span {
    font-size: 12px;
    color: var(--text-muted);
}

.review-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.btn-approve {
    flex: 1;
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
    padding: 12px;
    border-radius: 14px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: 0.3s;
    border: 1px solid rgba(16, 185, 129, 0.2);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
}

.btn-approve:hover {
    background: var(--success);
    color: white;
    border-color: var(--success);
}

.btn-pending {
    flex: 1;
    background: rgba(245, 158, 11, 0.1);  /* Amber/warning color with opacity */
    color: #f59e0b;  /* Amber color */
    padding: 12px;
    border-radius: 14px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: 0.3s;
    border: 1px solid rgba(245, 158, 11, 0.2);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
    width: 100%;
}

.btn-pending:hover {
    background: #f59e0b;  /* Solid amber */
    color: white;
    border-color: #f59e0b;
}

/* Optional: If you want to keep the star icon instead of clock */
.btn-pending i {
    font-size: 16px;
}
.btn-reject {
    flex: 1;
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
    padding: 12px;
    border-radius: 14px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: 0.3s;
    border: 1px solid rgba(239, 68, 68, 0.2);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
}

.btn-reject:hover {
    background: var(--danger);
    color: white;
    border-color: var(--danger);
}



.btn-view {
    flex: 1;
    background: transparent;
    color: var(--text-main);
    padding: 12px;
    border-radius: 14px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: 0.3s;
    border: 1px solid var(--border-color);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
}

.btn-view:hover {
    background: rgba(255,255,255,0.05);
    border-color: var(--brand-main);
}

/* Status Badges */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 600;
}

.status-pending {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
    border: 1px solid rgba(245, 158, 11, 0.2);
}

.status-approved {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.status-rejected {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
    border: 1px solid rgba(239, 68, 68, 0.2);
}

.status-published {
    background: rgba(59, 130, 246, 0.1);
    color: var(--info);
    border: 1px solid rgba(59, 130, 246, 0.2);
}

/* Quick Stats Cards */
.quick-stats {
    display: grid;
    grid-template-columns: repeat(5, 1fr);  /* Changed from 4 to 5 */
    gap: 20px;
    margin-bottom: 40px;
}

/* Rest of your CSS remains the same */
.stat-item {
    background: var(--surface);
    border-radius: 20px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    border: 1px solid var(--border-color);
}

.stat-item-icon {
    width: 50px;
    height: 50px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.stat-item-icon.pending {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
}

.stat-item-icon.approved {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.stat-item-icon.rejected {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
}

/* Added published icon style */
.stat-item-icon.published {
    background: rgba(245, 31, 11, 0.1);  /* Or choose a different color */
    color: #f5460b;
}

.stat-item-icon.total {
    background: rgba(228, 67, 32, 0.1);
    color: var(--brand-main);
}

.stat-item-info h4 {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 4px;
}

.stat-item-info p {
    color: var(--text-muted);
    font-size: 13px;
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

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    z-index: 2000;
    align-items: center;
    justify-content: center;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: var(--surface);
    border-radius: var(--card-radius);
    padding: 40px;
    max-width: 500px;
    width: 90%;
    border: 1px solid var(--border-color);
    position: relative;
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 24px;
    cursor: pointer;
}

.modal-close:hover {
    color: var(--brand-main);
}

.modal h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.modal p {
    color: var(--text-muted);
    margin-bottom: 30px;
}

.modal-actions {
    display: flex;
    gap: 15px;
}

/* Responsive */
@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .quick-actions {
        grid-template-columns: repeat(2, 1fr);
    }
    .quick-stats {
        grid-template-columns: repeat(2, 1fr);
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
    .review-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Toggle Button -->
<button id="sidebar-toggle"><i class="fa-solid fa-bars"></i></button>

<!-- Sidebar -->
<div id="sidebar">
    <a href="#" class="brand-side">
        E-Learn <span>ADMIN</span>
    </a>
    
    <div class="sidebar-menu">
        <a href="#" class="active"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="#"><i class="fa-solid fa-book-open"></i> All Courses</a>
        <a href="#"><i class="fa-solid fa-users"></i> Users</a>
        <a href="#"><i class="fa-solid fa-clock"></i> Pending Reviews</a>
        <a href="#"><i class="fa-solid fa-check-circle"></i> Approved</a>
        <a href="#"><i class="fa-solid fa-times-circle"></i> Rejected</a>
        <a href="#"><i class="fa-solid fa-chart-line"></i> Analytics</a>
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
        <div class="brand">E-Learn Admin</div>
        
        <div class="nav-actions">
            <div class="nav-icon">
                <i class="fa-regular fa-message"></i>
                <span class="notification-badge">8</span>
            </div>
            <div class="nav-icon">
                <i class="fa-regular fa-bell"></i>
                <span class="notification-badge">12</span>
            </div>
            <div class="user-pill">
                <img src="{{ asset('images/admin-profile.png') }}" alt="Profile">
                <span style="font-weight: 600;">{{ Auth::user()->name }}</span>
                <i class="fa-solid fa-chevron-down" style="font-size: 12px; color: var(--text-muted);"></i>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="header-title">
            <h1>Admin Dashboard, {{ Auth::user()->name }}! 🔐</h1>
            <p>Manage and review all courses on the platform.</p>
        </div>
        <div class="header-actions">
            <a href="#" class="btn-secondary">
                <i class="fa-regular fa-file-pdf"></i> Export Report
            </a>
            <a href="#" class="btn-primary">
                <i class="fa-solid fa-plus"></i> Add Admin
            </a>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="quick-stats">
        <div class="stat-item">
            <div class="stat-item-icon pending">
                <i class="fa-regular fa-clock"></i>
            </div>
            <div class="stat-item-info">
                <h4>{{ $pendingCount ?? 0 }}</h4>
                <p>Pending Review</p>
            </div>
        </div>
        
        <div class="stat-item">
            <div class="stat-item-icon approved">
                <i class="fa-regular fa-check-circle"></i>
            </div>
            <div class="stat-item-info">
                <h4>{{ $approvedCount ?? 0 }}</h4>
                <p>Approved</p>
            </div>
        </div>
        
        <div class="stat-item">
            <div class="stat-item-icon rejected">
                <i class="fa-regular fa-times-circle"></i>
            </div>
            <div class="stat-item-info">
                <h4>{{ $rejectedCount ?? 0 }}</h4>
                <p>Rejected</p>
            </div>
        </div>

       <div class="stat-item">
            <div class="stat-item-icon published">
                <i class="fa-solid fa-fire"></i>
            </div>
            <div class="stat-item-info">
                <h4>{{ $publishedCount ?? 0 }}</h4>
                <p>Published</p>
            </div>
        </div>
        
        <div class="stat-item">
            <div class="stat-item-icon total">
                <i class="fa-regular fa-book-open"></i>
            </div>
            <div class="stat-item-info">
                <h4>{{ $totalCourses ?? 0 }}</h4>
                <p>Total Courses</p>
            </div>
        </div>
    </div>

    <!-- Admin Hero Card -->
    <section class="admin-hero-card">
        <div class="hero-pattern"></div>
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-shield"></i>
                ADMIN ACCESS
            </div>
            <h1>Course <span>Reviews</span> Pending</h1>
            <p>You have {{ $pendingCount ?? 0 }} courses waiting for your review. Review them now to maintain quality standards.</p>
            
            <a href="#pending-reviews" class="btn-primary" style="display: inline-flex;">
                <i class="fa-regular fa-eye"></i> Review Now
            </a>
        </div>
    </section>

    <!-- Quick Actions -->
    {{-- <div class="quick-actions">
        <a href="#" class="action-card">
            <div class="action-icon"><i class="fa-regular fa-clock"></i></div>
            <h4>Pending Reviews</h4>
            <p>{{ $pendingCount ?? 0 }} courses to review</p>
        </a>
        <a href="#" class="action-card">
            <div class="action-icon"><i class="fa-regular fa-check-circle"></i></div>
            <h4>Approved</h4>
            <p>{{ $publishedCount ?? 0 }} live courses</p>
        </a>
        <a href="#" class="action-card">
            <div class="action-icon"><i class="fa-regular fa-users"></i></div>
            <h4>Users</h4>
            <p>Manage instructors</p>
        </a>
        <a href="#" class="action-card">
            <div class="action-icon"><i class="fa-regular fa-chart-line"></i></div>
            <h4>Analytics</h4>
            <p>Platform insights</p>
        </a>
    </div> --}}

    <!-- Status Filters -->
    <div class="section-header">
        <h2>Course Review Queue <span>Manage course approvals</span></h2>
        <a href="#" class="view-all">View All <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    
    <section class="status-filters">
        <button class="filter-btn active" onclick="filterStatus('all')">
            <i class="fa-solid fa-layer-group"></i> All Courses
        </button>
        <button class="filter-btn" onclick="filterStatus('pending')">
            <i class="fa-regular fa-clock"></i> Pending
        </button>
        <button class="filter-btn" onclick="filterStatus('approved')">
            <i class="fa-regular fa-check-circle"></i> Approved
        </button>
        <button class="filter-btn" onclick="filterStatus('rejected')">
            <i class="fa-regular fa-times-circle"></i> Rejected
        </button>
        <button class="filter-btn" onclick="filterStatus('published')">
            <i class="fa-regular fa-star"></i> Published
        </button>
    </section>

    <!-- Course Review Grid -->
    <section class="review-grid" id="course-review-grid">
        @foreach($courses as $course)
        <div class="review-card" data-status="{{ $course->status }}">
            <div class="review-header">
                <h3>Course Review</h3>
                @if($course->status == 'pending')
                    <span class="status-badge status-pending">
                        <i class="fa-regular fa-clock"></i> Pending
                    </span>
                @elseif($course->status == 'approved')
                    <span class="status-badge status-approved">
                        <i class="fa-regular fa-check-circle"></i> Approved
                    </span>
                @elseif($course->status == 'rejected')
                    <span class="status-badge status-rejected">
                        <i class="fa-regular fa-times-circle"></i> Rejected
                    </span>
                @elseif($course->status == 'published')
                    <span class="status-badge status-published">
                        <i class="fa-regular fa-star"></i> Published
                    </span>
                @endif
            </div>
            
            <img src="{{ $course->image 
                        ? asset('storage/' . $course->image) 
                        : asset('images/default-course.jpg') }}" 
                class="review-thumb">

            <div class="review-body">
                <div class="review-meta">
                    <span class="review-category">{{ $course->category->name ?? 'General' }}</span>
                    <div class="review-stats">
                        <span><i class="fa-regular fa-eye"></i> {{ $course->views ?? 0 }}</span>
                        <span><i class="fa-regular fa-star"></i> {{ $course->rating ?? '0.0' }}</span>
                    </div>
                </div>
                
                <h4>{{ $course->title }}</h4>
                <p class="review-description">{{ $course->description }}</p>

                <div class="instructor-info">
                    <i class="fa-solid fa-circle-user"></i>
                    <div>
                        <p>{{ $course->instructor->name ?? 'Unknown Instructor' }}</p>
                        <span>Instructor • Joined {{ $course->created_at->format('M Y') }}</span>
                    </div>
                </div>

                <div class="review-actions">
                    <a href="{{ route('courses.show', $course->id) }}" class="btn-view" target="_blank">
                        <i class="fa-regular fa-eye"></i> Preview
                    </a>
                    
                    @if($course->status == 'pending' || $course->status == 'rejected')
                    <form action="{{ route('admin.courses.approve', $course->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-approve">
                            <i class="fa-regular fa-check-circle"></i> Approve
                        </button>
                    </form>
                    
                    <button onclick="openRejectModal({{ $course->id }})" class="btn-reject">
                        <i class="fa-regular fa-times-circle"></i> Reject
                    </button>
                    @elseif($course->status == 'approved')

                    <form action="{{ route('admin.courses.Pending', $course->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-pending">
                            <i class="fa-regular fa-clock"></i> Pending
                        </button>
                    </form>

                    <form action="{{ route('admin.courses.publish', $course->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-approve">
                            <i class="fa-regular fa-star"></i> Publish
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.courses.reject', $course->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-reject">
                            <i class="fa-regular fa-times-circle"></i> Reject
                        </button>
                    </form>
                    @elseif($course->status == 'published')
                    <span class="status-badge status-published" style="flex: 1; justify-content: center;">
                        <i class="fa-regular fa-check-circle"></i> Live
                    </span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <!-- Pagination -->
    <div class="pagination-wrapper" style="margin-top: 50px; display: flex; justify-content: center;">
        {{ $courses->links() }}
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeRejectModal()">&times;</button>
        <h3>Reject Course</h3>
        <p>Please provide a reason for rejecting this course. This will be sent to the instructor.</p>
        
        <form id="rejectForm" method="POST">
            @csrf
            @method('PATCH')
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 10px; color: var(--text-muted);">Rejection Reason</label>
                <textarea name="rejection_reason" rows="4" required 
                    style="width: 100%; padding: 15px; background: var(--surface-light); border: 1px solid var(--border-color); border-radius: 16px; color: white; font-family: 'Inter', sans-serif;"></textarea>
            </div>
            
            <div class="modal-actions">
                <button type="button" onclick="closeRejectModal()" class="btn-secondary" style="flex: 1;">Cancel</button>
                <button type="submit" class="btn-reject" style="flex: 1;">Reject Course</button>
            </div>
        </form>
    </div>
</div>

<script>
function filterStatus(status) {
    const courses = document.querySelectorAll('.review-card');
    
    courses.forEach(course => {
        if (status === 'all' || course.dataset.status === status) {
            course.style.display = 'block';
        } else {
            course.style.display = 'none';
        }
    });
    
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');
}

const sidebar = document.getElementById('sidebar');
const toggleBtn = document.getElementById('sidebar-toggle');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target) && sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
    }
});

document.querySelectorAll('#sidebar a').forEach(link => {
    link.addEventListener('click', function(e) {
        if (!this.classList.contains('brand-side') && !this.closest('form')) {
            e.preventDefault();
            document.querySelectorAll('#sidebar a').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    });
});

// Reject Modal
const rejectModal = document.getElementById('rejectModal');
const rejectForm = document.getElementById('rejectForm');

function openRejectModal(courseId) {
    rejectModal.classList.add('active');
    rejectForm.action = `/admin/courses/${courseId}/reject`;
}

function closeRejectModal() {
    rejectModal.classList.remove('active');
}

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target === rejectModal) {
        closeRejectModal();
    }
}

// Auto-refresh data every 60 seconds
setInterval(() => {
    // You could implement AJAX refresh here
    console.log('Refreshing dashboard data...');
}, 60000);
</script>

@endsection