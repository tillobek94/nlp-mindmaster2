<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'is_active',
        'notes'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    // Role'lar
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
    
    public function isActive()
    {
        return $this->is_active;
    }
    
    // Registration source
    public function registrationSource()
    {
        return $this->created_at->diffForHumans();
    }
}