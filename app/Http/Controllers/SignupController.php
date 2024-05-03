<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;

class SignupController extends Controller
{
    //method untuk display form signup
    public function showSignupForm()
    {   // file view sign up
        return view('users/signup',[ 
            'title' => 'Sign Up',
            'active' => 'sign up'
        ]); 
    }

    public function submitSignupForm(Request $request)
    {   
        $validatedData = $request->validate([
        'username' => ['required', 'unique:userdatas'],
        'password' => ['required']
        ]);

        Userdata::create($validatedData);
    
        $request->session()->flash('success', 'Account successfully created! Please Login');
        return redirect('/login');
    }
}
