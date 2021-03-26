<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailPengambilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pengambilan', function (Blueprint $table) {
            $table->foreign('ID_PENERIMAAN', 'FK_TERDAPAT554')->references('ID_PENERIMAAN')->on('penerimaan_bahan_baku')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_PENGAMBILAN', 'FK_TERDAPAT633')->references('KODE_PENGAMBILAN_BAHAN_BAKU')->on('pengambilan_bahan_baku')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pengambilan', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT554');
            $table->dropForeign('FK_TERDAPAT633');
        });
    }
}
