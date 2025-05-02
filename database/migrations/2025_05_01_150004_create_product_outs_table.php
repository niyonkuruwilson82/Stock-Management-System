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
        Schema::create('product_outs', function (Blueprint $table) {
            $table->id('ProductOut_id');
            $table->unsignedBigInteger('PCode');
            $table->date('prOut_Date');
            $table->integer('prOut_Quantity');
            $table->decimal('prOut_unit_Price', 10, 2);
            $table->decimal('prOut_TotalPrice', 10, 2);
            $table->timestamps();
        
            $table->foreign('PCode')->references('PCode')->on('products')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_outs');
    }
};
