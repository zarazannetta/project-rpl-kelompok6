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
        
        return view('/dashboard/dashboard-deadline', ['userPoints' => $userPoints, 'tasks' => $tasks]);
    }

    public function updateTaskCompletion(Request $request, $id)
    {
        $task = Task::find($id);
        $task->isCompleted = $request->has('isCompleted');
        $task->save();

        if ($task->isCompleted) {
            $user = Userdata::find($task->user_id);
            switch ($task->taskCategory) {
                case 'Hard':
                    $user->points += 30;
                    break;
                case 'Medium':
                    $user->points += 20;
                    break;
                case 'Easy':
                    $user->points += 10;
                    break;
                default:
                    $user->points += 0;
                    break;
            }
            $user->save();
        } else {
            // task dicancel ceklisnya
            $user = Userdata::find($task->user_id);
            switch ($task->taskCategory) {
                case 'Hard':
                    $user->points -= 30;
                    break;
                case 'Medium':
                    $user->points -= 20;
                    break;
                case 'Easy':
                    $user->points -= 10;
                    break;
            }
            $user->save();
        }
        return redirect()->back()->with('status', 'Task updated successfully.');
    }
}