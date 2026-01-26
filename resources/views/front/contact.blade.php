<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title_uz ?? 'Бог\'ланиш' }} - {{ $settings->firstWhere('key', 'site_name')->value ?? 'Келажак инсонлари академияси' }}</title>
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
        
        /* Contact Hero */
        .contact-hero {
            min-height: 40vh;
            display: flex;
            align-items: center;
            padding: 150px 0 80px;
            position: relative;
            overflow: hidden;
        }
        
        .contact-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%);
            z-index: -1;
        }
        
        .contact-hero-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .contact-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(to right, #fff 0%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .contact-hero p {
            font-size: 1.2rem;
            color: #cbd5e1;
        }
        
        /* Contact Section */
        .contact-section {
            padding: 80px 0 100px;
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
        }
        
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Contact Form */
        .contact-form-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .contact-form-card h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        @media (max-width: 480px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #cbd5e1;
        }
        
        input, textarea {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-light);
            background: rgba(255, 255, 255, 0.08);
        }
        
        textarea {
            resize: vertical;
            min-height: 150px;
        }
        
        .btn-submit {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 16px 40px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.3);
        }
        
        /* Success Alert */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 30px;
        }
        
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #4ade80;
        }
        
        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
        }
        
        .alert ul {
            list-style: none;
            margin-top: 10px;
        }
        
        .error {
            color: #f87171;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }
        
        /* Contact Info */
        .contact-info-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .contact-info-card h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .contact-info-item {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .contact-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        
        .contact-info-item h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: white;
        }
        
        .contact-info-item p {
            color: #cbd5e1;
            line-height: 1.6;
        }
        
        /* Social Links */
        .social-links-contact {
            display: flex;
            gap: 15px;
            margin-top: 40px;
        }
        
        .social-link {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            background: var(--gradient);
            transform: translateY(-5px);
        }
        
        /* Map Section */
        .map-section {
            padding: 0 0 100px;
        }
        
        .map-placeholder {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            text-align: center;
        }
        
        .map-placeholder h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .map-frame {
            height: 300px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            border: 2px dashed rgba(255, 255, 255, 0.1);
            gap: 15px;
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
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .footer-links i {
            color: var(--primary-light);
            width: 20px;
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
        
        .copyright {
            text-align: center;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: #94a3b8;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                padding: 15px 20px;
            }
            
            nav ul {
                gap: 20px;
                font-size: 0.9rem;
            }
            
            .contact-hero {
                padding: 120px 0 60px;
            }
            
            .contact-hero h1 {
                font-size: 2.5rem;
            }
            
            .contact-form-card,
            .contact-info-card {
                padding: 30px;
            }
            
            .contact-info-item {
                flex-direction: column;
                gap: 10px;
            }
        }
        
        @media (max-width: 480px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .contact-hero h1 {
                font-size: 2rem;
            }
            
            .btn-submit {
                width: 100%;
                justify-content: center;
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
                    <li><a href="{{ route('about') }}">Биз ҳақимизда</a></li>
                    <li><a href="{{ url('/#features') }}">Хизматлар</a></li>
                    <li><a href="{{ url('/#results') }}">Натижалар</a></li>
                    <li><a href="{{ route('contact') }}" class="active">Боғланиш</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="contact-hero-bg"></div>
        <div class="container">
            <div class="contact-hero-content">
                <h1>{{ $page->title_uz ?? 'Биз Билан Бог\'ланинг' }}</h1>
                <p>{{ $page->content_uz ?? 'Саволларингиз бо\'лса ёки ҳамкорлик қилишни истасангиз, қуйидаги формани то\'лдиринг' }}</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form-card">
                    <h2>Хабар Қолдиринг</h2>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Хатоликлар топилди:</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Исмингиз *</label>
                                <input type="text" id="name" name="name" required 
                                       value="{{ old('name') }}" 
                                       placeholder="Исмингизни киритинг">
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Эмаил манзилингиз *</label>
                                <input type="email" id="email" name="email" required
                                       value="{{ old('email') }}"
                                       placeholder="email@example.com">
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Телефон рақамингиз</label>
                            <input type="tel" id="phone" name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="+998 90 123 45 67">
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Мавзу *</label>
                            <input type="text" id="subject" name="subject" required
                                   value="{{ old('subject') }}"
                                   placeholder="Хабар мавзуси">
                            @error('subject')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Хабарингиз *</label>
                            <textarea id="message" name="message" rows="5" required
                                      placeholder="Хабарингизни ёзинг...">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-paper-plane"></i> Хабарни Юбориш
                        </button>
                    </form>
                </div>
                
                <!-- Contact Information -->
                <div class="contact-info-card">
                    <h2>Боғланиш Маълумотлари</h2>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Манзилимиз</h4>
                            <p>{{ $settings->firstWhere('key', 'site_address')->value ?? 'Toshkent, O\'zbekiston' }}</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4>Телефон рақам</h4>
                            <p>{{ $settings->firstWhere('key', 'site_phone')->value ?? '+998785553007' }}</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Эмаил манзил</h4>
                            <p>{{ $settings->firstWhere('key', 'site_email')->value ?? 'info@nlpmindmaster.uz' }}</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4>Иш вақтимиз</h4>
                            <p>Душанба - Жума: 9:00 - 18:00</p>
                            <p>Шанба: 10:00 - 16:00</p>
                            <p>Якшанба: Дам олиш куни</p>
                        </div>
                    </div>
                    
                    <!-- Social Media Links -->
                     <div class="social-links">
                        <a href="https://t.me/TaliaHalaba_KIA" class="social-link"><i class="fab fa-telegram"></i></a>
                        <a href="https://www.instagram.com/talia_xalaba" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@Talia_Halaba" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.facebook.com/TaliaHalaba.ALB" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.facebook.com/TaliaHalaba.ALB" class="social-link"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section (Optional) -->
    <section class="map-section">
        <div class="container">
            <div class="map-placeholder">
                <h3>Бизнинг Манзилимиз</h3>
                <div class="map-frame">
                    <i class="fas fa-map-marked-alt fa-3x"></i>
                    <p>Харита жойлашуви бу ерда кўрсатилади </p>
                </div>
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
                    <p>Шахсий ривожланиш ва НЛП технологиялари бўйича халқаро платформа.</p>
                    
                </div>
                <!-- Social Media Links -->
                     <div class="social-links">
                        <a href="https://t.me/TaliaHalaba_KIA" class="social-link"><i class="fab fa-telegram"></i></a>
                        <a href="https://www.instagram.com/talia_xalaba" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@Talia_Halaba" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.facebook.com/TaliaHalaba.ALB" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.facebook.com/TaliaHalaba.ALB" class="social-link"><i class="fab fa-facebook"></i></a>
                    </div>
                <div class="footer-column">
                    <h3>Sahifalar</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Асосий</a></li>
                        <li><a href="{{ route('about') }}">Биз ҳақимизда</a></li>
                        <li><a href="{{ url('/#results') }}">Натижалар</a></li>
                        <li><a href="{{ route('contact') }}">Боғланиш</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Контакт</h3>
                    <ul class="footer-links">
                        <li>
                            <i class="fas fa-envelope"></i>
                            {{ $settings->firstWhere('key', 'site_email')->value ?? 'info@nlpmindmaster.uz' }}
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            {{ $settings->firstWhere('key', 'site_phone')->value ?? '+998785553007' }}
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $settings->firstWhere('key', 'site_address')->value ?? 'Toshkent, O\'zbekiston' }}
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>© {{ date('Y') }} {{ $settings->firstWhere('key', 'site_name')->value ?? 'Келажак инсонлари академияси' }}. Барча ҳуқуқлар химояланган.</p>
            </div>
        </div>
    </footer>

    <script>
        // Form validation enhancement
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const subject = document.getElementById('subject').value.trim();
            const message = document.getElementById('message').value.trim();
            
            if (!name || !email || !subject || !message) {
                e.preventDefault();
                alert('Iltimos, barcha majburiy maydonlarni to\'ldiring!');
                return false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Iltimos, to\'g\'ri email manzilini kiriting!');
                return false;
            }
            
            return true;
        });
        
        // Smooth scrolling for anchor links
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
        
        // Auto-hide success message after 5 seconds
        const successMessage = document.querySelector('.alert-success');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.opacity = '0';
                successMessage.style.transition = 'opacity 0.5s';
                setTimeout(() => successMessage.remove(), 500);
            }, 5000);
        }
    </script>
</body>
</html>