<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManajerMarketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manajer_marketing', function (Blueprint $table) {
            $table->integer('ID_MANAJER_MARKETING', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKI8398');
            $table->string('NAMA_MANAJER_MARKETING', 50);
            $table->string('ALAMAT_MANAJER_MARKETING', 150);
            $table->tinyInteger('JENIS_KELAMIN_MANAJER_MARKETING');
            $table->string('NO_TELP_MANAJER_MARKETING', 50)->nullable();
            $table->string('EMAIL_MANAJER_MARKETING', 50)->nullable();
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
        Schema::dropIfExists('manajer_marketing');
    }
}
