<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'admin_notes'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // Status ranglari
    public function getStatusColorAttribute()
    {
        $colors = [
            'new' => 'danger',
            'read' => 'info',
            'replied' => 'success',
            'spam' => 'secondary'
        ];
        
        return $colors[$this->status] ?? 'secondary';
    }
    
    public function getStatusTextAttribute()
    {
        $texts = [
            'new' => 'Yangi',
            'read' => "O'qilgan",
            'replied' => 'Javob berilgan',
            'spam' => 'Spam'
        ];
        
        return $texts[$this->status] ?? $this->status;
    }
}