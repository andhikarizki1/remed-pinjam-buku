<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_anggota')->unsigned();
            $table->bigInteger('id_buku')->unsigned();
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->timestamps();

            $table->foreign('id_anggota')->references('id_anggota')->on('table_anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_buku')->references('id_buku')->on('table_buku')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
