<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación: una prioridad puede estar relacionada con muchas tareas
    public function tasks()
    {
        return $this->hasMany(Task::class, 'priority_id');
    }
}
