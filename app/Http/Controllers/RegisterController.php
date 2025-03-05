<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('Auth.register');
    }

        // Handle Registration
        public function register(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
    
            return redirect()->route('login')->with('success', 'Registration successful! Please log in.');

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
        }
}
