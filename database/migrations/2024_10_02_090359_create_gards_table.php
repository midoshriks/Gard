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
        Schema::create('gards', function (Blueprint $table) {
            $table->id();
            $table->string('A'); // date
            $table->integer('B')->nullable()->default(0); // first_term
            $table->integer('C')->nullable(); // come_in
            $table->integer('D')->nullable(); // convert_from
            $table->integer('E')->nullable(); // convert_to
            $table->integer('F')->nullable(); // harmony
            $table->integer('G')->nullable(); // sales
            $table->integer('H')->nullable()->default(0); // residual
            $table->integer('I')->nullable(); // last_term
            $table->integer('J')->nullable()->default(0); // disability
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gards');
    }
};
