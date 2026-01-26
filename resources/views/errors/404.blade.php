<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Саҳифа Топилмади</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --dark: #0f172a;
        }
        
        body {
            background-color: var(--dark);
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .error-container {
            text-align: center;
            padding: 40px;
            max-width: 600px;
        }
        
        .error-code {
            font-size: 8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 20px;
        }
        
        .error-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .error-message {
            font-size: 1.1rem;
            color: #cbd5e1;
            margin-bottom: 30px;
        }
        
        .btn-home {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }
        
        .btn-home:hover {
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }
        
        .search-box {
            max-width: 400px;
            margin: 30px auto;
        }
        
        .search-input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            width: 100%;
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        @media (max-width: 768px) {
            .error-code {
                font-size: 6rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        
        <h1 class="error-title"> Саҳифа Топилмади</h1>
        
        <p class="error-message">
           Кечирасиз, сиз қидирган саҳифа мавжуд эмас ёки ўчирилган.
            Илтимос, саҳифа манзилини текширинг ёки асосий саҳифага қайтинг.
        </p>
        
        <div class="search-box">
            <input type="text" class="search-input" placeholder="Sahifa qidirish...">
        </div>
        
        <div class="mt-4">
            <a href="{{ url('/') }}" class="btn-home">
                <i class="fas fa-home"></i>
                Асосий Саҳифага Қайтиш
            </a>
            
            <a href="{{ route('about') }}" class="btn-home ms-3">
                <i class="fas fa-info-circle"></i>
              Биз Ҳақимизда
            </a>
            
            @auth
            <a href="{{ route('admin.dashboard') }}" class="btn-home ms-3">
                <i class="fas fa-tachometer-alt"></i>
                Админ Панел
            </a>
            @endauth
        </div>
        
        <div class="mt-5 text-muted">
            <small>
                Агар бу хатолик давом этса, илтимос биз билан боғланинг: 
                <a href="mailto:{{ $site_email ?? 'info@nlpmindmaster.uz' }}" 
                   style="color: #818cf8;">
                    {{ $site_email ?? 'info@nlpmindmaster.uz' }}
                </a>
            </small>
        </div>
    </div>

    <script>
        // Search funksiyasi
        document.querySelector('.search-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const query = this.value.trim();
                if (query) {
                    // Bu yerda search funksiyasini qo'shishingiz mumkin
                    alert('Qidiruv funksiyasi tez orada qo\'shiladi. Siz qidirdingiz: ' + query);
                }
            }
        });
        
        // Vaqt o'tishi bilan asosiy sahifaga yo'naltirish
        setTimeout(function() {
            // 30 soniyadan keyin asosiy sahifaga yo'naltiradi
            // document.querySelector('.btn-home').click();
        }, 30000);
    </script>
</body>
</html>