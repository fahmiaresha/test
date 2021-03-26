<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPembayaranPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran_penjualan', function (Blueprint $table) {
            $table->foreign('ID_OWNER', 'FK_MELAKUKAN1233')->references('ID_OWNER')->on('owner')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_PENJUALAN', 'FK_TERDAPAT55123')->references('ID_PENJUALAN')->on('penjualan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran_penjualan', function (Blueprint $table) {
            $table->dropForeign('FK_MELAKUKAN1233');
            $table->dropForeign('FK_TERDAPAT55123');
        });
    }
}
