<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    // ชื่อของตารางในฐานข้อมูล
    protected $table = 'register';

    // ชื่อคอลัมน์ที่อนุญาตให้ปรับปรุงในฐานข้อมูล
    protected $fillable = [
        'register_name',
        'register_tel',
        'register_mail',
        'register_image',
        'register_status',
        'register_datetime',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'register_status', 'status_id');
    }
}

