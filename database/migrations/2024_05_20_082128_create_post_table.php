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
        Schema::create('ntbh_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->string('title', 1000)->nullable(false);
            $table->string('slug', 1000)->nullable(false);
            $table->mediumText('detail')->nullable(false);
            $table->string('image', 1000)->nullable(false);
            $table->enum('type', ['post', 'page'])->nullable(false);
            $table->string('description', 255)->nullable();
            $table->unsignedBigInteger('created_by')->nullable(false);
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->timestamps();  // Tự động thêm các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntbh_post');
    }
};
