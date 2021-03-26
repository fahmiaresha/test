<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOperatorMesinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operator_mesin', function (Blueprint $table) {
            // $table->foreign('KODE_KOTA', 'FK_MEMILIKI5345')->references('KODE_KOTA')->on('kota')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_KOTA', 'FK_MEMILIKI5345')->references('ID')->on('indonesia_cities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operator_mesin', function (Blueprint $table) {
            $table->dropForeign('FK_MEMILIKI5345');
        });
    }
}
