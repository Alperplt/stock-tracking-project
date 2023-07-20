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
        Schema::create('sayacs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stoksyadi');
            $table->integer('stoksayac');
            $table->string('dphrevrak');
            $table->integer('dphrevrakno');
            $table->string('carisyadi');
            $table->integer('carisayac');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sayacs');
    }
};
