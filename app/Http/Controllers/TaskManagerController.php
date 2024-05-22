<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class TaskManagerController extends Controller
{
    public function showTaskForm()
    {
        $tasks = Task::all();
        return view('tasks/managetask',[ 
            'title' => 'Add Task',
            'active' => 'add task',
            'tasks' => $tasks
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

        Task::create($validatedData);
        return redirect('/dashboard-level')->with('success', 'Task added successfully.');
        
    }

}