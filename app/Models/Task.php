<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $fillable = [
        'taskName',
        'taskCategory',
        'taskDueDate',
        'taskDescription',
        'isCompleted',
        'user_id'
    ];

    public function managers()
    {
        return $this->belongsToMany(TaskManager::class, 'taskmanager_relations', 'task_id', 'task_manager_id');
    }
    
    public function user()
    {
        return $this->belongsTo(Userdata::class, 'user_id');
    }
}
