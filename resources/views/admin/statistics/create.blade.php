<!-- resources/views/admin/statistics/create.blade.php -->
@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Янги Статистика Қўшиш</h1>
    <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Орқага
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.statistics.store') }}" method="POST">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="number" class="form-label">Рақам</label>
                    <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}" required>
                    <small class="text-muted">Мисол: 95%, 5000+, 24/7</small>
                </div>
                
                <div class="col-md-4">
                    <label for="icon" class="form-label">Icon (FontAwesome)</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', 'fas fa-chart-bar') }}">
                    <small class="text-muted">Мисол: fas fa-chart-bar, fas fa-users</small>
                </div>
                
                <div class="col-md-4">
                    <label for="color" class="form-label">Ранг</label>
                    <input type="color" class="form-control form-control-color" id="color" name="color" value="{{ old('color', '#6366f1') }}" title="Rangni tanlang">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="title_uz" class="form-label">Сарлавҳа (UZ)</label>
                    <input type="text" class="form-control" id="title_uz" name="title_uz" value="{{ old('title_uz') }}" required>
                </div>
                
                <div class="col-md-4">
                    <label for="title_ru" class="form-label">Сарлавҳа (RU)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ old('title_ru') }}">
                </div>
                
                <div class="col-md-4">
                    <label for="title_en" class="form-label">Сарлавҳа (EN)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="order" class="form-label">Тартиб</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}">
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Ҳолат</label>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">
                           Фаол
                        </label>
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
@endsection