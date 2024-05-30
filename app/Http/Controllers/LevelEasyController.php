<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Userdata;

class LevelEasyController extends Controller
{
    public function showEasyTasks()
    {
        $userId = Auth::id();
        $easyTasks = Task::where('taskCategory', 'Easy')->where('user_id', $userId)->get();

        return view('tasks.level-easy', ['tasks' => $easyTasks]);
    }

    public function updateTaskCompletion(Request $request, $id)
    {
        $task = Task::find($id);
        $task->isCompleted = $request->has('isCompleted');
        $task->save();

        if ($task->isCompleted) {
            $user = Userdata::find($task->user_id);
            $user->points += 10; 
            $user->save();
        } else {
            $user = Userdata::find($task->user_id);
            $user->points -= 10; 
            $user->save();
        }

        return redirect()->back()->with('status', '+10');
    }
}
