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
        Schema::create('cake_sizes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('size')->nullable();
            $table->decimal('price', 10, 2)->nullable(); 
            $table->enum('veg_nonveg', ['veg', 'non-veg'])->nullable(); 
            $table->boolean('is_activated')->default(false);

            $table->uuid('cake_id');
            $table->foreign('cake_id')->references('id')->on('cakes')->onDelete('cascade');

            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cake_sizes');
    }
};
