<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ntbh_orderdetail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable(false); // Sử dụng unsignedBigInteger
            $table->unsignedBigInteger('product_id')->nullable(false); // Sử dụng unsignedBigInteger
            $table->float('price')->nullable(false);
            $table->unsignedInteger('qty')->nullable(false);
            $table->float('amount')->nullable(false);
            $table->foreign('order_id')->references('id')->on('ntbh_order')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('ntbh_product')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntbh_orderdetail');
    }
};
