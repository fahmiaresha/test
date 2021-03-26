<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMesinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mesin', function (Blueprint $table) {
            $table->foreign('KODE_MOULDING', 'FK_TERDAPAT123')->references('KODE_MOULDING')->on('moulding')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mesin', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT123');
        });
    }
}
