@extends('layouts.app')

@section('title', 'E-Learn | Master Skills Online')

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

/* Landing Wrapper */
.landing-wrapper {
    max-width: 1440px;
    margin: 0 auto;
    padding: 0 40px;
    position: relative;
}

/* Background Effects */
.background-glow {
    position: fixed;
    top: -50%;
    right: -20%;
    width: 800px;
    height: 800px;
    background: radial-gradient(circle, rgba(228,67,32,0.15) 0%, transparent 70%);
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
    background: radial-gradient(circle, rgba(228,67,32,0.1) 0%, transparent 70%);
    border-radius: 50%;
    z-index: -1;
    pointer-events: none;
}

/* Navigation - Ultra Premium */
.landing-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 0;
    margin-bottom: 40px;
    position: relative;
    z-index: 10;
}

.nav-logo {
    display: flex;
    align-items: center;
    gap: 12px;
}

.nav-logo i {
    font-size: 40px;
    color: var(--brand-main);
    filter: drop-shadow(0 10px 20px rgba(228,67,32,0.3));
}

.logo-text {
    font-size: 2rem;
    font-weight: 800;
    letter-spacing: -1px;
    background: linear-gradient(135deg, #fff 0%, var(--brand-main) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.logo-text .accent {
    -webkit-text-fill-color: var(--brand-main);
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 16px;
}

.nav-login {
    padding: 12px 28px;
    color: var(--text-main);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    border-radius: 100px;
    transition: all 0.3s ease;
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--border-color);
}

.nav-login:hover {
    background: rgba(255,255,255,0.08);
    border-color: rgba(228,67,32,0.3);
}

.nav-signup {
    padding: 12px 32px;
    background: var(--brand-gradient);
    color: white !important;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    border-radius: 100px;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
    border: none;
}

.nav-signup:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(228,67,32,0.4);
}

/* Hero Section - Redesigned */
.hero {
    display: flex;
    align-items: center;
    gap: 60px;
    padding: 40px 0 80px;
    position: relative;
    z-index: 2;
}

.hero-content {
    flex: 1.2;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 20px;
    background: rgba(228,67,32,0.1);
    border: 1px solid rgba(228,67,32,0.3);
    border-radius: 100px;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--brand-main);
    margin-bottom: 30px;
    backdrop-filter: blur(10px);
}

.hero-badge i {
    font-size: 16px;
}

.hero-content h1 {
    font-size: 4.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 24px;
    letter-spacing: -2px;
    color: var(--text-main);
}

.hero-content h1 .accent {
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    position: relative;
}

.hero-content h1 .accent::after {
    content: '';
    position: absolute;
    bottom: 10px;
    left: 0;
    width: 100%;
    height: 8px;
    background: var(--brand-gradient);
    opacity: 0.2;
    border-radius: 100px;
}

.hero-description {
    font-size: 1.25rem;
    color: var(--text-muted);
    margin-bottom: 40px;
    max-width: 550px;
    line-height: 1.6;
}

.highlight {
    color: var(--brand-main);
    font-weight: 700;
    position: relative;
    display: inline-block;
}

.hero-cta {
    display: flex;
    gap: 16px;
    margin-bottom: 50px;
}

.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 36px;
    background: var(--brand-gradient);
    color: white;
    border: none;
    border-radius: 100px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 30px rgba(228,67,32,0.4);
}

.btn-primary svg {
    transition: transform 0.3s ease;
}

.btn-primary:hover svg {
    transform: translateX(5px);
}

