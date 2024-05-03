<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;
use Illuminate\Support\Facades\Session;

class SignupController extends Controller
{
    //method untuk display form signup
    public function showSignupForm()
    {   // file view sign up
        return view('signup',[ 
            'title' => 'Sign Up',
            'active' => 'sign up'
        ]); 
    }

    public function submitSignupForm(Request $request)
    {   
        $validatedData = $request->validate([
        'username' => 'required|unique:userdatas',
        'password' => 'required'
        ]);

    Userdata::create($validatedData);
    }


}
