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
            $table->id(); // This will create an auto-incremented primary key column named 'id'
            $table->string('product_name', 100);
            $table->integer('product_price');
            $table->string('product_image', 100);
            $table->integer('status');
            $table->timestamps(); // This will create 'created_at' and 'updated_at' columns as timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
