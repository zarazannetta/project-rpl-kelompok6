<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Userdata;

class LevelMediumController extends Controller
{
    public function showMediumTasks()
    {
        $userId = Auth::id();
        $mediumTasks = Task::where('taskCategory', 'Medium')->where('user_id', $userId)->get();

        return view('tasks.level-medium', ['tasks' => $mediumTasks]);
    }

    public function updateTaskCompletion(Request $request, $id)
    {
        $task = Task::find($id);
        $task->isCompleted = $request->has('isCompleted');
        $task->save();

        if ($task->isCompleted) {
            $user = Userdata::find($task->user_id);
            $user->points += 20; 
            $user->save();
        }else {
            $user = Userdata::find($task->user_id);
            $user->points -= 20; 
            $user->save();
        }

        return redirect()->back()->with('status', '+20');
    }
}
