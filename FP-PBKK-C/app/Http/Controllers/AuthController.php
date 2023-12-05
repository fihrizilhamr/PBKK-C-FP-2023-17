<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showUsers(){
        if(User::find(auth()->id())->admin){
        $users = User::all();
        return view('list-users', compact('users'));
        }
    }

    public function create()
    {
        return view('create-user');
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'role' => 'required|in:admin,trainer,member',
            // 'admin_info' => 'required_if:role,admin|string|max:255',
            'lokasi' => 'required_if:role,trainer|max:255',
            'foto' => 'required_if:role,trainer|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tinggi_badan' => 'required_if:role,member|numeric',
            'berat_badan' => 'required_if:role,member|numeric',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'birthdate' => $validatedData['birthdate'],
            'address' => $validatedData['address'],
            'phone_number' => $validatedData['phone_number'],
            'gender' => $validatedData['gender']
        ]);

        if ($validatedData['role'] === 'admin') {
            Admin::create([
                'user_id' => $user->id
            ]);
        } elseif ($validatedData['role'] === 'trainer') {
            $imageContent = file_get_contents($request->file('foto'));
        
            // Generate a unique filename for the image
            $filename = 'trainer_' . uniqid() . '.jpg';
        
            // Save the image to the storage disk
            Storage::put('public/trainer_images/' . $filename, $imageContent);
        
            Trainer::create([
                'user_id' => $user->id,
                'Lokasi' => $validatedData['lokasi'],
                'Foto' => $filename,
            ]);
        } elseif ($validatedData['role'] === 'member') {
            Member::create([
                'user_id' => $user->id,
                'tinggi_badan' => $validatedData['tinggi_badan'],
                'berat_badan' => $validatedData['berat_badan'],
            ]);
        }

        return redirect()->route('list-users');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'role' => 'required|in:admin,trainer,member',
            // 'admin_info' => 'required_if:role,admin|string|max:255',
            'lokasi' => 'required_if:role,trainer|max:255',
            'foto' => 'required_if:role,trainer|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tinggi_badan' => 'required_if:role,member|numeric',
            'berat_badan' => 'required_if:role,member|numeric',
        ]);

        $user = User::find($id);

        // Delete related records if the role changes
        if ($user->role !== $validatedData['role']) {
            if ($user->admin) {
                $user->admin->delete();
            }
            if ($user->trainer) {
                $user->trainer->delete();
            }
            if ($user->member) {
                $user->member->delete();
            }
        }
    
        // Update user information
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'birthdate' => $validatedData['birthdate'],
            'address' => $validatedData['address'],
            'phone_number' => $validatedData['phone_number'],
            'gender' => $validatedData['gender'],
            'role' => $validatedData['role'],
        ]);
    
        // Update or create role-specific records
        if ($validatedData['role'] === 'admin') {
            $user->admin()->updateOrCreate([
                'user_id' => $user->id
            ]);
        } elseif ($validatedData['role'] === 'trainer') {
            $imageContent = file_get_contents($request->file('foto'));
            $filename = 'trainer_' . uniqid() . '.jpg';
            Storage::put('public/trainer_images/' . $filename, $imageContent);
    
            $user->trainer()->updateOrCreate([
                'user_id' => $user->id
            ], [
                'lokasi' => $validatedData['lokasi'],
                'foto' => $filename,
            ]);
        } elseif ($validatedData['role'] === 'member') {
            $user->member()->updateOrCreate([
                'user_id' => $user->id
            ], [
                'tinggi_badan' => $validatedData['tinggi_badan'],
                'berat_badan' => $validatedData['berat_badan'],
            ]);
        }
    
        return redirect()->route('list-users');
    }

    public function delete($id)
    {
        // Delete the user from the database
        User::destroy($id);

        return redirect()->route('list-users'); // Redirect to home or wherever you want
    }
}
