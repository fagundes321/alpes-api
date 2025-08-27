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
            $table->integer('year_model')->nullable();
            $table->integer('year_build')->nullable();
            $table->json('optionals')->nullable();
            $table->integer('doors')->nullable();
            $table->string('board')->nullable();
            $table->string('chassi')->nullable()->unique();
            $table->string('transmission')->nullable();
            $table->integer('km')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('created_api')->nullable();
            $table->timestamp('updated_api')->nullable();
            $table->boolean('sold')->default(false);
            $table->string('category')->nullable();
            $table->string('url_car')->nullable();
            $table->decimal('old_price', 15, 2)->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('color')->nullable();
            $table->string('fuel')->nullable();
            $table->json('fotos')->nullable();
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
