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
        Schema::table('course_users', function (Blueprint $table) {
            $table->foreign(['user_id'], 'course_users_ibfk_2')->references(['id'])->on('users');
            $table->foreign(['course_id'], 'course_users_ibfk_3')->references(['id'])->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_users', function (Blueprint $table) {
            $table->foreign(['user_id'], 'course_users_ibfk_2')->references(['id'])->on('users');
            $table->foreign(['course_id'], 'course_users_ibfk_3')->references(['id'])->on('courses');
        });
    }
};
