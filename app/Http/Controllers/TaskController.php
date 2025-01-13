<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userRoleId = $request->query('userRoleId');
        $userId = $request->query('userId');
        $isAdmin = $userRoleId == 1;

        if ($isAdmin) {
            // Si es administrador, retornar todas las tareas
            $tasks = Task::with(['status', 'priority', 'users'])->get();
        } else {
            // Si es un usuario estándar, retornar solo las tareas asignadas al usuario
            $tasks = Task::whereHas('users', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->with(['status', 'priority', 'users'])->get();
        }
        return response()->json($tasks);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority_id' => 'required|int',
            'users' => 'array', // IDs de usuarios asignados
            'users.*.id' => 'exists:users,id', // Validar que cada usuario tenga un ID válido

        ]);

        $task = Task::create($request->only('title', 'description', 'priority_id'));

        // Asignar usuarios a la tarea
        if ($request->has('users')) {
            $userIds = collect($request->users)->pluck('id')->toArray();
            $task->users()->sync($userIds);
        }

        return response()->json($task, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $task = Task::with(['status', 'priority', 'users'])->findOrFail($id);
        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'sometimes|required|exists:task_statuses,id',
            'priority_id' => 'sometimes|required|exists:priorities,id',
            'user_ids' => 'array',
            'user_ids.*' => 'exists:users,id',
        ]);

        $task->update($request->only('title', 'description', 'status_id', 'priority_id'));

        // Actualizar usuarios asignados
        if ($request->has('user_ids')) {
            $task->users()->sync($request->user_ids);
        }

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
