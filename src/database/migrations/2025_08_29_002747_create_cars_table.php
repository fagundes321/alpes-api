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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('version')->nullable();
            $table->string('year_model')->nullable();
            $table->string('year_build')->nullable();
            $table->integer('doors')->nullable();
            $table->string('board')->nullable();
            $table->string('chassi')->nullable();
            $table->string('transmission')->nullable();
            $table->integer('km')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->string('color')->nullable();
            $table->string('fuel')->nullable();
            $table->string('category')->nullable();
            $table->string('url_car')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
