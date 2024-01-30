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
        Schema::table('chapters', function (Blueprint $table) {
           $table->foreign(['course_id'], 'chapters_ibfk_4')->references(['id'])->on('courses');
           $table->foreign(['question_id'], 'chapters_ibfk_5')->references(['id'])->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->foreign(['course_id'], 'chapters_ibfk_4')->references(['id'])->on('courses');
            $table->foreign(['question_id'], 'chapters_ibfk_5')->references(['id'])->on('questions');
        });
    }
};
