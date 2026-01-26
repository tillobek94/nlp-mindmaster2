@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Рўйхатдан Ўтганлар</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary me-2">
            <i class="fas fa-plus"></i> Янги Фойдаланувчи
        </a>
        <a href="{{ route('admin.users.export') }}" class="btn btn-sm btn-outline-success">
            <i class="fas fa-file-export"></i> Export
        </a>
    </div>
</div>

<!-- Statistics -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Жами Фойдаланувчилар</h5>
                        <h2 class="text-primary">{{ $stats['total'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Фаол Фойдаланувчилар</h5>
                        <h2 class="text-success">{{ $stats['active'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-user-check fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Бугунги Рўйхатдан Ўтганлар</h5>
                        <h2 class="text-info">{{ $stats['today'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-user-plus fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Ойлик Рўйхатдан Ўтганлар</h5>
                        <h2 class="text-warning">{{ $stats['month'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-calendar-alt fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ИД</th>
                        <th>Исм</th>
                        <th>Эмаил</th>
                        <th>Телефон</th>
                        <th>Ҳолат</th>
                        <th>Рўйхатдан Ўтган</th>
                        <th>Амаллар</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <strong>{{ $user->name }}</strong>
                            @if($user->notes)
                            <br><small class="text-muted">{{ Str::limit($user->notes, 30) }}</small>
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?? '-' }}</td>
                        <td>
                            @if($user->is_active)
                            <span class="badge bg-success">Фаол</span>
                            @else
                            <span class="badge bg-secondary">Нофаол</span>
                            @endif
                        </td>
                        <td>
                            {{ $user->created_at->format('d.m.Y') }}<br>
                            <small>{{ $user->created_at->diffForHumans() }}</small>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                   class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Ҳақиқатан ҳам о\'чирмоқчимисиз?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <div class="py-4 text-muted">
                                <i class="fas fa-users fa-3x mb-3"></i>
                                <p>Ҳали рўйхатдан ўтган фойдаланувчилар мавжуд эмас</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($users->hasPages())
        <div class="mt-3">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>
@endsection