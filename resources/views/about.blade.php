<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title_uz }} - {{ $settings->firstWhere('key', 'site_name')->value ?? 'Келажак инсонлари академияси' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #f59e0b;
            --dark: #0f172a;
            --light: #f8fafc;
            --gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
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
        }
        
        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
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
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
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
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 32px;
        }
        
        nav a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
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
        
        nav a:hover::after,
        nav a.active::after {
            width: 100%;
        }
        
        nav a.active {
            color: var(--primary-light);
        }
        
        /* Hero Section */
        .about-hero {
            min-height: 60vh;
            display: flex;
            align-items: center;
            padding: 150px 0 80px;
            position: relative;
            overflow: hidden;
        }
        
        .about-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%);
            z-index: -1;
        }
        
        .about-hero-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .about-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(to right, #fff 0%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .about-hero p {
            font-size: 1.2rem;
            color: #cbd5e1;
            margin-bottom: 40px;
        }
        
        /* About Content */
        .about-content {
            padding: 100px 0;
        }
        
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        
        .about-image {
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .about-text h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .about-text p {
            font-size: 1.1rem;
            color: #cbd5e1;
            margin-bottom: 20px;
            line-height: 1.8;
        }
        
        /* Mission Section */
        .mission-section {
            padding: 100px 0;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 40px;
        }
        
        .mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }
        
        .mission-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s;
        }
        
        .mission-card:hover {
            transform: translateY(-10px);
            border-color: rgba(99, 102, 241, 0.3);
            background: rgba(255, 255, 255, 0.05);
        }
        
        .mission-icon {
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
        
        .mission-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: white;
        }
        
        /* Stats in About */
        .about-stats {
            padding: 80px 0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        
        /* CTA Section */
        .about-cta {
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
        
        .cta-card h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
        }
        
        .cta-card p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        
        .btn-primary {
            background: white;
            color: var(--dark);
            padding: 18px 36px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        
        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(255, 255, 255, 0.2);
        }
        
        /* Footer */
        footer {
            padding: 80px 0 40px;
            background: rgba(15, 23, 42, 0.95);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .about-grid {
                grid-template-columns: 1fr;
            }
            
            .about-hero h1 {
                font-size: 2.8rem;
            }
            
            nav ul {
                gap: 20px;
            }
        }
        
        @media (max-width: 768px) {
            .nav-container {
                padding: 15px 20px;
            }
            
            .about-hero {
                padding: 120px 0 60px;
            }
            
            .about-hero h1 {
                font-size: 2.2rem;
            }
            
            .about-text h2 {
                font-size: 2rem;
            }
            
            .cta-card {
                padding: 50px 30px;
            }
            
            .cta-card h2 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="nav-container">
                <div class="logo">
                    <i class="fas fa-brain"></i>
                    <span>{{ $settings->firstWhere('key', 'site_name')->value ?? 'Келажак инсонлари академияси' }}</span>
                </div>
                
                <ul>
                    <li><a href="{{ url('/') }}">Асосий</a></li>
                    <li><a href="{{ route('about') }}" class="active">Биз ҳақимизда</a></li>
                    <li><a href="{{ url('/#features') }}">Хусусиятлар</a></li>
                    <li><a href="{{ url('/#results') }}">Натижалар</a></li>
                    <li><a href="{{ url('/#contact') }}">Боғланиш</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="about-hero-bg"></div>
        <div class="container">
            <div class="about-hero-content">
                <h1>{{ $page->title_uz }}</h1>
                <p>Келажак инсонлари академияс - шахсий ривожланиш ва онг ости дастурларни қайта ёзиш бўйича етакчи платформа</p>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="about-content">
        <div class="container">
            <div class="about-grid">
                @if($page->image)
                <div class="about-image">
                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title_uz }}">
                </div>
                @endif
                
                <div class="about-text">
                    <h2>Бизнинг Вазифамиз</h2>
                    <p>{{ $page->content_uz }}</p>
                    <p>Бизнинг мақсадимиз - ҳар бир инсонга ўз ички салоҳиятини очишда ёрдам бериш, уларнинг ҳаётини ижобий томонга ўзгартириш ва профессионал ривожланишларига кўмаклашиш.</p>
                    <p>10 йиллик тажрибага эга мутахассислар жамоа сифатида биз энг илғор НЛП ва коачинг методологияларидан фойдаланамиз.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="container">
            <div class="about-hero-content">
                <h2>Бизнинг Қадриятларимиз</h2>
                <p>Бизнинг ишимизнинг асоси бўлган асосий тамойиллар</p>
            </div>
            
            <div class="mission-grid">
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Аниқлик</h3>
                    <p>Ҳар бир мижозимизнинг аниқ мақсадлари ва натижаларга йўналтирилган ёндашув</p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Эътибор</h3>
                    <p>Ҳар бир шахсга индивидуал эътибор ва махсус ёндашув</p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Ривожланиш</h3>
                    <p>Доимий ўзгаришлар ва инновацион технологияларга мослашиш</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="about-stats">
        <div class="container">
            <div class="about-hero-content">
                <h2>Бизнинг Рақамларимиз</h2>
                <p>Кўп йиллик иш тажрибамиз натижалари</p>
            </div>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">5000+</div>
                    <p>Муваффақиятли Ўқувчилар</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    
                  <p>Халқаро Мамалакатлар</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <p>Мижозлар Қониқиши</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <p>Йиллик Тажриба</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section (kelajakda qo'shish mumkin) -->
    <section class="mission-section">
        <div class="container">
            <div class="about-hero-content">
                <h2>Бизнинг Жамоа</h2>
                <p>Мутахассислар жамоаси билан танишишингиз мумкин</p>
                <p style="color: #94a3b8; margin-top: 20px;">Тез орада жамоа аъзолари ҳақида маълумот қўшилади...</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="about-cta">
        <div class="container">
            <div class="cta-card">
                <h2>Биз Билан Ҳамкорлик Қилишни Хоҳлайсизми?</h2>
                <p>Келинг, биргаликда янада кучли натижаларга эришамиз</p>
                <a href="{{ url('/#contact') }}" class="btn-primary">
                    <i class="fas fa-handshake"></i>
                    Боғланиш
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
                        <span>{{ $settings->firstWhere('key', 'site_name')->value ?? 'Келажак инсонлари академияси' }}</span>
                    </div>
                    <p>Шахсий ривожланиш ва НЛП технологиялари бўйича етакчи платформа.</p>
                    <div class="social-links">
                        <a href="https://t.me/TaliaHalaba_KIA" class="social-link"><i class="fab fa-telegram"></i></a>
                        <a href="https://www.instagram.com/talia_xalaba" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@Talia_Halaba" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.facebook.com/TaliaHalaba.ALB" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.facebook.com/TaliaHalaba.ALB" class="social-link"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Саҳифалар</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Асосий</a></li>
                        <li><a href="{{ route('about') }}">Биз ҳақимизда</a></li>
                        <li><a href="{{ url('/#features') }}">Хизматлар</a></li>
                        <li><a href="{{ url('/#results') }}">Натижалар</a></li>
                        <li><a href="{{ url('/#contact') }}">Боғланиш</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Контакт</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-envelope"></i> {{ $settings->firstWhere('key', 'site_email')->value ?? 'TaliaXalaba_KIA.uz' }}</li>
                        <li><i class="fas fa-phone"></i> {{ $settings->firstWhere('key', 'site_phone')->value ?? '+998785553007' }}</li>
                        <li><i class="fas fa-map-marker-alt"></i> {{ $settings->firstWhere('key', 'site_address')->value ?? 'Toshkent, O\'zbekiston' }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>© {{ date('Y') }} {{ $settings->firstWhere('key', 'site_name')->value ?? 'Келажак инсонлари академияси' }}. Барча ҳуқуқлар ҳимояланган.</p>
            </div>
        </div>
    </footer>

    <script>
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
                }
            });
        });

        // Mobile menu toggle (kelajakda qo'shish)
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                const nav = document.querySelector('nav ul');
                nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
            });
        }
    </script>
</body>
</html>