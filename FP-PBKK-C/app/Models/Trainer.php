<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'Lokasi',
        'Foto',
    ];
    protected $casts = [
        'Password' => 'hashed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
