<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_product', function (Blueprint $table) {
            $table->integer('KODE_HASIL_PRODUCT', true);
            $table->integer('KODE_PRODUKSI')->index('FK_TERDAPAT999');
            $table->integer('KODE_PRODUCT')->index('FK_TERDAPAT93312');
            $table->float('HASIL_BAGUS_PCS', 10, 0)->nullable();
            $table->float('HASIL_RUSAK_PCS', 10, 0)->nullable();
            $table->timestamps();
        });
        DB::unprepared(
            "CREATE TRIGGER `update_hasil_produk` AFTER UPDATE ON `hasil_product`
 FOR EACH ROW BEGIN
UPDATE product SET STOK_PRODUCT=STOK_PRODUCT+NEW.HASIL_BAGUS_PCS
WHERE KODE_PRODUCT=NEW.KODE_PRODUCT;
END"
        );
        // SUPAYA SAAT DI SEED NGGAK MINUS STOCK PRODUCT NYA
        DB::unprepared(
            "CREATE TRIGGER `insert_hasil_produk` AFTER INSERT ON `hasil_product`
 FOR EACH ROW BEGIN
UPDATE product SET STOK_PRODUCT=STOK_PRODUCT+NEW.HASIL_BAGUS_PCS
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
        Schema::dropIfExists('hasil_product');
        DB::unprepared('DROP TRIGGER `update_hasil_produk`');
        DB::unprepared('DROP TRIGGER `insert_hasil_produk`');
    }
}
