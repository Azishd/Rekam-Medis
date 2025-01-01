<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('patient_id'); // Reference to users table
            $table->string('doctor'); // Name of the doctor
            $table->text('diagnosis'); // Diagnosis details
            $table->text('prescription'); // Prescription details
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
};
