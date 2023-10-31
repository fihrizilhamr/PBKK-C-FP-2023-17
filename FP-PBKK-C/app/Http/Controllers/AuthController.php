<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AuthController extends Controller
{
    public function showUsers(){
        $users = Account::all();
        return view('list-users', compact('users'));
    }

    public function edit($id)
    {
        $user = Account::find($id);
        return view('edit-users', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'Email' => 'required|email|max:255',
            'Password' => 'required|string|min:8',
            'Nama' => 'required|string|max:255',
            'TL' => 'required|date',
            'Alamat' => 'required|string|max:510',
            'NHP' => 'required|numeric', 
            'Gender' => 'required|in:Laki-laki,Perempuan', 
        ]);

        // Update the user in the database
        Account::where('id', $id)->update($validatedData);

        return redirect()->route('list-users'); // Redirect to home or wherever you want
    }

    public function delete($id)
    {
        // Delete the user from the database
        Account::destroy($id);

        return redirect()->route('list-users'); // Redirect to home or wherever you want
    }
}
