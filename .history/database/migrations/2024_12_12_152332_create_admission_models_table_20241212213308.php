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
        Schema::create('admission_models', function (Blueprint $table) {
            $table->id();
            $table->string('studentImage')->nullable();
            $table->string('studentNameEn')->nullable();
            $table->string('studentNameBn')->nullable();
            $table->string('motherMobile')->nullable();
            $table->string('email')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodGroup')->nullable();
            $table->string('birthCertificate')->nullable();
            $table->string('birthCertificateFile')->nullable();
            $table->string('villagePreset')->nullable();
            $table->string('postPreset')->nullable();
            $table->string('thanaPreset')->nullable();
            $table->string('distPreset')->nullable();
            $table->string('villagePermanent')->nullable();
            $table->string('postPermanent')->nullable();
            $table->string('thanaPermanent')->nullable();
            $table->string('distPermanent')->nullable();
            $table->string('classname')->nullable();
            $table->string('session')->nullable();
            $table->string('amount')->nullable();
            $table->string('paymentmethod')->nullable();
            $table->string('trxid')->nullable();
            $table->string('admissiondate')->nullable();
            $table->string('admissiondate')->nullable();
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_models');
    }
};
