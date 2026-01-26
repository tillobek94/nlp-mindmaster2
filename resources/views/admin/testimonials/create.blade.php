<!-- resources/views/admin/testimonials/create.blade.php -->
@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Янги Шарҳ Қўшиш</h1>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i>Орқага
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="author_name" class="form-label">Исм</label>
                    <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name') }}" required>
                </div>
                
                <div class="col-md-6">
                    <label for="author_position" class="form-label">Лавозим</label>
                    <input type="text" class="form-control" id="author_position" name="author_position" value="{{ old('author_position') }}" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="content_uz" class="form-label">Шарҳ (UZ)</label>
                    <textarea class="form-control" id="content_uz" name="content_uz" rows="3" required>{{ old('content_uz') }}</textarea>
                </div>
                
                <div class="col-md-4">
                    <label for="content_ru" class="form-label">Шарҳ (RU)</label>
                    <textarea class="form-control" id="content_ru" name="content_ru" rows="3">{{ old('content_ru') }}</textarea>
                </div>
                
                <div class="col-md-4">
                    <label for="content_en" class="form-label">Шарҳ (EN)</label>
                    <textarea class="form-control" id="content_en" name="content_en" rows="3">{{ old('content_en') }}</textarea>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="avatar" class="form-label">Avatar (Расм)</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                    <small class="text-muted">Расм ҳажми 2МБ дан ошмасин</small>
                </div>
                
                <div class="col-md-4">
                    <label for="rating" class="form-label">Рейтинг</label>
                    <select class="form-control" id="rating" name="rating">
                        <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                        <option value="4">⭐⭐⭐⭐ (4)</option>
                        <option value="3">⭐⭐⭐ (3)</option>
                        <option value="2">⭐⭐ (2)</option>
                        <option value="1">⭐ (1)</option>
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for="order" class="form-label">Тартиб</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}">
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                    <label class="form-check-label" for="is_active">
                        Фаол
                    </label>
                </div>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>Сақлаш
                </button>
            </div>
        </form>
    </div>
</div>
@endsection