<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xabar Tafsilotlari - Admin</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 20px;
        }
        .badge-new {
            background-color: #dc3545;
        }
        .badge-read {
            background-color: #ffc107;
            color: #000;
        }
        .badge-replied {
            background-color: #28a745;
        }
        .badge-spam {
            background-color: #6c757d;
        }
        .message-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            white-space: pre-line;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Xabarlar</a></li>
                <li class="breadcrumb-item active">Xabar #{{ $contact->id }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Xabar #{{ $contact->id }}</h5>
                        <div>
                            <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-arrow-left"></i> Orqaga
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ushbu xabarni o\'chirmoqchimisiz?')">
                                    <i class="fas fa-trash"></i> O'chirish
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Asosiy ma'lumotlar</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th style="width: 30%">Ism</th>
                                                <td>{{ $contact->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>
                                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Telefon</th>
                                                <td>
                                                    @if($contact->phone)
                                                        <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                                    @else
                                                        <span class="text-muted">Ko'rsatilmagan</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Mavzu</th>
                                                <td>{{ $contact->subject }}</td>
                                            </tr>
                                            <tr>
                                                <th>Holati</th>
                                                <td>
                                                    @php
                                                        $badgeClass = 'badge-secondary';
                                                        if($contact->status == 'new') $badgeClass = 'badge-new';
                                                        elseif($contact->status == 'read') $badgeClass = 'badge-read';
                                                        elseif($contact->status == 'replied') $badgeClass = 'badge-replied';
                                                        elseif($contact->status == 'spam') $badgeClass = 'badge-spam';
                                                    @endphp
                                                    <span class="badge {{ $badgeClass }}">
                                                        @if($contact->status == 'new') Yangi
                                                        @elseif($contact->status == 'read') O'qilgan
                                                        @elseif($contact->status == 'replied') Javob berilgan
                                                        @elseif($contact->status == 'spam') Spam
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Yuborilgan vaqti</th>
                                                <td>{{ $contact->created_at->format('d.m.Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Yangilangan</th>
                                                <td>{{ $contact->updated_at->format('d.m.Y H:i') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">Xabar matni</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="message-box">
                                            {{ $contact->message }}
                                        </div>
                                        
                                        @if($contact->admin_notes)
                                            <div class="mt-4">
                                                <h6 class="text-muted">Admin izohi:</h6>
                                                <div class="alert alert-info">
                                                    {{ $contact->admin_notes }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Holatni yangilash formasi -->
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Holatni yangilash</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.contacts.updateStatus', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Holatni o'zgartirish</label>
                                                <select name="status" id="status" class="form-select" required>
                                                    <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>Yangi</option>
                                                    <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>O'qilgan</option>
                                                    <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Javob berilgan</option>
                                                    <option value="spam" {{ $contact->status == 'spam' ? 'selected' : '' }}>Spam</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="admin_notes" class="form-label">Admin izohi</label>
                                                <textarea name="admin_notes" id="admin_notes" class="form-control" rows="3" 
                                                          placeholder="Xabar uchun izoh...">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
                                                <div class="form-text">Ixtiyoriy - xabar haqida qo'shimcha ma'lumot</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Yangilash
                                            </button>
                                            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-success">
                                                <i class="fas fa-reply"></i> Javob yozish
                                            </a>
                                        </div>
                                        
                                        <div>
                                            <a href="{{ route('admin.contacts.export') }}?ids[]={{ $contact->id }}" class="btn btn-outline-secondary">
                                                <i class="fas fa-download"></i> Export qilish
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    var bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</body>
</html>