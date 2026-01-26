@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Саҳифалар</h1>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Янги Саҳифа
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
                        <th>Слуг</th>
                        <th>Сарлавҳа (УЗ)</th>
                        <th>Ҳолат</th>
                        <th>Тартиб</th>
                        <th>Амаллар</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td><code>{{ $page->slug }}</code></td>
                        <td>{{ $page->title_uz }}</td>
                        <td>
                            @if($page->is_active)
                                <span class="badge bg-success">Фаол</span>
                            @else
                                <span class="badge bg-secondary">Нофаол</span>
                            @endif
                        </td>
                        <td>{{ $page->order }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Ҳақиқатан ҳам о\'чирмоқчимисиз?')">
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