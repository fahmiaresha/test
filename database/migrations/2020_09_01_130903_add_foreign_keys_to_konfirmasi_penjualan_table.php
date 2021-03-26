<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKonfirmasiPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('konfirmasi_penjualan', function (Blueprint $table) {
            $table->foreign('ID_SALES_B', 'FK_TERDAPAT4411')->references('ID_SALES_B')->on('sales_b')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_DEPO', 'FK_TERDAPAT9591231')->references('KODE_DEPO')->on('depo_air_minum')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('konfirmasi_penjualan', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT4411');
            $table->dropForeign('FK_TERDAPAT9591231');
        });
    }
}
