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
        Schema::create('ntbh_menu', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 1000)->nullable(false);
            $table->string('link', 1000)->nullable(false);
            $table->unsignedInteger('table_id')->nullable();
            $table->string('type', 255)->nullable(false);
            $table->unsignedInteger('created_by')->nullable(false);
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntbh_menu');
    }
};
