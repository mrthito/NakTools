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
        Schema::create('user_kyc_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_kyc_id')->constrained('user_kycs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kyc_docs_country_id')->constrained('kyc_docs_countries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('id_number')->nullable();
            $table->string('name')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable();
            $table->integer('status')->default(0);
            $table->morphs('statusable');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_kyc_docs');
    }
};
