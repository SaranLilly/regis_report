<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;
    // protected $fillable = ['register_id','register_name','register_surname', 'register_email', 'register_mail','register_timestamp'];
    protected $guarded = [];
    protected $table = 'register';
    public $timestamps = false;

   
}
