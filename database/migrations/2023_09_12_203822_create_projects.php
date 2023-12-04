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
        Schema::create('Projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projectcategory_id');
            $table->string('name');
            $table->string('technology');
            $table->string('shoot_cover');
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Projects');
    }
};
