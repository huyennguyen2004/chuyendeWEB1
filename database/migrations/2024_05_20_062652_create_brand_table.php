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
        Schema::create('ntbh_brand', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000)->nullable(false); // name, varchar(1000), not null
            $table->string('slug', 1000)->nullable(); // slug, varchar(1000), null
            $table->string('image', 1000)->nullable(); // image, varchar(1000), null
            $table->unsignedInteger('parent_id')->default(0); // parent_id, int unsigned, default 0
            $table->unsignedInteger('sort_order')->default(0); // sort_order, int unsigned, default 0
            $table->text('description')->nullable(); // description, text, null
            $table->unsignedTinyInteger('status')->default(2); // status, tinyint unsigned, default 2
            $table->unsignedInteger('created_by')->default(1); // created_by, int unsigned, not null, default 1
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntbh_brand');
    }
};
