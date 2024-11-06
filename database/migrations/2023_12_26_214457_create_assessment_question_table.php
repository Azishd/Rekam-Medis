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
        Schema::create('assessment_question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->references('id')->on('assessments')->onDelete('cascade')->constrained();
            $table->foreignId('question_id')->references('id')->on('questions')->onDelete('cascade')->constrained();
            $table->integer('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_question');
    }
};
