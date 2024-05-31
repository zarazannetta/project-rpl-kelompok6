<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Userdata;

class LeaderboardController extends Controller
{
    public function leaderboard()
    {
        // Mengambil 50 pengguna dengan skor tertinggi
        $users = Userdata::orderBy('points', 'desc')->take(50)->get();
        $currentUser = Auth::check() ? Auth::user()->username : null;
        
        return view('leaderboard', compact('users', 'currentUser'));
    }
}