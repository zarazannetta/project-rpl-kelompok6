<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDeadlineController extends Controller
{
    public function dashboarddeadline()
    {
        return view('/dashboard/dashboard-deadline');
    }
}