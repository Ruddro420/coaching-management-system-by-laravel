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
        Schema::create('expense_models', function (Blueprint $table) {
            $table->id();
            $table->string('purpose')->nullable();
            $table->string('amount')->nullable();
            $table->string('method')->nullable();
            $table->string('paidBy')->nullable();
            $table->string('source')->nullable();
            $table->string('status')->nullable()->default('0');
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_models');
    }
};
