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
            $table->unsignedBigInteger('id_form'); // Agrega la columna id_form, llave foranea
            $table->string('question')->nullable();
            $table->timestamps();

            $table->foreign('id_form')->references('id')->on('form')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
