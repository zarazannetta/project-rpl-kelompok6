<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Userdata;

class LoginController extends Controller
{
     //method untuk display form login
     public function showLoginForm()
     {   // file view log in
         return view('users/login',[ 
             'title' => 'Login',
             'active' => 'login'
         ]); 
     }

        /**
         * Handle an authentication attempt. (from laravel documentation)
         */
        public function authenticate(Request $request): RedirectResponse
        {
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->intended('/dashboard-level');
            }
    
            return back()->with('loginError', 'Login failed!');
        }

}