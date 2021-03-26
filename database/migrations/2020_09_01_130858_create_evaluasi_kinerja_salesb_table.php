<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiKinerjaSalesbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_kinerja_salesb', function (Blueprint $table) {
            $table->integer('ID_EVALUASI_KINERJA_SALESB', true);
            $table->integer('ID_SALES_B')->index('FK_MEMILIKI61397');
            $table->integer('ID_MANAJER_MARKETING')->index('FK_MELAKUKAN5331');
            $table->date('TGL_EVALUASI_KINERJA_SALESB');
            $table->string('EVALUASI_SALESB', 300);
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
        Schema::dropIfExists('evaluasi_kinerja_salesb');
    }
}
