@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Дашбоард</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-external-link-alt"></i> Сайтни Кўриш
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Хусусиятлар</h5>
                        <h2 class="text-primary">{{ $stats['features_count'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-star fa-2x text-primary"></i>
                    </div>
                </div>
                <a href="{{ route('admin.features.index') }}" class="btn btn-sm btn-outline-primary mt-2">
                    <i class="fas fa-eye"></i> Кўриш
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Шарҳлар</h5>
                        <h2 class="text-success">{{ $stats['testimonials_count'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-comment fa-2x text-success"></i>
                    </div>
                </div>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-success mt-2">
                    <i class="fas fa-eye"></i> Кўриш
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Статистика</h5>
                        <h2 class="text-info">{{ $stats['statistics_count'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-chart-bar fa-2x text-info"></i>
                    </div>
                </div>
                <a href="{{ route('admin.statistics.index') }}" class="btn btn-sm btn-outline-info mt-2">
                    <i class="fas fa-eye"></i> Кўриш
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Фаол Хусусиятлар</h5>
                        <h2 class="text-warning">{{ $stats['active_features'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x text-warning"></i>
                    </div>
                </div>
                <a href="{{ route('admin.features.index') }}" class="btn btn-sm btn-outline-warning mt-2">
                    <i class="fas fa-eye"></i> Кўриш
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Тезкор Амаллар</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <a href="{{ route('admin.features.create') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-plus me-2"></i> Янги Хусусият
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-success w-100 mb-2">
                            <i class="fas fa-plus me-2"></i> Янги Шарҳ
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.statistics.create') }}" class="btn btn-info w-100 mb-2">
                            <i class="fas fa-plus me-2"></i> Янги Статистика
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.settings.index') }}" class="btn btn-warning w-100 mb-2">
                            <i class="fas fa-cog me-2"></i> Созламалар
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Сўнгги Хусусиятлар</h5>
            </div>
            <div class="card-body">
                @php
                    $recentFeatures = \App\Models\Feature::latest()->take(5)->get();
                @endphp
                @if($recentFeatures->count() > 0)
                    <div class="list-group">
                        @foreach($recentFeatures as $feature)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="{{ $feature->icon }} me-2"></i>
                                {{ $feature->title_uz }}
                                @if($feature->is_active)
                                    <span class="badge bg-success ms-2">Фаол</span>
                                @else
                                    <span class="badge bg-secondary ms-2">Нофаол</span>
                                @endif
                            </div>
                            <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">Ҳали хусусият қўшилмаган</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Сўнгги Шарҳлар</h5>
            </div>
            <div class="card-body">
                @php
                    $recentTestimonials = \App\Models\Testimonial::latest()->take(5)->get();
                @endphp
                @if($recentTestimonials->count() > 0)
                    <div class="list-group">
                        @foreach($recentTestimonials as $testimonial)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $testimonial->author_name }}</strong>
                                <div class="small text-muted">{{ $testimonial->author_position }}</div>
                            </div>
                            <div>
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">Ҳали шарҳ қўшилмаган</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection