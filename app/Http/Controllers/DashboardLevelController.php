<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Userdata;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardLevelController extends Controller
{
    public function dashboardlevel()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $hardTasks = Task::orderBy('taskDueDate', 'asc')->where('taskCategory', 'Hard')->where('user_id', $userId)->get();
            $mediumTasks = Task::orderBy('taskDueDate', 'asc')->where('taskCategory', 'Medium')->where('user_id', $userId)->get();
            $easyTasks = Task::orderBy('taskDueDate', 'asc')->where('taskCategory', 'Easy')->where('user_id', $userId)->get();
            $userPoints = Userdata::where('id', $userId)->value('points');
            return view('dashboard.dashboard-level', [
                'hardTasks' => $hardTasks,
                'mediumTasks' => $mediumTasks,
                'easyTasks' => $easyTasks,
                'points' => $userPoints,
            ]);
        } else {
            return redirect('/login')->with('error', 'Please sign in to view your tasks.');
        }
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