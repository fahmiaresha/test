<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminGudangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_gudang', function (Blueprint $table) {
            $table->integer('ID_ADMIN_GUDANG', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKI52270');
            $table->string('NAMA_ADMIN_GUDANG', 50);
            $table->string('ALAMAT_ADMIN_GUDANG', 150);
            $table->tinyInteger('JENIS_KELAMIN_ADMIN_GUDANG');
            $table->string('NO_TELP_ADMIN_GUDANG', 50)->nullable();
            $table->string('EMAIL_ADMIN_GUDANG', 75)->nullable();
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
        Schema::dropIfExists('admin_gudang');
    }
}
