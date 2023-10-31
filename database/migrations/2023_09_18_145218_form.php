<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_type')->nullable(); 
            $table->unsignedBigInteger('survey_type')->nullable(); 
            $table->unsignedBigInteger('status');
            $table->string('title')->nullable();
            $table->text('indications')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->dateTime('effective_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form');
    }
};
