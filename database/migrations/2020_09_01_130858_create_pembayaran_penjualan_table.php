<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_penjualan', function (Blueprint $table) {
            $table->integer('KODE_PEMBAYARAN_PENJUALAN', true);
            $table->integer('ID_PENJUALAN')->index('FK_TERDAPAT55123');
            $table->integer('ID_OWNER')->index('FK_MELAKUKAN1233')->nullable();
            $table->date('TGL_PEMBAYARAN')->nullable();
            $table->tinyInteger('STATUS_PEMBAYARAN');
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
        Schema::dropIfExists('pembayaran_penjualan');
    }
}
