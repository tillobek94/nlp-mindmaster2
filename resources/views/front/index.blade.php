<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($settings->where('key', 'site_name')->first()->value ?? 'Келажак инсонлари академияси') }} - Ҳаётингизни Трансформация қилинг</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #f59e0b;
            --secondary-dark: #d97706;
            --accent: #8b5cf6;
            --dark: #0f172a;
            --dark-light: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
            --glass: rgba(255, 255, 255, 0.05);
            --shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 30px 60px rgba(0, 0, 0, 0.15);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.7;
            overflow-x: hidden;
        }
        
        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Glassmorphism эффект */
        .glass {
            background: var(--glass);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }
        
        /* Modern Header */
        header {
            position: fixed;
            top: 20px;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 0 20px;
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 30px;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(15px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow);
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .logo-icon {
            font-size: 2.2rem;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 32px;
        }
        
        nav a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s;
            position: relative;
            padding: 8px 0;
        }
        
        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient);
            transition: width 0.3s;
        }
        
        nav a:hover::after {
            width: 100%;
        }
        
        .nav-cta {
            background: var(--gradient);
            color: white;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
            border: none;
        }
        
        .nav-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.4);
            color: white;
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Hero Section - Modern Design */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 100px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 40% 80%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
            z-index: -1;
        }
        
        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        
        .hero-text h1 {
            font-size: 3.8rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            background: linear-gradient(to right, #fff 0%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero-text p {
            font-size: 1.2rem;
            color: #cbd5e1;
            margin-bottom: 40px;
            max-width: 90%;
        }
        
        .hero-features {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 40px;
        }
        
        .hero-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.1rem;
        }
        
        .hero-feature i {
            color: var(--secondary);
            font-size: 1.3rem;
        }
        
        .hero-buttons {
            display: flex;
            gap: 20px;
        }
        
        .btn-primary {
            background: var(--gradient);
            color: white;
            padding: 18px 36px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        
        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.4);
            color: white;
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 18px 36px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
        }
        
        .hero-visual {
            position: relative;
        }
        
        .floating-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow-lg);
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-card:nth-child(2) {
            position: absolute;
            top: -30px;
            right: -30px;
            animation-delay: 2s;
        }
        
        .floating-card:nth-child(3) {
            position: absolute;
            bottom: -30px;
            left: -30px;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        /* Stats Section */
        .stats {
            padding: 100px 0;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(99, 102, 241, 0.3);
        }
        
        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        
        /* Features Grid */
        .features {
            padding: 100px 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(to right, #fff 0%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .section-subtitle {
            font-size: 1.2rem;
            color: #cbd5e1;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 24px;
            padding: 40px 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            opacity: 0;
            transition: opacity 0.3s;
            z-index: -1;
        }
        
        .feature-card:hover::before {
            opacity: 0.1;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(99, 102, 241, 0.3);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--gradient);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }
        
        /* Testimonials */
        .testimonials {
            padding: 100px 0;
        }
        
        .testimonial-slider {
            display: flex;
            gap: 30px;
            overflow-x: auto;
            padding: 20px 0;
            scrollbar-width: none;
        }
        
        .testimonial-slider::-webkit-scrollbar {
            display: none;
        }
        
        .testimonial-card {
            flex: 0 0 auto;
            width: 400px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .testimonial-text {
            font-size: 1.1rem;
            font-style: italic;
            margin-bottom: 25px;
            line-height: 1.8;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient);
        }
        
        /* CTA Section */
        .cta-section {
            padding: 100px 0;
            text-align: center;
        }
        
        .cta-card {
            background: var(--gradient);
            border-radius: 32px;
            padding: 80px 60px;
            position: relative;
            overflow: hidden;
        }
        
        .cta-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><path fill="rgba(255,255,255,0.1)" d="M0,0H1000V1000H0Z"/></svg>');
            opacity: 0.1;
        }
        
        .cta-title {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 20px;
        }
        
        .cta-subtitle {
            font-size: 1.3rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        
        /* Footer */
        footer {
            padding: 80px 0 40px;
            background: rgba(15, 23, 42, 0.95);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }
        
        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 25px;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-link {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            background: var(--gradient);
            transform: translateY(-5px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: #94a3b8;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .hero-text p {
                max-width: 100%;
            }
            
            nav ul {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero-buttons {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
        
        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 2.8rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
            
            .cta-title {
                font-size: 2.5rem;
            }
            
            .nav-container {
                padding: 15px 20px;
            }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--gradient);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Header qismida: -->
<header>
    <div class="container">
        <nav class="nav-container">
            <div class="logo">
                <i class="fas fa-brain logo-icon"></i>
                <span>{{ ($settings->where('key', 'site_name')->first()->value ?? 'Келажак инсонлари академияси') }}</span>
            </div>
            
            <ul>
                <li><a href="{{ url('/') }}">Асосий</a></li>
                <li><a href="{{ route('about') }}">Биз ҳақимизда</a></li>
                <li><a href="#features">Хусусиятлар</a></li>
                <li><a href="#results">Натижалар</a></li>
                <li><a href="{{ route('contact') }}">Боғланиш</a></li>
                @auth
                <li><a href="{{ route('admin.dashboard') }}">Админ</a></li>
                @endauth
            </ul>
            
            <a href="{{ route('contact') }}" class="nav-cta">Боғланиш</a>
            
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </div>
</header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>{{ ($settings->where('key', 'hero_title')->first()->value ?? 'Медитация ва амалиётлар маркази') }}</h1>
                    <p>{{ ($settings->where('key', 'hero_description')->first()->value ?? 'Бу - минглаб аёллар ва эркаклар ўзлари ҳамда бутун олам билан уйғунликни топа олган жой. Балансни, энергиянгизни ва ичингиздаги бойликни топингИчки салоҳиятингизни очинг ва истиқболингизни яратинг.') }}</p>
                    
                    <div class="hero-features">
                        <div class="hero-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Шахсий ривожланиш учун инновацион методлар</span>
                        </div>
                        <div class="hero-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Илмий асосланган НЛП техникалари</span>
                        </div>
                        <div class="hero-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Халқаро тренерлар томонидан кузатилувчи дастур</span>
                        </div>
                    </div>
                    
                    <div class="hero-buttons">
                        <button class="btn-primary" onclick="window.location.href='{{ route('contact') }}'">
                            <i class="fas fa-play-circle"></i>
                            БЕПУЛ ДАРС БОШЛАШ
                        </button>
                        <button class="btn-secondary" onclick="window.location.href='{{ route('contact') }}'">
                            <i class="fas fa-calendar-alt"></i>
                            КОНСУЛЬТАЦИЯГА ЁЗИЛИШ
                        </button>
                    </div>
                </div>
                
                <div class="hero-visual">
                    <div class="floating-card glass">
                        <h3>🎯 3 Ойда Натижа</h3>
                        <p>Биринчи 3 ойда ўзингизда сезадиган ўзгаришлар</p>
                    </div>
                    <div class="floating-card glass">
                        <h3>🧠 90% Самарадорлик</h3>
                        <p>Илмий тадқиқотлар асосида ишлайдиган методлар</p>
                    </div>
                    <div class="floating-card glass">
                        <h3>⭐ 
                            @php
                                $studentsStat = $statistics->first(function($item) {
                                    return stripos($item->title_uz ?? '', 'Ўкувчи') !== false || 
                                           stripos($item->title_uz ?? '', 'Student') !== false ||
                                           stripos($item->title_uz ?? '', 'O\'quvchi') !== false;
                                });
                            @endphp
                            {{ $studentsStat->number ?? '5000+' }} Ўкувчи
                        </h3>
                        <p>Дунёнинг 
                            @php
                                $countriesStat = $statistics->first(function($item) {
                                    return stripos($item->title_uz ?? '', 'Мамлакат') !== false || 
                                           stripos($item->title_uz ?? '', 'Country') !== false ||
                                           stripos($item->title_uz ?? '', 'Mamlakat') !== false;
                                });
                            @endphp
                            {{ $countriesStat->number ?? '50+' }} мамлакатидан ижобий фикрлар
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-container">
                @if(isset($statistics) && $statistics->count() > 0)
                    @foreach($statistics as $statistic)
                    <div class="stat-card">
                        <div class="stat-number" style="{{ isset($statistic->color) && $statistic->color ? 'color: ' . $statistic->color : '' }}">
                            {{ $statistic->number ?? '0' }}
                        </div>
                        <p>{{ $statistic->title_uz ?? 'Statistic' }}</p>
                    </div>
                    @endforeach
                @else
                    <div class="stat-card">
                        <div class="stat-number">5000+</div>
                        <p>Ўкувчи</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">50+</div>
                        <p>Мамлакат</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">90%</div>
                        <p>Ёкилғи</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">10+ йил</div>
                        <p>Тажриба</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Нимa Учун Aйнан Биз?</h2>
                <p class="section-subtitle">Нега айнан "NLP MindMaster"ни танлашади:</p>
            </div>
            
            <div class="features-grid">
                @if(isset($features) && $features->count() > 0)
                    @foreach($features as $feature)
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="{{ $feature->icon ?? 'fas fa-star' }}"></i>
                        </div>
                        <h3>{{ $feature->title_uz ?? 'Feature' }}</h3>
                        <p>{{ $feature->description_uz ?? 'Feature description' }}</p>
                    </div>
                    @endforeach
                @else
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3>НЛП Технологиялари</h3>
                        <p>Илмий асосланган нейролингвистик дастурлаш техникалари</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Шахсий Ёндашув</h3>
                        <p>Ҳар бир ўкувчи учун алоҳида ишланган дастур</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Натижадорлик</h3>
                        <p>90% ёкилғи билан исботланган методлар</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials" id="results">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Трансформация Тажрибалари</h2>
                <p class="section-subtitle">Бизнинг дарсларимизда иштирок этиб, ҳаёти ўзгарганларнинг ишончли фикрлари</p>
            </div>
            
            <div class="testimonial-slider">
                @if(isset($testimonials) && $testimonials->count() > 0)
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "{{ $testimonial->content_uz ?? 'Ajoyib tajriba! Men o\'zimni butunlay o\'zgartirdim.' }}"
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                @if(isset($testimonial->avatar) && $testimonial->avatar)
                                    <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->author_name ?? 'Mijoz' }}" width="50" height="50" style="border-radius: 50%;">
                                @else
                                    <div style="width: 50px; height: 50px; border-radius: 50%; background: var(--gradient); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                        {{ substr($testimonial->author_name ?? 'M', 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h4>{{ $testimonial->author_name ?? 'Maxfiy Mijoz' }}</h4>
                                <p>{{ $testimonial->author_position ?? 'MBA' }}</p>
                                <div>
                                    @php
                                        $rating = $testimonial->rating ?? 5;
                                    @endphp
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star" style="color: {{ $i <= $rating ? '#f59e0b' : '#64748b' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Bu kurs mening hayotimni butunlay o'zgartirdi. Endi o'zimga ishonch hosil qildim va kariyeramda muvaffaqiyatga erishdim."
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <div style="width: 50px; height: 50px; border-radius: 50%; background: var(--gradient); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                    S
                                </div>
                            </div>
                            <div>
                                <h4>Sarvar</h4>
                                <p>IT Menejeri</p>
                                <div>
                                    <i class="fas fa-star" style="color: #f59e0b"></i>
                                    <i class="fas fa-star" style="color: #f59e0b"></i>
                                    <i class="fas fa-star" style="color: #f59e0b"></i>
                                    <i class="fas fa-star" style="color: #f59e0b"></i>
                                    <i class="fas fa-star" style="color: #f59e0b"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="contact">
        <div class="container">
            <div class="cta-card">
                <h2 class="cta-title">Ҳаётингизни Трансформация Килаётиб Туринг</h2>
                <p class="cta-subtitle">Бугунги кун ўз-ўзингизга берадиган энг яхши инвестиция - ўзингизга инвестиция</p>
                <a href="{{ route('contact') }}" class="btn-primary" style="background: white; color: var(--dark);">
                    <i class="fas fa-rocket"></i>
                    БОҒЛАНИШ САҲИФАСИГА ЎТИШ
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <div class="logo">
                        <i class="fas fa-brain"></i>
                        <span>{{ ($settings->where('key', 'site_name')->first()->value ?? 'Келажак инсонлари академияси') }}</span>
                    </div>
                    <p>Шахсий ривожланиш ва НЛП технологиялари бўйича халқаро платформа.</p>
                    <div class="social-links">
                        <a href="https://t.me/TaliaHalaba_KIA" class="social-link"><i class="fab fa-telegram"></i></a>
                        <a href="https://www.instagram.com/talia_xalaba" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@Talia_Halaba" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.facebook.com/TaliaHalaba.ALB" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.facebook.com/TaliaHalaba.ALB" class="social-link"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Қулланма</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Асосий</a></li>
                        <li><a href="{{ route('about') }}">Биз ҳақимизда</a></li>
                        <li><a href="#features">Курслар</a></li>
                        <li><a href="#results">Натижалар</a></li>
                        <li><a href="{{ route('contact') }}">Боғланиш</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Хизматлар</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('contact') }}">Шахсий Кочинг</a></li>
                        <li><a href="{{ route('contact') }}">Корпоратив Тренинглар</a></li>
                        <li><a href="{{ route('contact') }}">НЛП Мастер Класс</a></li>
                        <li><a href="{{ route('contact') }}">Онлайн Курслар</a></li>
                        <li><a href="{{ route('contact') }}">Китоблар</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Боғланиш</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-envelope"></i> {{ ($settings->where('key', 'site_email')->first()->value ?? 'info@nlpmindmaster.uz') }}</li>
                        <li><i class="fas fa-phone"></i> {{ ($settings->where('key', 'site_phone')->first()->value ?? '+998785553007') }}</li>
                        <li><i class="fas fa-map-marker-alt"></i> {{ ($settings->where('key', 'site_address')->first()->value ?? 'Тошкент, Ўзбекистон') }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>© {{ date('Y') }} {{ ($settings->where('key', 'site_name')->first()->value ?? 'Келажак инсонлари академияси') }}. Барча ҳуқуқлар химояланган.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const nav = document.querySelector('nav ul');
        
        mobileMenuBtn.addEventListener('click', () => {
            nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
            mobileMenuBtn.innerHTML = nav.style.display === 'flex' 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
            
            if (nav.style.display === 'flex') {
                nav.style.flexDirection = 'column';
                nav.style.position = 'absolute';
                nav.style.top = '100%';
                nav.style.left = '0';
                nav.style.right = '0';
                nav.style.background = 'rgba(15, 23, 42, 0.95)';
                nav.style.backdropFilter = 'blur(10px)';
                nav.style.padding = '30px';
                nav.style.gap = '20px';
                nav.style.borderRadius = '0 0 20px 20px';
                nav.style.borderTop = '1px solid rgba(255, 255, 255, 0.1)';
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    if (window.innerWidth <= 1024) {
                        nav.style.display = 'none';
                        mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                    }
                }
            });
        });

        // Testimonial slider
        const slider = document.querySelector('.testimonial-slider');
        if (slider) {
            let scrollAmount = 0;
            
            function autoScrollTestimonials() {
                if (slider.scrollWidth > slider.clientWidth) {
                    scrollAmount += 410;
                    if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
                        scrollAmount = 0;
                    }
                    slider.scrollTo({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                }
            }
            
            setInterval(autoScrollTestimonials, 5000);
        }
    </script>
</body>
</html>