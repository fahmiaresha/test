<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPembayaranPenerimaanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran_penerimaan_bahan_baku', function (Blueprint $table) {
            $table->foreign('ID_OWNER', 'FK_MELAKUKAN1123')->references('ID_OWNER')->on('owner')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_PENERIMAAN', 'FK_MEMILIKI99')->references('ID_PENERIMAAN')->on('penerimaan_bahan_baku')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran_penerimaan_bahan_baku', function (Blueprint $table) {
            $table->dropForeign('FK_MELAKUKAN1123');
            $table->dropForeign('FK_MEMILIKI99');
        });
    }
}
