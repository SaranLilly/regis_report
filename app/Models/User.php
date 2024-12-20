<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'user_name',   // รองรับชื่อผู้ใช้
        'email',       // อีเมลผู้ใช้
        'password',    // รหัสผ่าน
        'user_role',   // บทบาทผู้ใช้
        'line_id',     // LINE ID
        'avatar',      // URL รูปภาพโปรไฟล์
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
