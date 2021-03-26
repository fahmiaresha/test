<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHasilProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hasil_product', function (Blueprint $table) {
            $table->foreign('KODE_PRODUCT', 'FK_TERDAPAT93312')->references('KODE_PRODUCT')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_PRODUKSI', 'FK_TERDAPAT999')->references('KODE_PRODUKSI')->on('proses_produksi')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hasil_product', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT93312');
            $table->dropForeign('FK_TERDAPAT999');
        });
    }
}
