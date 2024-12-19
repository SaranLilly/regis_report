<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // ชื่อของตารางในฐานข้อมูล
    protected $table = 'status';

    // ชื่อคอลัมน์ที่อนุญาตให้ปรับปรุงในฐานข้อมูล
    protected $fillable = [
        'status_name', // คอลัมน์สถานะ
    ];

    public function registers()
    {
        return $this->hasMany(Register::class, 'register_status', 'status_id');
    }
}
