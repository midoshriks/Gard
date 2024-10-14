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
        Schema::create('pepsi_cans', function (Blueprint $table) {
            $table->id();
            $table->string('date_A'); // date
            $table->integer('first_term_B')->nullable()->default(0); // first_term
            $table->integer('come_in_C')->nullable(); // come_in
            $table->integer('convert_from_D')->nullable(); // convert_from
            $table->integer('convert_to_E')->nullable(); // convert_to
            $table->integer('harmony_F')->nullable(); // harmony
            $table->integer('sales_G')->nullable(); // sales
            $table->integer('residual_H')->nullable()->default(0); // residual
            $table->integer('last_term_I')->nullable(); // last_term
            $table->integer('disability_J')->nullable()->default(0); // disability
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pepsi_cans');
    }
};
