<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_penjualan', function (Blueprint $table) {
            $table->integer('ID_KONFIRMASI_PENJUALAN', true);
            $table->integer('KODE_DEPO')->index('FK_TERDAPAT959123');
            $table->integer('ID_SALES_B')->nullable()->index('FK_TERDAPAT4411');
            $table->date('TGL_KONFIRMASI_PENJUALAN');
            $table->tinyInteger('STATUS_KONFIRMASI_PENJUALAN');
            $table->string('CATATAN')->nullable();
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
        Schema::dropIfExists('konfirmasi_penjualan');
    }
}
