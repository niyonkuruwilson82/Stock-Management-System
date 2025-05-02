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
        Schema::create('product_ins', function (Blueprint $table) {
            $table->id('ProductIn_id');
            $table->unsignedBigInteger('PCode');
            $table->date('prIn_Date');
            $table->integer('prIn_Quantity');
            $table->decimal('prIn_Unit_Price', 10, 2);
            $table->decimal('prIn_TotalPrice', 10, 2);
            $table->timestamps();

            $table->foreign('PCode')->references('PCode')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ins');
    }
};
