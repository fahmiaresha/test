<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorMesinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operator_mesin', function (Blueprint $table) {
            $table->integer('ID_OPERATOR_MESIN', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKI5345');
            $table->string('NAMA_OPERATOR_MESIN', 100);
            $table->string('ALAMAT_OPERATOR_MESIN', 150);
            $table->tinyInteger('JENIS_KELAMIN_OPERATOR_MESIN');
            $table->string('NO_TELP_OPERATOR_MESIN', 50)->nullable();
            $table->string('EMAIL_OPERATOR_MESIN', 75)->nullable();
            $table->string('FOTO_PROFILE')->nullable();
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
        Schema::dropIfExists('operator_mesin');
    }
}
