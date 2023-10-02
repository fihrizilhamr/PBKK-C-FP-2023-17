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
}
