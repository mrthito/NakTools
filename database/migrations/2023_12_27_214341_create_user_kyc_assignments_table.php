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
        Schema::create('user_kyc_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_kyc_id')->constrained('user_kycs');
            $table->foreignId('staff_id')->constrained('staffs');
            $table->dateTime('assigned_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_kyc_assignments');
    }
};
