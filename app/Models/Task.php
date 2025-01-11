<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status_id', 'priority_id'];

    // Relación: una tarea tiene un estado
    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    // Relación: una tarea tiene una prioridad
    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    // Relación: una tarea puede estar asignada a varios usuarios
    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id')
            ->withTimestamps();
    }
}
