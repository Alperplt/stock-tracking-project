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
        Schema::create('stoks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stokkodu');
            $table->string('barkodu')->nullable();
            $table->string('stokadi')->nullable();
            $table->string('grubu')->nullable();
            $table->string('altgrubu')->nullable();
            $table->integer('marka')->nullable();
            $table->float('alisfiyati')->default(0);
            $table->float('perakendesatis')->default(0);
            $table->float('vadelisatis')->default(0);
            $table->integer('kdvalis')->default(0);
            $table->integer('kdvsatisprk')->default(0);
            $table->integer('kdvsatistptn')->default(0);
            $table->float('indirim')->default(0);
            $table->string('birimi')->nullable();
            $table->integer('aciklama')->default(1);
            $table->string('ozelkodu')->nullable();
            $table->string('resim')->nullable();
            $table->integer('durum')->default(1);
            $table->string('kayiteden')->nullable();
            $table->string('guncelleyen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
