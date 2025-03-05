<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        // Show Login Form
        public function show()
        {
            return view('auth.login');
        }
    
        // Handle Login
        public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            if (Auth::attempt($credentials)) {
                return redirect()->route('tasks.index');
            }
    
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
}
