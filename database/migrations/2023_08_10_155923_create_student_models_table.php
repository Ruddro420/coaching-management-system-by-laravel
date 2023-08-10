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
        Schema::create('student_models', function (Blueprint $table) {
            $table->id();
            $table->string('roll')->nullable();
            $table->string('fName')->nullable();
            $table->string('lName')->nullable();
            $table->string('email')->nullable();
            $table->string('rDate')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->string('class')->nullable();
            $table->string('bDate')->nullable();
            $table->string('pName')->nullable();
            $table->string('pMobile')->nullable();
            $table->string('blood')->nullable();
            $table->string('address')->nullable();
            $table->string('pImg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_models');
    }
};