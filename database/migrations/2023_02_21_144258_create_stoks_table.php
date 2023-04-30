<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('tanggal');
            $table->foreignId('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreignId('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->string('nama');
            $table->string('kategori');
            $table->string('harga');
            $table->integer('stokAwal')->nullable();
            $table->integer('stokAkhir')->nullable();
            $table->integer('terjual')->nullable();
            $table->integer('total')->nullable();
         

            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('stoks');
    }
};
