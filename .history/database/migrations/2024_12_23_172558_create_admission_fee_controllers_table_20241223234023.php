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
        Schema::create('admission_fee_controllers', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'studentId')->nullable();
            $table->string(column: 'name')->nullable();
            $table->string(column: 'sPhone')->nullable();
            $table->string(column: 'examDate')->nullable();
            $table->string(column: 'examTerm')->nullable();
            $table->string(column: 'class')->nullable();
            $table->string(column: 'pMethod')->nullable();
            $table->string(column: 'amount')->nullable();
            $table->string(column: 'pNumber')->nullable();
            $table->string(column: 'txid')->nullable();
            $table->string(column: 'status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_fee_controllers');
    }
};
