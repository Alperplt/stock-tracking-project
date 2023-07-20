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
        Schema::create('depoharekets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('evrakno');
            $table->integer('hareket');
            $table->integer('hareketturu');
            $table->integer('urunid');
            $table->integer('depoid');
            $table->float('miktar');
            $table->float('birimfiyat');
            $table->float('toplamfiyat');
            $table->integer('birimid');
            $table->string('aciklama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depoharekets');
    }
};
