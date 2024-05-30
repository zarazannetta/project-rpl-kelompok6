<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;

class LeaderboardController extends Controller
{
    public function leaderboard()
    {
        // Mengambil 5 pengguna dengan skor tertinggi
        $users = Userdata::orderBy('points', 'desc')->take(5)->get();
        
        return view('leaderboard', compact('users'));
    }
}