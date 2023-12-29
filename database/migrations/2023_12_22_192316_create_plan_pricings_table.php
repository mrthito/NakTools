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
        Schema::create('plan_pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('plan_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->double('price')->nullable();
            $table->double('setup_fee')->nullable();
            $table->double('offer_price')->nullable();
            $table->double('offer_setup_fee')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_pricings');
    }
};
