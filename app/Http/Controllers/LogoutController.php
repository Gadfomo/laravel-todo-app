<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
      // Handle Logout
      public function logout()
      {
          Auth::logout();
          return redirect()->route('login')->with('success', 'You have been logged out.');
      }
}
