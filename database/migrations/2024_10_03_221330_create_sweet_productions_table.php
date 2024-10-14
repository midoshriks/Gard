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
        Schema::create('sweet_productions', function (Blueprint $table) {
            $table->id();
            $table->string('date_A'); // date
            $table->integer('pure_milka_B')->nullable()->default(0); // Pure milka
            $table->integer('boxes_C')->nullable(); // Production of boxes
            $table->integer('convert_from_D')->nullable(); // Convert_from
            $table->integer('convert_to_E')->nullable(); // Convert_to
            $table->integer('harmony_F')->nullable(); // harmony
            $table->string('a_cook_G')->nullable(); // a cook
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sweet_productions');
    }
};
