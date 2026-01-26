@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Янги Саҳифа Яратиш</h1>
    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Орқага
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="slug" class="form-label">Slug*</label>
                    <input type="text" class="form-control" id="slug" name="slug" 
                           value="{{ old('slug') }}" required placeholder="about, contact, services">
                    <small class="text-muted">URL uchun unikal identifikator</small>
                </div>
                
                <div class="col-md-3">
                    <label for="order" class="form-label">Тартиб</label>
                    <input type="number" class="form-control" id="order" name="order" 
                           value="{{ old('order', 0) }}">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">Ҳолат</label>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="is_active" 
                               name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                             Фаол
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="title_uz" class="form-label">Сарлавҳа (UZ)*</label>
                    <input type="text" class="form-control" id="title_uz" name="title_uz" 
                           value="{{ old('title_uz') }}" required>
                </div>
                
                <div class="col-md-4">
                    <label for="title_ru" class="form-label">Сарлавҳа (RU)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru" 
                           value="{{ old('title_ru') }}">
                </div>
                
                <div class="col-md-4">
                    <label for="title_en" class="form-label">Сарлавҳа (EN)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" 
                           value="{{ old('title_en') }}">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="content_uz" class="form-label">Контент (UZ)*</label>
                    <textarea class="form-control" id="content_uz" name="content_uz" 
                              rows="5" required>{{ old('content_uz') }}</textarea>
                </div>
                
                <div class="col-md-4">
                    <label for="content_ru" class="form-label">Контент (RU)</label>
                    <textarea class="form-control" id="content_ru" name="content_ru" 
                              rows="5">{{ old('content_ru') }}</textarea>
                </div>
                
                <div class="col-md-4">
                    <label for="content_en" class="form-label">Контент (EN)</label>
                    <textarea class="form-control" id="content_en" name="content_en" 
                              rows="5">{{ old('content_en') }}</textarea>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="image" class="form-label">Расм</label>
                    <input type="file" class="form-control" id="image" name="image" 
                           accept="image/*">
                    <small class="text-muted">JPG, PNG, GIF, WEBP, maks. 5MB</small>
                </div>
                
                <div class="col-md-6">
                    <label for="icon" class="form-label">Icon (FontAwesome)</label>
                    <input type="text" class="form-control" id="icon" name="icon" 
                           value="{{ old('icon') }}" placeholder="fas fa-info-circle">
                </div>
            </div>
            
            <div class="card mb-3">
                <div class="card-header">СEО Созламалари </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="meta_title" class="form-label">Мета Сарлавҳа</label>
                            <input type="text" class="form-control" id="meta_title" 
                                   name="meta_title" value="{{ old('meta_title') }}">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="meta_keywords" class="form-label">Мета Калит Сўзларr</label>
                            <input type="text" class="form-control" id="meta_keywords" 
                                   name="meta_keywords" value="{{ old('meta_keywords') }}" 
                                   placeholder="нпл, миндмастер, шахсий ривожланиш">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="meta_description" class="form-label">Мета Тавсиф</label>
                            <textarea class="form-control" id="meta_description" 
                                      name="meta_description" rows="2">{{ old('meta_description') }}</textarea>
                        </div>
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