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
        Schema::create('teacher_models', function (Blueprint $table) {
            $table->id();
            $table->string('fName');
            $table->string('lName');
            $table->string('email');
            $table->string('jDate');
            $table->string('mobile');
            $table->string('gender');
            $table->string('designation');
            $table->string('dept');
            $table->string('bDate');
            $table->string('education');
            $table->string('address');
            $table->string('pImg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_models');
    }
};