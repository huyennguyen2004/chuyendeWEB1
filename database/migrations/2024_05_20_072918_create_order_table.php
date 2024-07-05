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
        Schema::create('ntbh_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable(false);
            $table->string('name', 255)->nullable(false);
            $table->string('phone', 255)->nullable(false);
            $table->string('email', 255)->nullable(false);
            $table->string('address', 255)->nullable(false);
            $table->string('note', 255)->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->timestamps();  // This adds the created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntbh_order');
    }
};
