<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranPenerimaanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_penerimaan_bahan_baku', function (Blueprint $table) {
            $table->integer('KODE_PEMBAYARAN', true);
            $table->integer('ID_PENERIMAAN')->index('FK_MEMILIKI99');
            $table->integer('ID_OWNER')->index('FK_MELAKUKAN1123')->nullable();
            $table->date('TGL_PEMBAYARAN')->nullable();
            $table->integer('BIAYA_TRANSAKSI');
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
        Schema::dropIfExists('pembayaran_penerimaan_bahan_baku');
    }
}
