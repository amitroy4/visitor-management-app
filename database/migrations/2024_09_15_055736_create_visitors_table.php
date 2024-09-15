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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('visit_date');
            $table->string('name');
            $table->string('contact_number');
            $table->string('purposse_of_visit');
            $table->string('appartment');
            $table->string('unit_number');
            $table->string('checkin');
            $table->string('checkout')->nullable();
            $table->string('visitor_number');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
