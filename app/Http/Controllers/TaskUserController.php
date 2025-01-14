<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskUserController extends Controller
{
    //
    public function toggleTaskCompletion(Request $request, $taskId)
    {
        $userId = $request->input('userId');
        $isCompleted = $request->input('isCompleted');

        // Actualizar el estado de la tarea para el usuario
        DB::table('task_user')
            ->where('task_id', $taskId)
            ->where('user_id', $userId)
            ->update(['is_completed' => $isCompleted]);

        // Verificar si todos los usuarios asignados han completado la tarea
        $taskUsers = DB::table('task_user')->where('task_id', $taskId)->get();

        $allCompleted = $taskUsers->every(fn($user) => $user->is_completed);
        $anyCompleted = $taskUsers->contains(fn($user) => $user->is_completed);

        // Determinar el estado de la tarea según el progreso
        if ($allCompleted) {
            $newStatus = 3; // 3 = Completada
        } elseif ($anyCompleted) {
            $newStatus = 2; // 2 = En Progreso
        } else {
            $newStatus = 1; // 1 = Pendiente
        }

        // Actualizar el estado de la tarea
        Task::where('id', $taskId)->update(['status_id' => $newStatus]);

        return response()->json([
            'success' => true,
            'is_completed' => $isCompleted,
            'task_id' => $taskId,
            'new_status' => $newStatus,
            'all_completed' => $allCompleted,
            'any_completed' => $anyCompleted,
            'task_users' => $taskUsers,
            'message' => 'El estado de la tarea y los usuarios asignados han sido actualizados correctamente.',
        ]);
    }
}
