<!-- resources/views/admin/statistics/index.blade.php -->
@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Статистика</h1>
    <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Янги Статистика
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
                        <th>Рақам</th>
                        <th>Сарлавҳа (УЗ)</th>
                        <th>Иcон</th>
                        <th>Ранг</th>
                        <th>Ҳолат</th>
                        <th>Амаллар</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statistics as $statistic)
                    <tr>
                        <td>{{ $statistic->id }}</td>
                        <td><strong>{{ $statistic->number }}</strong></td>
                        <td>{{ $statistic->title_uz }}</td>
                        <td>
                            @if($statistic->icon)
                                <i class="{{ $statistic->icon }} fa-lg" style="color: {{ $statistic->color }}"></i>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div style="width: 20px; height: 20px; background-color: {{ $statistic->color }}; border-radius: 3px; margin-right: 5px;"></div>
                                {{ $statistic->color }}
                            </div>
                        </td>
                        <td>
                            @if($statistic->is_active)
                                <span class="status-active">Фаол</span>
                            @else
                                <span class="status-inactive">Нофаол</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.statistics.edit', $statistic) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.statistics.destroy', $statistic) }}" method="POST" onsubmit="return confirm('Haqiqatan ham o\'chirmoqchimisiz?')">
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