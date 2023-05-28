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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('discounted_price')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('child_cat_id')->references('id')->on('child_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