.btn-secondary {
    display: inline-flex;
    align-items: center;
    padding: 16px 36px;
    background: rgba(255,255,255,0.03);
    color: var(--text-main);
    border: 1px solid var(--border-color);
    border-radius: 100px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.btn-secondary:hover {
    background: rgba(255,255,255,0.08);
    border-color: var(--brand-main);
    transform: translateY(-2px);
}

.hero-stats {
    display: flex;
    gap: 50px;
}

.stat-item {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #fff 0%, #E44320 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.stat-label {
    font-size: 0.95rem;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.hero-image {
    flex: 1;
    position: relative;
}

.image-wrapper {
    position: relative;
    width: 100%;
    max-width: 550px;
    margin-left: auto;
}

.image-wrapper::before {
    content: '';
    position: absolute;
    top: -20px;
    right: -20px;
    width: 200px;
    height: 200px;
    background: var(--brand-main);
    filter: blur(100px);
    opacity: 0.3;
    z-index: -1;
}

.image-wrapper img {
    width: 100%;
    height: 600px;
    object-fit: cover;
    border-radius: 40px;
    box-shadow: var(--shadow-xl);
    border: 1px solid var(--border-color);
    transform: perspective(1000px) rotateY(-5deg);
    transition: transform 0.5s ease;
}

.image-wrapper img:hover {
    transform: perspective(1000px) rotateY(0deg);
}

.image-card {
    position: absolute;
    padding: 16px 24px;
    background: rgba(20, 20, 20, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid var(--border-color);
    border-radius: 100px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: var(--shadow-xl);
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.card-1 {
    top: 50px;
    left: -30px;
    animation-delay: 0s;
}

.card-2 {
    bottom: 50px;
    right: -30px;
    animation-delay: 1.5s;
}

.image-card span:first-child {
    font-size: 1.5rem;
}

.image-card span:last-child {
    font-weight: 600;
    color: var(--text-main);
}

/* Features Section */
.features {
    padding: 100px 0;
    position: relative;
    z-index: 2;
}

.section-header {
    text-align: center;
    max-width: 600px;
    margin: 0 auto 60px;
}

.section-subtitle {
    display: inline-block;
    font-size: 0.875rem;
    font-weight: 700;
    letter-spacing: 2px;
    color: var(--brand-main);
    margin-bottom: 16px;
    text-transform: uppercase;
    background: rgba(228,67,32,0.1);
    padding: 6px 16px;
    border-radius: 100px;
    border: 1px solid rgba(228,67,32,0.3);
}

.section-header h2 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 20px;
    letter-spacing: -1px;
    color: var(--text-main);
}

.section-header h2 .accent {
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.section-header p {
    color: var(--text-muted);
    font-size: 1.125rem;
    line-height: 1.6;
}

.feature-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
    margin-bottom: 60px;
}

.card {
    background: var(--surface);
    width: 350px;
    padding: 40px 30px;
    border-radius: var(--card-radius);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid var(--border-color);
    position: relative;
    overflow: hidden;
}

.card::before {
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

.card:hover::before {
    transform: scaleX(1);
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(228,67,32,0.2);
}

.card.featured {
    border: 1px solid rgba(228,67,32,0.3);
    background: linear-gradient(135deg, var(--surface) 0%, #1A1A1A 100%);
}

.card-icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 30px;
    border-radius: 30px;
    overflow: hidden;
    background: var(--surface-light);
    padding: 20px;
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.card:hover .card-icon {
    transform: scale(1.1);
    border-color: var(--brand-main);
}

.card-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    filter: brightness(0) invert(1);
    opacity: 0.9;
}

.card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--text-main);
    text-align: center;
}

.card p {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.7;
    margin-bottom: 25px;
    text-align: center;
}

.card-link {
    color: var(--brand-main);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: gap 0.3s ease;
}

.card-link:hover {
    gap: 12px;
}

/* Courses Preview */
.courses-preview {
    padding: 80px 0;
    position: relative;
    z-index: 2;
}

.course-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.course-card {
    background: var(--surface);
    border-radius: 28px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid var(--border-color);
    position: relative;
}

.course-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(228,67,32,0.2);
}

.course-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.course-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.course-card:hover .course-image img {
    transform: scale(1.1);
}

.course-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    padding: 8px 16px;
    background: var(--brand-gradient);
    color: white;
    border-radius: 100px;
    font-size: 0.75rem;
    font-weight: 700;
    z-index: 1;
    box-shadow: 0 10px 20px rgba(228,67,32,0.3);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.course-info {
    padding: 25px;
}

.course-info h4 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 10px;
    color: var(--text-main);
}

