<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ],);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),

        ],);


        User::factory()->create([
            'name' => 'Standar User',
            'email' => 'standar@example.com',
        ],);

        User::factory()->create([
            'name' => 'example User',
            'email' => 'example@example.com',
        ],);

        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'Standard'],
        ]);

        DB::table('role_user')->insert([
            ['role_id' => 1, 'user_id' => 1],
            ['role_id' => 2, 'user_id' => 2],
            ['role_id' => 2, 'user_id' => 3],
            ['role_id' => 2, 'user_id' => 4],
        ]);

        DB::table('priorities')->insert([
            ['name' => 'Baja'],
            ['name' => 'Media'],
            ['name' => 'Alta'],
        ]);



        DB::table('task_statuses')->insert([
            ['name' => 'Pending'],
            ['name' => 'In Progress'],
            ['name' => 'Completed'],
        ]);

        DB::table('tasks')->insert([
            'title' => 'Tarea pendiente de prueba',
            'description' => 'Descripción de tarea pendiente de prueba',
            'status_id' => 1,
            'priority_id' => 2,
        ]);

        DB::table('tasks')->insert([
            'title' => 'Tarea en progreso de prueba',
            'description' => 'Descripción de tarea en progreso de prueba',
            'status_id' => 2,
            'priority_id' => 2,
        ]);

        DB::table('tasks')->insert([
            'title' => 'Tarea completada de prueba',
            'description' => 'Descripción de tarea completada de prueba',
            'status_id' => 3,
            'priority_id' => 3,
        ]);

        DB::table('task_user')->insert([
            ['user_id' => 1, 'task_id' => 1],
            ['user_id' => 2, 'task_id' => 2],
            ['user_id' => 3, 'task_id' => 3],
        ]);
    }
}
