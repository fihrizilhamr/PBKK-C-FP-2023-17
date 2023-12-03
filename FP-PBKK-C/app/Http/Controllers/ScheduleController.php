<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{

    public function mySchedule()
    {
        // Mengambil instance pengguna yang terautentikasi beserta relasinya dengan Trainer
        $trainer = User::with('trainer')->find(Auth::id());
    
        // Mengambil artikel yang terkait dengan trainer_id dari pengguna terautentikasi
        $schedules = Schedule::where('trainer_id', $trainer->trainer->id)->get();
    
        return view('list-myschedules', compact('schedules'));
    }
    

    public function view($id)
    {
        $schedule = Schedule::find($id);
        $trainer = Trainer::find($schedule->trainer_id);
        return view('view-schedule', compact('schedule', 'trainer'));
    }

    public function editSchedule($id)
    {
        $schedule = Schedule::find($id);
        $trainer = User::has('trainer')->with('trainer')->find(Auth::id());
        return view('edit-schedules', compact('schedule', 'trainer'));
    }

    public function updateSchedule(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'day' => 'required|string', // Sesuaikan dengan nama kolom di tabel schedules
            'start_time' => 'required|date_format:H:i', // Format jam menit (HH:mm)
            'end_time' => 'required|date_format:H:i|after:start_time', // Format jam menit (HH:mm) dan setelah start_time
        ]);
        // dd($request->validated());
        // Jika validasi berhasil, lanjutkan dengan menyimpan data ke dalam database
        $results = [
            'day' => $request->input('day'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ];
        

        Schedule::find($id)->update($results);

        return redirect()->route('list-myschedules');
    }

    public function deleteSchedule($id)
    {
        // Delete the user from the database
        Schedule::destroy($id);

        return redirect()->route('list-myschedules'); // Redirect to home or wherever you want
    }

    public function createSchedule()
    {
        $trainer = User::has('trainer')->with('trainer')->find(Auth::id());
        return view('create-schedule', compact('trainer'));
    }
    public function submitSchedule(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|string', // Sesuaikan dengan nama kolom di tabel schedules
            'start_time' => 'required|date_format:H:i', // Format jam menit (HH:mm)
            'end_time' => 'required|date_format:H:i|after:start_time', // Format jam menit (HH:mm) dan setelah start_time
        ]);

        // Jika validasi berhasil, lanjutkan dengan menyimpan data ke dalam database
        $results = [
            'trainer_id' => $id,
            'day' => $request->input('day'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ];

        Schedule::create($results);

        return redirect()->route('list-myschedules');
    }

}
