<!-- resources/views/admin/settings/index.blade.php -->
@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Созламалар</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <h5 class="mb-3">Умумий Созламалар</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="site_name" class="form-label">Сайт Номи</label>
                        <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $settings->firstWhere('key', 'site_name')->value ?? '' }}">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="site_email" class="form-label">Эмаил</label>
                        <input type="email" class="form-control" id="site_email" name="site_email" value="{{ $settings->firstWhere('key', 'site_email')->value ?? '' }}">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="site_phone" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="site_phone" name="site_phone" value="{{ $settings->firstWhere('key', 'site_phone')->value ?? '' }}">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="site_address" class="form-label">Манзил</label>
                        <input type="text" class="form-control" id="site_address" name="site_address" value="{{ $settings->firstWhere('key', 'site_address')->value ?? '' }}">
                    </div>
                </div>
            </div>
            
            <div class="mb-4">
                <h5 class="mb-3">Контент Созламалари</h5>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="hero_title" class="form-label">Ҳеро Сарлавҳа</label>
                        <input type="text" class="form-control" id="hero_title" name="hero_title" value="{{ $settings->firstWhere('key', 'hero_title')->value ?? '' }}">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="hero_description" class="form-label">Ҳеро Тавсиф</label>
                        <textarea class="form-control" id="hero_description" name="hero_description" rows="3">{{ $settings->firstWhere('key', 'hero_description')->value ?? '' }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Сақлаш
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Маълумотлар Базаси</h5>
    </div>
    <div class="card-body">
        <p>Маълумотлар базаси ҳолати:</p>
        <ul>
            <li>Features: {{ \App\Models\Feature::count() }} та</li>
            <li>Testimonials: {{ \App\Models\Testimonial::count() }} та</li>
            <li>Statistics: {{ \App\Models\Statistic::count() }} та</li>
            <li>Settings: {{ \App\Models\Setting::count() }} та</li>
        </ul>
        
        <div class="mt-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-tachometer-alt"></i> Дашбоардга Қайтиш
            </a>
        </div>
    </div>
</div>
@endsection