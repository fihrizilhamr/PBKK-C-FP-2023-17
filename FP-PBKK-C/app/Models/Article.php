<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['Foto', 'Judul', 'Text'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
