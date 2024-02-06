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
        Schema::table('done_tasks', function (Blueprint $table) {
            $table->foreign(['user_id'], 'done_tasks_ibfk_2')->references(['id'])->on('users');
            $table->foreign(['question_id'], 'done_tasks_ibfk_3')->references(['id'])->on('questions');
            $table->foreign(['course_id'], 'done_tasks_ibfk_4')->references(['id'])->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('done_tasks', function (Blueprint $table) {
            $table->foreign(['user_id'], 'done_tasks_ibfk_2')->references(['id'])->on('users');
            $table->foreign(['question_id'], 'done_tasks_ibfk_3')->references(['id'])->on('questions');
            $table->foreign(['course_id'], 'done_tasks_ibfk_4')->references(['id'])->on('courses');
        });
    }
};
