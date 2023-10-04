<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_survey')->nullable();
            $table->string('answer')->nullable();
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('id_survey')->references('id')->on('surveys')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_responses');
    }
};
