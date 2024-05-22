<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $userdata = auth()->user();
        return view('users/profile', [
            'userdata' => $userdata,
        ]); 
    }
    public function editProfile(Request $request)
    {
        $userdata = auth()->user();
        //update username
        $userdata->update([
            'username' => $request->input('username'),
        ]);

        //update password
        if ($request->filled('password')) {
            $userdata->password = bcrypt($request->input('password'));
            $userdata->save();
        }

        return redirect('/profile');
        
    }

    public function deleteAccount(Request $request)
    {
        $userdata = auth()->user();
        Auth::logout();

        $userdata->delete(); 

        return redirect('/login')->with('status', 'Your account has been deleted.');
    }
}