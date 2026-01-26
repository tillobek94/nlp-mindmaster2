<!-- resources/views/admin/testimonials/edit.blade.php -->
@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Шарҳни Таҳрирлаш</h1>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Орқага
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="author_name" class="form-label">Исм</label>
                    <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name', $testimonial->author_name) }}" required>
                </div>
                
                <div class="col-md-6">
                    <label for="author_position" class="form-label">Лавозим</label>
                    <input type="text" class="form-control" id="author_position" name="author_position" value="{{ old('author_position', $testimonial->author_position) }}" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="content_uz" class="form-label">Шарҳ (UZ)</label>
                    <textarea class="form-control" id="content_uz" name="content_uz" rows="3" required>{{ old('content_uz', $testimonial->content_uz) }}</textarea>
                </div>
                
                <div class="col-md-4">
                    <label for="content_ru" class="form-label">Шарҳ (RU)</label>
                    <textarea class="form-control" id="content_ru" name="content_ru" rows="3">{{ old('content_ru', $testimonial->content_ru) }}</textarea>
                </div>
                
                <div class="col-md-4">
                    <label for="content_en" class="form-label">Шарҳ (EN)</label>
                    <textarea class="form-control" id="content_en" name="content_en" rows="3">{{ old('content_en', $testimonial->content_en) }}</textarea>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="avatar" class="form-label">Avatar (Расм)</label>
                    @if($testimonial->avatar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="Avatar" width="60" height="60" class="rounded-circle">
                            <br>
                            <small>Ҳозирги аватар</small>
                        </div>
                    @endif
                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                    <small class="text-muted">Расм ҳажми 2МБ дан ошмасин</small>
                </div>
                
                <div class="col-md-4">
                    <label for="rating" class="form-label">Рейтинг</label>
                    <select class="form-control" id="rating" name="rating">
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ $testimonial->rating == $i ? 'selected' : '' }}>
                                @for($j = 1; $j <= $i; $j++)⭐@endfor ({{ $i }})
                            </option>
                        @endfor
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for="order" class="form-label">Тартиб</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $testimonial->order) }}">
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Faol
                    </label>
                </div>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Янгилаш
                </button>
            </div>
        </form>
    </div>
</div>
@endsection