<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardLevelController extends Controller
{
    public function dashboardlevel()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $hardTasks = Task::where('taskCategory', 'Hard')->where('user_id', $userId)->get();
            $mediumTasks = Task::where('taskCategory', 'Medium')->where('user_id', $userId)->get();
            $easyTasks = Task::where('taskCategory', 'Easy')->where('user_id', $userId)->get();

            return view('dashboard.dashboard-level', [
                'hardTasks' => $hardTasks,
                'mediumTasks' => $mediumTasks,
                'easyTasks' => $easyTasks
            ]);
        } else {
            return redirect('/login')->with('error', 'Please sign in to view your tasks.');
        }
    }
}