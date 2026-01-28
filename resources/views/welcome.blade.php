<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NLP MindMaster</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header { text-align: center; padding: 40px 0; }
        .features { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
        .card { border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>NLP MindMaster</h1>
            <p>Welcome to our website</p>
        </div>
        
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        
        <nav>
            <a href="/">Home</a> | 
            <a href="/about">About</a> | 
            <a href="/contact">Contact</a>
            @auth
                | <a href="/admin/dashboard">Admin</a>
            @endauth
        </nav>
        
        <h2>Features</h2>
        <div class="features">
            @forelse($features as $feature)
                <div class="card">
                    <h3>{{ $feature->title }}</h3>
                    <p>{{ $feature->description }}</p>
                </div>
            @empty
                <p>No features available</p>
            @endforelse
        </div>
        
        <h2>Testimonials</h2>
        <div class="features">
            @forelse($testimonials as $testimonial)
                <div class="card">
                    <p>"{{ $testimonial->content }}"</p>
                    <p><strong>- {{ $testimonial->author }}</strong></p>
                </div>
            @empty
                <p>No testimonials yet</p>
            @endforelse
        </div>
        
        <h2>Statistics</h2>
        <div class="features">
            @forelse($statistics as $stat)
                <div class="card">
                    <h3>{{ $stat->value }}+</h3>
                    <p>{{ $stat->title }}</p>
                </div>
            @empty
                <p>No statistics available</p>
            @endforelse
        </div>
    </div>
</body>
</html>
