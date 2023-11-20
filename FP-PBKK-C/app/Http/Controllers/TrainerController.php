<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    //
    public function showTrainers(){
        $trainers = Trainer::all(); // Retrieve all trainers (you might want to paginate or use a specific query)

        return view('list-trainers', compact('trainers'));
    }

    public function pickTrainer($id)
    {
        $trainer = Trainer::find($id);
        return view('jadwal-trainer', compact('trainer'));
    }


}
