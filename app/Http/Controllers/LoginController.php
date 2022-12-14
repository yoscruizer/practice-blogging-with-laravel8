<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    public function create()
    {
        return view('login.login', [
            'title' => 'Login'
        ]);
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
 
        return back()->with('loginError', 'Login failed');
    }
 
public function store(Request $request) {
        auth()->logout();
        return redirect()->route('login');
    }
}