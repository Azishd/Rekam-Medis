<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('add_medical_record', function (Blueprint $table) {
        $table->id();
        $table->string('patient');
        $table->string('doctor');
        $table->text('diagnosis');
        $table->text('prescription');
        $table->text('actions')->nullable();
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
};
