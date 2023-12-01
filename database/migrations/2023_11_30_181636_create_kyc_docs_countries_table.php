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
        Schema::create('kyc_docs_countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('name')->index();
            $table->boolean('required')->default(false);
            $table->boolean('has_id_number')->default(false);
            $table->string('id_regex')->nullable();
            $table->boolean('id_required')->default(false);
            $table->boolean('has_name')->default(false);
            $table->boolean('name_required')->default(false);
            $table->boolean('has_expiration_date')->default(false);
            $table->boolean('expiration_date_required')->default(false);
            $table->integer('number_of_pages')->default(1)->comment('Number of pages required for the document. We can add 0 if we can\'t determine the number of pages required.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_docs_countries');
    }
};
