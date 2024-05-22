<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Userdata;


class LevelHardController extends Controller
{
    public function showHardTasks()
    {
        $userId = Auth::id();
        $hardTasks = Task::where('taskCategory', 'Hard')->where('id', $userId)->get();

        return view('level-hard', ['tasks' => $hardTasks]);
    }

    public function updateTaskCompletion(Request $request, $id)
    {
        $task = Task::find($id);
        $task->isCompleted = $request->has('isCompleted');
        $task->save();

        if ($task->isCompleted) {
            $user = Userdata::find($task->user_id);
            $user->points += 30; 
            $user->save();
        }

        return redirect()->back()->with('status', '+30');
    }
}
