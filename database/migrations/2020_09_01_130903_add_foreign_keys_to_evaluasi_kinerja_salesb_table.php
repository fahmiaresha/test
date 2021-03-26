<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvaluasiKinerjaSalesbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluasi_kinerja_salesb', function (Blueprint $table) {
            $table->foreign('ID_MANAJER_MARKETING', 'FK_MELAKUKAN5331')->references('ID_MANAJER_MARKETING')->on('manajer_marketing')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_SALES_B', 'FK_MEMILIKI61397')->references('ID_SALES_B')->on('sales_b')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluasi_kinerja_salesb', function (Blueprint $table) {
            $table->dropForeign('FK_MELAKUKAN5331');
            $table->dropForeign('FK_MEMILIKI61397');
        });
    }
}
