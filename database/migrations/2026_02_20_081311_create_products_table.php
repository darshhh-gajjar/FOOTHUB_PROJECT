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
            $table->string('brand_name');
            $table->string('name');
            $table->decimal('sale_price', 10, 2);
            $table->decimal('mrp', 10, 2)->nullable();
            $table->integer('stock');
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->string('color')->nullable();
            $table->string('sizes')->nullable(); 
            $table->string('upper_material')->nullable();
            $table->string('sole_material')->nullable();
            $table->string('closure')->nullable();
            $table->string('fit')->nullable();
            $table->text('description')->nullable();
            $table->string('images')->nullable(); 
            $table->string('status')->default('Active'); 
            $table->timestamps();
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
