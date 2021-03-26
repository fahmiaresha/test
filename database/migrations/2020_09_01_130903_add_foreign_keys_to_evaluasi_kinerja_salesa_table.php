<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvaluasiKinerjaSalesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluasi_kinerja_salesa', function (Blueprint $table) {
            $table->foreign('ID_MANAJER_MARKETING', 'FK_MELAKUKAN5221')->references('ID_MANAJER_MARKETING')->on('manajer_marketing')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_SALES_A', 'FK_MEMILIKI5232')->references('ID_SALES_A')->on('sales_a')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluasi_kinerja_salesa', function (Blueprint $table) {
            $table->dropForeign('FK_MELAKUKAN5221');
            $table->dropForeign('FK_MEMILIKI5232');
        });
    }
}
