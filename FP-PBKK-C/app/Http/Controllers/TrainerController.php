<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TrainerController extends Controller
{
    //
    public function showTrainers(){
        if (Cache::has('trainers')) {
            $trainers = Cache::get('trainers');
        } else {
            // Jika tidak, ambil dari database dan simpan ke dalam cache
            $trainers = Trainer::with('user')->get();
            Cache::put('trainers', $trainers, 10800); // Cache dengan durasi 1 minggu
        }
        return view('list-trainers', compact('trainers'));
    }

    public function pickTrainer($id)
    {
        $trainer = Trainer::find($id);
    // dd($trainer); // Check the retrieved data
        return view('jadwal-trainer', compact('trainer'));
    }
    


}
