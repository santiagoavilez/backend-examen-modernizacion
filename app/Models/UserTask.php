<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;

    protected $table = 'task_user'; // Especificamos la tabla pivote
    protected $fillable = ['user_id', 'task_id', 'is_completed'];
}
