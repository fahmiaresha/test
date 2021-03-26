<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetilPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_penjualan', function (Blueprint $table) {
            $table->integer('ID_PENJUALAN');
            $table->integer('KODE_PRODUCT')->index('FK_TERDAPAT12312311');
            $table->integer('JUMLAH_SAK');
            $table->integer('JUMLAH_PCS');
            $table->float('HARGA_BARANG', 10, 0);
            $table->primary(['ID_PENJUALAN', 'KODE_PRODUCT']);
        });

        DB::unprepared(
            "CREATE TRIGGER `penjualan_barang` AFTER INSERT ON `detil_penjualan`
             FOR EACH ROW BEGIN
            UPDATE product SET STOK_PRODUCT=STOK_PRODUCT-NEW.JUMLAH_PCS
            WHERE KODE_PRODUCT=NEW.KODE_PRODUCT;
            END"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil_penjualan');
        DB::unprepared('DROP TRIGGER `penjualan_barang`');
    }
}
