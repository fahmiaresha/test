<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->integer('KODE_PRODUCT', true);
            $table->integer('KODE_JENIS_PRODUCT')->index('FK_TERDAPAT3454');
            $table->string('NAMA_PRODUCT', 50);
            $table->float('HARGA_PRODUCT', 10, 0);
            $table->integer('STOK_PRODUCT');
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
        Schema::dropIfExists('product');
    }
}
