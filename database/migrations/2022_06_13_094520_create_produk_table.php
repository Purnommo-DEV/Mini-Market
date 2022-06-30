<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id')->unsigned();
            $table->bigInteger('subkategori_id')->unsigned();
            $table->bigInteger('pemasok_id')->unsigned();
            $table->string('nama_produk');
            $table->string('slug_produk');
            $table->string('satuan_produk');
            $table->string('berat_produk');
            $table->string('stok_produk');
            $table->string('harga_beli_produk');
            $table->string('harga_jual_produk');
            $table->string('diskon_produk');
            $table->text('deskripsi_produk');
            $table->timestamps();

            $table->foreign('pemasok_id')->references('id')->on('pemasok')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('subkategori_id')->references('id')->on('subkategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
