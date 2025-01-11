<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;

    protected $table = 'user_task'; // Especificamos la tabla pivote
    protected $fillable = ['user_id', 'task_id'];
}
