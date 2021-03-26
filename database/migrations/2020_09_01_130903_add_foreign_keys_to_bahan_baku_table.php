<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bahan_baku', function (Blueprint $table) {
            $table->foreign('ID_JENIS_BAHAN_BAKU', 'FK_TERDAPAT')->references('ID_JENIS_BAHAN_BAKU')->on('jenis_bahan_baku')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bahan_baku', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT');
        });
    }
}
