<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPenerimaanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penerimaan_bahan_baku', function (Blueprint $table) {
            $table->foreign('ID_ADMIN_GUDANG', 'FK_MENERIMA')->references('ID_ADMIN_GUDANG')->on('admin_gudang')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_SUPPLIER', 'FK_MENGIRIM')->references('ID_SUPPLIER')->on('supplier')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_BAHAN_BAKU', 'FK_TERDAPAT5579')->references('KODE_BAHAN_BAKU')->on('bahan_baku')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penerimaan_bahan_baku', function (Blueprint $table) {
            $table->dropForeign('FK_MENERIMA');
            $table->dropForeign('FK_MENGIRIM');
            $table->dropForeign('FK_TERDAPAT5579');
        });
    }
}
