<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('login.register');
    }

    public function store(Request $request){
        $validate  = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);
        return redirect('/login');
    }
}
