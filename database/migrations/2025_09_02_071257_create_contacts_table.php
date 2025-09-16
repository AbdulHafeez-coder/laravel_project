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
        Schema::create('contacts', function (Blueprint $table) {


            $table->id();
            $table->string('name');
            $table->string("picture")->nullable();
            $table->string('email')->unique();
            $table->string('phone_1', 20)->unique();
            $table->string('phone_2', 20)->unique()->nullable();
            $table->text('address')->nullable();
            $table->foreignId("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
