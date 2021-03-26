<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->foreign('ID_ADMIN_GUDANG', 'FK_TERDAPAT123123')->references('ID_ADMIN_GUDANG')->on('admin_gudang')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_PEMBAYARAN_PENJUALAN', 'FK_TERDAPAT51')->references('KODE_PEMBAYARAN_PENJUALAN')->on('pembayaran_penjualan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT123123');
            $table->dropForeign('FK_TERDAPAT51');
        });
    }
}
