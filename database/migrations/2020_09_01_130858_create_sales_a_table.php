<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_a', function (Blueprint $table) {
            $table->integer('ID_SALES_A', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKI3434');
            $table->string('NAMA_SALES_A', 50);
            $table->string('ALAMAT_SALES_A', 150);
            $table->tinyInteger('JENIS_KELAMIN_SALES_A');
            $table->string('NO_TELP_SALES_A', 50)->nullable();
            $table->string('EMAIL_SALES_A', 75)->nullable();
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
        Schema::dropIfExists('sales_a');
    }
}
