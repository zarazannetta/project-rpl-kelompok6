<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\Userdata;
use App\Models\Task;

class DashboardDeadlineController extends Controller
{
    public function dashboarddeadline()
    {
        $userId = Auth::id(); // Mendapatkan id pengguna yang saat ini login
        $userPoints = Userdata::where('id', $userId)->value('points'); // Mendapatkan points pengguna yang saat ini login
        $tasks = Task::orderBy('taskDueDate', 'asc')->get(); // Ambil semua task dan urutkan berdasarkan taskDueDate
        
        return view('dashboard-deadline', ['userPoints' => $userPoints, 'tasks' => $tasks]);
    }
}
