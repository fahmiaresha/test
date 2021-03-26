<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiKinerjaSalesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_kinerja_salesa', function (Blueprint $table) {
            $table->integer('ID_EVALUASI_KINERJA_SALESA', true);
            $table->integer('ID_MANAJER_MARKETING')->index('FK_MELAKUKAN5221');
            $table->integer('ID_SALES_A')->index('FK_MEMILIKI5232');
            $table->date('TGL_EVALUASI_KINERJA_SALESA');
            $table->string('EVALUASI_SALESA', 300);
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
        Schema::dropIfExists('evaluasi_kinerja_salesa');
    }
}
