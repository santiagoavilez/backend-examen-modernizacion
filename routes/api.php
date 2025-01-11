<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\TaskController;

Route::apiResource('tasks', TaskController::class);


Route::controller(TaskController::class)->group(function () {
    Route::get('tasks', 'index');
    Route::get('tasks/{id}', 'show');
    Route::post('tasks', 'store');
    Route::put('tasks/{id}', 'update');
    Route::delete('tasks/{id}', 'destroy');
});
