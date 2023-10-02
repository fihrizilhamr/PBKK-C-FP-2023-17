<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'Email',
        'Nama',
        'TL',
        'Alamat',
        'NHP',
        'Gender',
        'Password',
    ];
    protected $casts = [
        'Password' => 'hashed',
    ];
}
