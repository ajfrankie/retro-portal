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
        Schema::create('online_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('description')->nullable();
            $table->string('customized_text')->nullable();
            $table->string('size')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('reference_image')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('status')->nullable();
            $table->string('admin_notes')->nullable();
            $table->string('no_of_cakes')->nullable();
            $table->time('delivery_time')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('wish')->nullable();
            $table->string('note')->nullable();
            $table->boolean('veg_nonveg')->nullable();


            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->uuid('cake_id');
            $table->foreign('cake_id')->references('id')->on('cakes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_orders');
    }
};
