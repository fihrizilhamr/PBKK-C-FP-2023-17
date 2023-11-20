<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['day', 'start_time', 'end_time'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}