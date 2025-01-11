<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ejemplo: Pending, In Progress, Completed
            $table->timestamps();
        });

        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ejemplo: Low, Medium, High
            $table->timestamps();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('status_id')->default(1); // 1 = Pending
            $table->unsignedBigInteger('priority_id')->default(2); // 2 = Medium
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('task_statuses')->onDelete('cascade');
            $table->foreign('priority_id')->references('id')->on('priorities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
