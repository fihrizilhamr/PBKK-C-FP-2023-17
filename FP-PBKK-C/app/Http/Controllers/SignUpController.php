<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Account;

class SignUpController extends Controller
{
    public function showForm()    {
        return view('signup');
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'Email' => 'required|email|max:255',
            'Password' => 'required|string|min:8',
            'Nama' => 'required|string|max:255',
            'TL' => 'required|date',
            'Alamat' => 'required|string|max:510',
            'NHP' => 'required|numeric', 
            'Gender' => 'required|in:Laki-laki,Perempuan', 
        ]);        
        
        $results = [
            'Email' => $request->input('Email'),
            'Password' => $request->input('Password'),
            'Nama' => $request->input('Nama'),
            'TL' => $request->input('TL'),
            'Alamat' => $request->input('Alamat'),
            'NHP' => $request->input('NHP'),
            'Gender' => $request->input('Gender'),
        ];
        Account::create($results);
        return view('signup-result', ['results' => $results['Nama']]);
    }    
    

    public function formResult(){
        return view('signup-result');
    }
}
