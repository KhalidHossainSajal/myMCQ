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
        Schema::create('mcq_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_text');
            $table->text('option1');
            $table->text('option2');
            $table->text('option3');
            $table->text('option4');
            $table->json('correct_answers'); // Store multiple correct answers as JSON
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('chapter_id');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcq_questions');
    }
};
