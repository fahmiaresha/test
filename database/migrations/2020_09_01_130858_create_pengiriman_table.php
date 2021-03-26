<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->integer('KODE_PENGIRIMAN', true);
            $table->integer('KODE_PEMBAYARAN_PENJUALAN')->index('FK_TERDAPAT51');
            $table->integer('ID_ADMIN_GUDANG')->index('FK_TERDAPAT123123');
            $table->date('TGL_KIRIM_RIIL');
            $table->string('TIPE_KENDARAAN',75);
            $table->string('NOPOL',13);
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
        Schema::dropIfExists('pengiriman');
    }
}
