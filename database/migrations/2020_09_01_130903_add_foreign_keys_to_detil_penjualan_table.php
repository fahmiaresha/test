<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetilPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detil_penjualan', function (Blueprint $table) {
            $table->foreign('KODE_PRODUCT', 'FK_TERDAPAT12312311')->references('KODE_PRODUCT')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_PENJUALAN', 'FK_TERDAPAT21344')->references('ID_PENJUALAN')->on('penjualan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detil_penjualan', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT12312311');
            $table->dropForeign('FK_TERDAPAT21344');
        });
    }
}
