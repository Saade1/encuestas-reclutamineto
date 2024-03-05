<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('survey_id');
            $table->string('answer')->nullable();
            $table->timestamps();

            // Define las restricciones de clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('form')->onDelete('cascade');
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade'); // Agrega la clave foránea para survey_id
            // Aquí debes agregar la clave foránea para survey_id si es necesario
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('users_responses');
    }
};
