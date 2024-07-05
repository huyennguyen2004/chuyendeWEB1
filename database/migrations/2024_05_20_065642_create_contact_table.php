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
        Schema::create('ntbh_contact', function (Blueprint $table) {
            $table->id(); // id, bigint unsigned, primary key, auto-increment
            $table->unsignedInteger('user_id')->nullable(); // user_id, int unsigned, null
            $table->string('name', 255)->nullable(false); // name, varchar(255), not null
            $table->string('email', 255)->nullable(false); // email, varchar(255), not null
            $table->string('phone', 255)->nullable(false); // phone, varchar(255), not null
            $table->string('title', 255)->nullable(false); // title, varchar(255), not null
            $table->mediumText('content')->nullable(false); // content, mediumtext, not null
            $table->unsignedInteger('reply_id')->default(0); // reply_id, int unsigned, not null, default 0
            $table->unsignedInteger('updated_by')->nullable(); // updated_by, int unsigned, null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntbh_contact');
    }
};
