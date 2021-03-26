<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_b', function (Blueprint $table) {
            $table->integer('ID_SALES_B', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKI343');
            $table->string('NAMA_SALES_B', 50);
            $table->string('ALAMAT_SALES_B', 150);
            $table->tinyInteger('JENIS_KELAMIN_SALES_B');
            $table->string('NO_TELP_SALES_B', 50)->nullable();
            $table->string('EMAIL_SALES_B', 50)->nullable();
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
        Schema::dropIfExists('sales_b');
    }
}
