<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
    
            return redirect()->intended('dashboard');
        }
    
        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }
    

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
