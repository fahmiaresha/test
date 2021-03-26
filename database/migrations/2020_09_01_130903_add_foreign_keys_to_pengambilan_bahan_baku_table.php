<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPengambilanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengambilan_bahan_baku', function (Blueprint $table) {
            $table->foreign('ID_OPERATOR_MESIN', 'FK_MELAKUKAN912931')->references('ID_OPERATOR_MESIN')->on('operator_mesin')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_MESIN', 'FK_TERDAPAT991')->references('KODE_MESIN')->on('mesin')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengambilan_bahan_baku', function (Blueprint $table) {
            $table->dropForeign('FK_MELAKUKAN912931');
            $table->dropForeign('FK_TERDAPAT991');
        });
    }
}
