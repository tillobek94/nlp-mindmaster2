@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Алоқа Хабарлари</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.contacts.export') }}" class="btn btn-sm btn-outline-success me-2">
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
                        <h5 class="card-title">Жами Хабарлар</h5>
                        <h2 class="text-primary">{{ $stats['total'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-envelope fa-2x text-primary"></i>
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
                        <h5 class="card-title">Янги Хабарлар</h5>
                        <h2 class="text-danger">{{ $stats['new'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-envelope-open fa-2x text-danger"></i>
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
                        <h5 class="card-title">Бугунги</h5>
                        <h2 class="text-info">{{ $stats['today'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-calendar-day fa-2x text-info"></i>
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
                        <h5 class="card-title">Жавоб Берилган</h5>
                        <h2 class="text-success">{{ $stats['replied'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-reply fa-2x text-success"></i>
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
                        <th>Мавзу</th>
                        <th>Ҳолат</th>
                        <th>Сана</th>
                        <th>Амаллар</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>
                            <strong>{{ $contact->name }}</strong>
                            @if($contact->phone)
                            <br><small>{{ $contact->phone }}</small>
                            @endif
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->subject, 30) }}</td>
                        <td>
                            <span class="badge bg-{{ $contact->status_color }}">
                                {{ $contact->status_text }}
                            </span>
                        </td>
                        <td>
                            {{ $contact->created_at->format('d.m.Y') }}<br>
                            <small>{{ $contact->created_at->format('H:i') }}</small>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.contacts.show', $contact) }}" 
                                   class="btn btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Haqiqatan ham o\'chirmoqchimisiz?')">
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
        
        <!-- Pagination -->
        <div class="mt-3">
            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection