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
        Schema::create('fees_models', function (Blueprint $table) {
            $table->id();
            $table->string('roll')->nullable();
            $table->string('stdName')->nullable();
            $table->string('course')->nullable();
            $table->string('feeType')->nullable();
            $table->string('amount')->nullable();
            $table->string('cDate')->nullable();
            $table->string('pType')->nullable();
            $table->string('pRef')->nullable();
            $table->string('status')->nullable();
            $table->string('pDetails')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_models');
    }
};