<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_form')->nullable(); // Agrega la columna id_form
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->timestamps();

            $table->foreign('id_form')->references('id')->on('form')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
