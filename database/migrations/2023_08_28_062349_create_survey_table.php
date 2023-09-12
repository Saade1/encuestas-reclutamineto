<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->enum('question_type', ['abierta', 'opcion_multiple', 'lista', 'combinada']);
            $table->enum('survey_type', ['publica', 'anonima']);
            $table->enum('status', ['editando', 'en_proceso', 'terminada']);
            $table->string('title')->nullable();
            $table->text('indications')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->dateTime('effective_date')->nullable();
            
        });        

        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_id');
            $table->text('question');
            $table->text('answer');
            $table->timestamps();

            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_responses');
        Schema::dropIfExists('surveys');
    }
};
