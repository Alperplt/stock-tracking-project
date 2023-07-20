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
        Schema::create('caris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carikodu');
            $table->string('cariadi');
            $table->string('tcno')->nullable();
            $table->string('vergino')->nullable();
            $table->string('carigrubu')->nullable();
            $table->string('ticariunvan')->nullable();
            $table->string('adres')->nullable();
            $table->string('telefon')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('ozelkod')->nullable();
            $table->string('durum')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caris');
    }
};
