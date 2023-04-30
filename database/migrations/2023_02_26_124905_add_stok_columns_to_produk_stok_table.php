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
        Schema::create('produk_stok', function (Blueprint $table) {
            $table->id('pivotId');
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('stok_id');
            $table->timestamps();
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('stok_id')->references('id')->on('stoks')->onDelete('cascade');
            $table->integer('stokAwal')->nullable();
            $table->integer('stokAkhir')->nullable();
            $table->integer('terjual')->nullable();
            $table->float('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk_stok', function (Blueprint $table) {
            //
        });
    }
};
