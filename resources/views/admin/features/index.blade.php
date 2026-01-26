<!-- resources/views/admin/features/index.blade.php -->
@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Хусусиятлар</h1>
    <a href="{{ route('admin.features.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Янги Хусусият
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ИД</th>
                        <th>Иcон</th>
                        <th>Сарлавҳа (УЗ)</th>
                        <th>Ҳолат</th>
                        <th>Тартиб</th>
                        <th>Амаллар</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($features as $feature)
                    <tr>
                        <td>{{ $feature->id }}</td>
                        <td><i class="{{ $feature->icon }} fa-lg"></i></td>
                        <td>{{ $feature->title_uz }}</td>
                        <td>
                            @if($feature->is_active)
                                <span class="status-active">Фаол</span>
                            @else
                                <span class="status-inactive">Нофаол</span>
                            @endif
                        </td>
                        <td>{{ $feature->order }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" onsubmit="return confirm('Ҳақиқатан ҳам о\'чирмоқчимисиз?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection