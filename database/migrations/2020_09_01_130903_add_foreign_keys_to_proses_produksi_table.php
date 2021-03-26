<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProsesProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proses_produksi', function (Blueprint $table) {
            $table->foreign('KODE_PENGAMBILAN_BAHAN_BAKU', 'FK_TERDAPAT99')->references('KODE_PENGAMBILAN_BAHAN_BAKU')->on('pengambilan_bahan_baku')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proses_produksi', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT99');
        });
    }
}
