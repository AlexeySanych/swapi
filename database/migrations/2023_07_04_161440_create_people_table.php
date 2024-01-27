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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->integer('height')->nullable();
            $table->float('mass')->nullable();
            $table->text('hair_color');
            $table->text('birth_year');
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('homeworld_id')->constrained();
            $table->dateTime('created')->useCurrent();
            $table->text('url')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
