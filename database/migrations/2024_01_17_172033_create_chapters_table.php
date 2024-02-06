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
        Schema::create('chapters', function (Blueprint $table) {
    $table->id();
    $table->foreignId('subject_id')->constrained(); // Adds a foreign key to the subjects table
    $table->string('name');
    $table->text('description')->nullable();
    $table->timestamps();
    $table->boolean('active')->default(true);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
