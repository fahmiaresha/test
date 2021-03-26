<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner', function (Blueprint $table) {
            $table->integer('ID_OWNER', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKI123');
            $table->string('NAMA_OWNER', 50);
            $table->string('ALAMAT_OWNER', 150);
            $table->tinyInteger('JENIS_KELAMIN_OWNER');
            $table->string('NO_TELP_OWNER', 50)->nullable();
            $table->string('EMAIL_OWNER', 75)->nullable();
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
        Schema::dropIfExists('owner');
    }
}
