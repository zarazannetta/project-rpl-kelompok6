<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Userdata;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class TaskManagerController extends Controller
{
    public function showTaskForm(Request $request, $id = null)
    {
        $task = null;
        $userId = Auth::id();
        $userPoints = Userdata::where('id', $userId)->value('points');
        if ($id) {
            $task = Task::findOrFail($id);
        }   
        return view('tasks.managetask', [
            'title' => $task ? 'Edit Task' : 'Add Task',
            'active' => $task ? 'edit task' : 'add task',
            'task' => $task,
            'userId' => $userId,
            'userPoints' => $userPoints,
        ]);
    }
    public function addTask(Request $request)
    {   
        $validatedData = $request->validate([
            'taskName' => ['required', 'string', 'max:255'],
            'taskCategory' => ['required', 'string', 'max:255'],
            'taskDueDate' => ['nullable', 'date_format:Y-m-d\TH:i'],
            'taskDescription' => ['nullable', 'string'],
        ]);

        if (Auth::check()) {
            // retrieve user id
            $userId = Auth::id();
            $validatedData['user_id'] = $userId;
    
            Task::create($validatedData);
    
            return redirect('/dashboard-level')->with('success', 'Task added successfully.');
        } else {
            return redirect('/login')->with('error', 'Please sign in to add a task.');
        }
    }


    public function editTaskForm($id)
    {
        $task = Task::findOrFail($id);
        $userId = Auth::id();
        return view('tasks.managetask', [
        'title' => 'Edit Task',
        'active' => 'edit task',
        'task' => $task,
        'userId' => $userId,
    ]);
    }

    public function updateTask(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'taskName' => 'required|string|max:255',
            'taskCategory' => 'required|string|max:255',
            'taskDueDate' => 'nullable|date_format:Y-m-d\TH:i',
            'taskDescription' => 'nullable|string',
        ]);
        $userId = Auth::id();

        $task = Task::where('id', $id)
                    ->where('user_id', $userId)
                    ->firstOrFail();

        $task->update($validatedData);

        return redirect('/dashboard-level')->with('success', 'Task updated successfully.');
    }

    public function deleteTask($id)
    {   
        $userId = Auth::id();

        $task = Task::where('id', $id)
                    ->where('user_id', $userId)
                    ->firstOrFail();
        $task->delete();

        return redirect('/dashboard-level')->with('success', 'Task deleted successfully.');
    }

}