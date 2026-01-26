<!-- resources/views/admin/features/create.blade.php -->
@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Янги Хусусият Қўшиш</h1>
    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i>Орқага
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.features.store') }}" method="POST">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="icon" class="form-label">Icon (FontAwesome)</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', 'fas fa-star') }}" required>
                    <small class="text-muted">Misol: fas fa-brain, fas fa-bullseye</small>
                </div>
                
                <div class="col-md-4">
                    <label for="order" class="form-label">Тартиб</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}">
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Ҳолат</label>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">
                            Faol
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="title_uz" class="form-label">Сарлавҳа(UZ)</label>
                    <input type="text" class="form-control" id="title_uz" name="title_uz" value="{{ old('title_uz') }}" required>
                </div>
                
                <div class="col-md-4">
                    <label for="title_ru" class="form-label">Сарлавҳа(RU)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ old('title_ru') }}">
                </div>
                
                <div class="col-md-4">
                    <label for="title_en" class="form-label">Сарлавҳа(EN)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="description_uz" class="form-label">Тасиф (UZ)</label>
                    <textarea class="form-control" id="description_uz" name="description_uz" rows="3" required>{{ old('description_uz') }}</textarea>
                </div>
                
                <div class="col-md-4">
                    <label for="description_ru" class="form-label">Тасиф (RU)</label>
                    <textarea class="form-control" id="description_ru" name="description_ru" rows="3">{{ old('description_ru') }}</textarea>
                </div>
                
                <div class="col-md-4">
                    <label for="description_en" class="form-label">Тасиф (EN)</label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="3">{{ old('description_en') }}</textarea>
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