.course-info p {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin-bottom: 20px;
    line-height: 1.6;
}

.course-meta {
    display: flex;
    gap: 20px;
    font-size: 0.9rem;
    color: var(--text-muted);
    padding-top: 15px;
    border-top: 1px solid var(--border-color);
}

.course-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Stats Section - Redesigned */
.stats-section {
    padding: 80px 0;
    position: relative;
    z-index: 2;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.stat-card {
    background: var(--surface);
    padding: 40px 30px;
    border-radius: 28px;
    text-align: center;
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
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

.stat-icon {
    font-size: 3rem;
    margin-bottom: 20px;
    display: inline-block;
    background: rgba(228,67,32,0.1);
    width: 80px;
    height: 80px;
    line-height: 80px;
    border-radius: 30px;
    color: var(--brand-main);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    display: block;
    margin-bottom: 10px;
    background: var(--brand-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.stat-text {
    color: var(--text-muted);
    font-size: 1rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* CTA Section - Premium */
.cta {
    padding: 80px 0;
    position: relative;
    z-index: 2;
}

.cta-content {
    background: linear-gradient(135deg, var(--surface) 0%, #1A1A1A 100%);
    padding: 80px 60px;
    border-radius: var(--card-radius);
    text-align: center;
    border: 1px solid rgba(228,67,32,0.2);
    position: relative;
    overflow: hidden;
}

.cta-content::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(228,67,32,0.2) 0%, transparent 70%);
    border-radius: 50%;
}

.cta-content::after {
    content: '';
    position: absolute;
    bottom: -50%;
    left: -20%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(228,67,32,0.15) 0%, transparent 70%);
    border-radius: 50%;
}

.cta-content h2 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 20px;
    color: var(--text-main);
    position: relative;
    z-index: 1;
}

.cta-content p {
    font-size: 1.25rem;
    color: var(--text-muted);
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    z-index: 1;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    position: relative;
    z-index: 1;
}

.btn-large {
    padding: 18px 50px;
    font-size: 1.125rem;
}

/* Footer - Premium */
.landing-footer {
    padding: 80px 0 30px;
    border-top: 1px solid var(--border-color);
    position: relative;
    z-index: 2;
    margin-top: 60px;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    gap: 80px;
    margin-bottom: 60px;
}

.footer-brand {
    flex: 2;
    min-width: 300px;
}

.footer-brand i {
    font-size: 40px;
    color: var(--brand-main);
    margin-bottom: 20px;
    display: inline-block;
}

.footer-brand .logo-text {
    display: block;
    margin-bottom: 20px;
    font-size: 2rem;
}

.footer-brand p {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.7;
    max-width: 350px;
}

.footer-links {
    flex: 3;
    display: flex;
    flex-wrap: wrap;
    gap: 60px;
    justify-content: space-between;
}

.footer-column {
    min-width: 140px;
}

.footer-column h4 {
    color: var(--text-main);
    font-size: 1.125rem;
    margin-bottom: 25px;
    font-weight: 700;
}

.footer-column a {
    display: block;
    color: var(--text-muted);
    text-decoration: none;
    font-size: 0.95rem;
    margin-bottom: 15px;
    transition: all 0.2s ease;
}

.footer-column a:hover {
    color: var(--brand-main);
    transform: translateX(5px);
}

.footer-bottom {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid var(--border-color);
}

.footer-bottom p {
    color: var(--text-muted);
    font-size: 0.875rem;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .hero-content h1 {
        font-size: 3.5rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .hero {
        flex-direction: column;
        text-align: center;
    }
    
    .hero-content {
        text-align: center;
    }
    
    .hero-description {
        margin-left: auto;
        margin-right: auto;
    }
    
    .hero-cta {
        justify-content: center;
    }
    
    .hero-stats {
        justify-content: center;
    }
    
    .image-wrapper {
        margin: 0 auto;
    }
    
    .cta-content h2 {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .landing-wrapper {
        padding: 0 20px;
    }
    
    .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .nav-links {
        gap: 12px;
    }
    
    .nav-login, .nav-signup {
        padding: 10px 20px;
    }
    
    .image-card {
        display: none;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: stretch;
        padding: 0 20px;
    }
    
    .cta-content {
        padding: 60px 20px;
    }
    
    .cta-content h2 {
        font-size: 2rem;
    }
    
    .footer-content {
        flex-direction: column;
        gap: 40px;
    }
    
    .footer-links {
        gap: 30px;
    }
}

/* Animations */
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

.hero-content, .hero-image, .card, .course-card, .stat-card {
    animation: fadeInUp 0.6s ease-out forwards;
}

.card:nth-child(2) {
    animation-delay: 0.2s;
}

.card:nth-child(3) {
    animation-delay: 0.4s;
}
</style>

<div class="landing-wrapper">
    <!-- Background Glow Effects -->
    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <!-- Navigation Bar - Premium -->
    <nav class="landing-nav">
        <div class="nav-logo">
            <i class="fa-solid fa-lines-leaning"></i>
            <span class="logo-text">E<span class="accent">Learn</span></span>
        </div>
        <div class="nav-links">
            <a href="{{ route('login') }}" class="nav-login">Login</a>
            <a href="{{ route('register') }}" class="nav-signup">Sign Up</a>
        </div>
    </nav>

    <!-- Hero Section - Premium -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-bolt"></i>
                Welcome to the future of learning
            </div>
            <h1>Learn Anytime, <span class="accent">Anywhere</span></h1>
            <p class="hero-description">Join <span class="highlight">10,000+ learners</span> and explore courses from top instructors. Start your journey today with interactive lessons and real-world projects.</p>
            <div class="hero-cta">
                <a href="{{ route('register') }}" class="btn-primary">
                    Get Started Free
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M4.16666 10H15.8333M15.8333 10L11.6667 5.83334M15.8333 10L11.6667 14.1667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="#features" class="btn-secondary">Learn More</a>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">200+</span>
                    <span class="stat-label">Courses</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">10k+</span>
                    <span class="stat-label">Students</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Instructors</span>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <div class="image-wrapper">
                <img src="{{ asset('images/Gemini_Generated_Image_wxne7mwxne7mwxne.png') }}" alt="Student learning online">
               
            </div>
        </div>
    </section>

    <!-- Features Section - Premium -->
    <section id="features" class="features">
        <div class="section-header">
            <span class="section-subtitle">WHY CHOOSE US</span>
            <h2>Unlock Your <span class="accent">Learning Potential</span></h2>
            <p>Experience education reimagined with our cutting-edge platform features</p>
        </div>
        
        <div class="feature-cards">
            <div class="card">
                <div class="card-icon">
                    <img src="{{ asset('images/icons/onn.jpg') }}" alt="Interactive Courses">
                </div>
                <h3>Interactive Courses</h3>
                <p>Engage with video lessons, quizzes, and hands-on projects to master new skills effectively.</p>
                <a href="#" class="card-link">Learn more <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            
            <div class="card featured">
                <div class="card-icon">
                    <img src="{{ asset('images/icons/cer.png') }}" alt="Certification">
                </div>
                <h3>Certified Learning</h3>
                <p>Receive verified certificates to showcase your achievements to employers worldwide.</p>
                <a href="#" class="card-link">Learn more <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            
            <div class="card">
                <div class="card-icon">
                    <img src="{{ asset('images/icons/in.jpg') }}" alt="Expert Instructors">
                </div>
                <h3>Expert Instructors</h3>
                <p>Learn from industry professionals who bring real-world experience to every course.</p>
                <a href="#" class="card-link">Learn more <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Popular Courses Preview - Premium -->
    <section id="courses" class="courses-preview">
        <div class="section-header">
            <span class="section-subtitle">POPULAR COURSES</span>
            <h2>Start Learning <span class="accent">Today</span></h2>
            <p>Choose from hundreds of courses taught by real experts</p>
        </div>

        <div class="course-grid">
            <div class="course-card">
                <div class="course-image">
                    <img src="{{ asset('images/icons/onn.jpg') }}" alt="Web Development">
                    <span class="course-badge">Best Seller</span>
                </div>
                <div class="course-info">
                    <h4>Complete Web Development</h4>
                    <p>Master HTML, CSS, JavaScript, React, and Node.js with real-world projects</p>
                    <div class="course-meta">
                        <span><i class="fa-regular fa-clock"></i> 48 hours</span>
                        <span><i class="fa-regular fa-star"></i> 4.9 (2.3k)</span>
                    </div>
                </div>
            </div>

            <div class="course-card">
                <div class="course-image">
                    <img src="{{ asset('images/icons/cer.png') }}" alt="Data Science">
                    <span class="course-badge">New</span>
                </div>
                <div class="course-info">
                    <h4>Data Science Fundamentals</h4>
                    <p>Learn Python, SQL, Machine Learning, and data visualization techniques</p>
                    <div class="course-meta">
                        <span><i class="fa-regular fa-clock"></i> 36 hours</span>
                        <span><i class="fa-regular fa-star"></i> 4.8 (1.2k)</span>
                    </div>
                </div>
            </div>

            <div class="course-card">
                <div class="course-image">
                    <img src="{{ asset('images/icons/in.jpg') }}" alt="Digital Marketing">
                    <span class="course-badge">Trending</span>
                </div>
                <div class="course-info">
                    <h4>Digital Marketing Mastery</h4>
                    <p>SEO, Social Media Marketing, Google Ads, and Analytics strategies</p>
                    <div class="course-meta">
                        <span><i class="fa-regular fa-clock"></i> 42 hours</span>
                        <span><i class="fa-regular fa-star"></i> 4.7 (856)</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section - Premium -->
    <section class="stats-section">
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-icon">📚</span>
                <span class="stat-number">200+</span>
                <span class="stat-text">Expert Courses</span>
            </div>
            <div class="stat-card">
                <span class="stat-icon">👥</span>
                <span class="stat-number">10k+</span>
                <span class="stat-text">Active Students</span>
            </div>
            <div class="stat-card">
                <span class="stat-icon">🎓</span>
                <span class="stat-number">8k+</span>
                <span class="stat-text">Certificates Issued</span>
            </div>
            <div class="stat-card">
                <span class="stat-icon">⭐</span>
                <span class="stat-number">4.9</span>
                <span class="stat-text">Student Rating</span>
            </div>
        </div>
    </section>

    <!-- CTA Section - Premium -->
    <section class="cta">
        <div class="cta-content">
            <h2>Ready to Start Your Learning Journey?</h2>
            <p>Join thousands of students already learning on E-Learn. Get started today with a free account and access our premium courses!</p>
            <div class="cta-buttons">
                <a href="{{ route('register') }}" class="btn-primary btn-large">
                    Create Free Account
                </a>
                <a href="#courses" class="btn-secondary btn-large">
                    Explore Courses
                </a>
            </div>
        </div>
    </section>

    <!-- Footer - Premium -->
    <footer class="landing-footer">
        <div class="footer-content">
            <div class="footer-brand">
                <i class="fa-solid fa-lines-leaning"></i>
                <span class="logo-text">E<span class="accent">Learn</span></span>
                <p>Empowering learners worldwide with quality education and cutting-edge technology.</p>
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Platform</h4>
                    <a href="#">Courses</a>
                    <a href="#">Features</a>
                    <a href="#">Pricing</a>
                    <a href="#">For Teams</a>
                </div>
                <div class="footer-column">
                    <h4>Company</h4>
                    <a href="#">About Us</a>
                    <a href="#">Careers</a>
                    <a href="#">Blog</a>
                    <a href="#">Press</a>
                </div>
                <div class="footer-column">
                    <h4>Support</h4>
                    <a href="#">Help Center</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 E-Learn. All rights reserved. Made with ❤️ for learners worldwide.</p>
        </div>
    </footer>
</div>

<!-- Smooth Scroll Script -->
<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.card, .course-card, .stat-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'all 0.6s ease-out';
    observer.observe(el);
});
</script>

@endsection