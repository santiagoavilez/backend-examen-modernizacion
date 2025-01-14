<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskUserController;
use App\Http\Controllers\UserController;

Route::controller(TaskController::class)->group(function () {
    Route::get('tasks', 'index');
    Route::get('tasks/{id}', 'show');
    Route::post('task', 'store');
    Route::put('tasks/{id}', 'update');
    Route::delete('tasks/{id}', 'destroy');
});

Route::post('/tasks/{taskId}/toggle-completion', [TaskUserController::class, 'toggleTaskCompletion']);


Route::get('users', [UserController::class, 'index']);
