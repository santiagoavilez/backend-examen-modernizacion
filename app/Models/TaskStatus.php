<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación: un estado puede estar relacionado con muchas tareas
    public function tasks()
    {
        return $this->hasMany(Task::class, 'status_id');
    }
}
