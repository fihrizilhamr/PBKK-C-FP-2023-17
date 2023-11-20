<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
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
        'Lokasi',
        'Foto',
    ];
    protected $casts = [
        'Password' => 'hashed',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
