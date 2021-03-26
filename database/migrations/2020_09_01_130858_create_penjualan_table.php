<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->integer('ID_PENJUALAN', true);
            $table->integer('KODE_DEPO')->index('FK_TERDAPAT959123');
            $table->integer('ID_MANAJER_MARKETING')->index('FK_KONFIRMASI')->nullable();
            $table->integer('ID_SALES_B')->nullable()->index('FK_MENGINPUTKAN');
            $table->dateTime('TGL_PENJUALAN');
            $table->date('TGL_KIRIM');
            $table->string('METODE_KIRIM', 50);
            $table->integer('ONGKOS_KIRIM');
            $table->integer('TOTAL_PENJUALAN');
            $table->tinyInteger('STATUS_PENJUALAN');
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
        Schema::dropIfExists('penjualan');
    }
}
