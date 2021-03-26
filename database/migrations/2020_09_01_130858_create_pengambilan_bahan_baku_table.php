<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengambilanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengambilan_bahan_baku', function (Blueprint $table) {
            $table->integer('KODE_PENGAMBILAN_BAHAN_BAKU', true);
            $table->integer('ID_OPERATOR_MESIN')->index('FK_MELAKUKAN912931');
            $table->integer('KODE_MESIN')->index('FK_TERDAPAT991');
            $table->dateTime('WAKTU_PENGAMBILAN');
            $table->string('HASIL_PRODUK', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengambilan_bahan_baku');
    }
}
