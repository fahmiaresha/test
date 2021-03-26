<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_bahan_baku', function (Blueprint $table) {
            $table->integer('ID_PENERIMAAN', true);
            $table->integer('ID_SUPPLIER')->index('FK_MENGIRIM');
            $table->integer('KODE_BAHAN_BAKU')->index('FK_TERDAPAT5579');
            $table->integer('ID_ADMIN_GUDANG')->index('FK_MENERIMA');
            $table->date('TGL_KEDATANGAN');
            $table->string('SATUAN', 25);
            $table->float('TOTAL_BERAT', 10, 0);
            $table->float('JUMLAH_KARUNG_SAK', 10, 0);
            $table->float('ISI_KARUNG', 10, 0);
            $table->float('STOK_PENERIMAAN');
            $table->timestamps();
        });
        DB::unprepared(
            "CREATE TRIGGER `penerimaan_produk` AFTER INSERT ON `penerimaan_bahan_baku`
                FOR EACH ROW 
                BEGIN
                UPDATE bahan_baku SET STOK_BAHAN_BAKU=STOK_BAHAN_BAKU+NEW.TOTAL_BERAT
                WHERE KODE_BAHAN_BAKU=NEW.KODE_BAHAN_BAKU;
                END"
        );
        DB::unprepared(
            "CREATE TRIGGER `tambah_stok_rusak` AFTER UPDATE ON `penerimaan_bahan_baku`
                FOR EACH ROW 
                BEGIN
                UPDATE bahan_baku SET STOK_BAHAN_BAKU=STOK_BAHAN_BAKU-OLD.STOK_PENERIMAAN+NEW.STOK_PENERIMAAN
                WHERE KODE_BAHAN_BAKU=NEW.KODE_BAHAN_BAKU;
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
        Schema::dropIfExists('penerimaan_bahan_baku');
        DB::unprepared('DROP TRIGGER `penerimaan_produk`');
        DB::unprepared('DROP TRIGGER `tambah_stok_rusak`');
    }
}
