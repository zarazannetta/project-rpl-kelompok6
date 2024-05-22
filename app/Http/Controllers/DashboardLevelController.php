<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardLevelController extends Controller
{
    public function dashboardlevel()
    {
        return view('dashboard-level');
    }
}