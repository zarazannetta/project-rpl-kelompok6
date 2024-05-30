<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskManager extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'taskmanager_relations', 'task_manager_id', 'task_id');
    }

    public function addTask($data)
    {
        $task = Task::create($data);
        $this->tasks()->attach($task->id);
        return $task;
    }

    public function editTask(Task $task, $data)
    {
        return $task->update($data);
    }

    public function deleteTask(Task $task)
    {
        return $task->delete();
    }

    public function completeTask(Task $task)
    {
        return $task->update(['isCompleted' => true]);
    }

    public function calculateUserPoints()
    {
        // Logic to calculate user points based on tasks
    }
}

