<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->integer('user_id')->unsigned();
            $table->string('kode_payment');
            $table->string('kode_trx');
            $table->integer('total_produk')->unsigned();
            $table->bigInteger('total_harga')->unsigned();
            $table->integer('kode_unik')->unsigned();
            $table->string('status')->nullable();
            $table->string('no_resi')->nullable();
            $table->string('kurir')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('nama_penerima')->nullable();
            $table->string('detail_lokasi')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('metode_bayar')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
