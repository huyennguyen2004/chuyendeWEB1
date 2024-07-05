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
        Schema::create('ntbh_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(false); // Sử dụng unsignedBigInteger
            $table->unsignedBigInteger('brand_id')->nullable(false); // Sử dụng unsignedBigInteger
            $table->string('name', 1000)->nullable(false);
            $table->string('slug', 1000)->nullable(false);
            $table->float('price')->nullable(false);
            $table->float('pricesale')->nullable();
            $table->string('image', 1000)->nullable(false);
            $table->unsignedInteger('qty')->nullable(false);
            $table->mediumText('detail')->nullable(false);
            $table->string('description', 255)->nullable();
            $table->unsignedInteger('created_by')->nullable(false);
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();  // Tự động thêm các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntbh_product');
    }
};
