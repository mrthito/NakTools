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
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('transaction_id')->nullable();
            $table->integer('type');
            $table->integer('payment_mode');
            $table->integer('status');
            $table->double('amount', 8, 2)->default(0);
            $table->unsignedBigInteger('currency_id');
            $table->string('payment_gateway')->nullable()->index();
            $table->string('payment_gateway_transaction_id')->nullable();
            $table->string('payment_gateway_status')->nullable();
            $table->longText('payment_gateway_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_logs');
    }
};
