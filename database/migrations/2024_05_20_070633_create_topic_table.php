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
        Schema::create('ntbh_topic', function (Blueprint $table) {
            $table->id(); // id, bigint unsigned, primary key, auto-increment
            $table->string('name', 1000)->nullable(false); // name, varchar(1000), not null
            $table->string('slug', 1000)->nullable(false); // slug, varchar(1000), not null
            $table->string('description', 255)->nullable(); // description, varchar(255), null
            $table->unsignedInteger('created_by')->nullable(false); // created_by, int unsigned, not null
            $table->unsignedInteger('updated_by')->nullable(); // updated_by, int unsigned, null
            $table->unsignedTinyInteger('status')->default(2); // status, tinyint unsigned, default 2
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntbh_topic');
    }
};
