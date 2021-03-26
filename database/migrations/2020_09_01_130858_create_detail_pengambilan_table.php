<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengambilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengambilan', function (Blueprint $table) {
            $table->integer('ID_PENERIMAAN');
            $table->integer('KODE_PENGAMBILAN')->index('FK_TERDAPAT633');
            $table->float('JUMLAH_KG', 10, 0)->nullable();
            $table->float('JUMLAH_SAK_KARUNG', 10, 0)->nullable();
            $table->primary(['ID_PENERIMAAN', 'KODE_PENGAMBILAN']);
        });
        DB::unprepared(
            "CREATE TRIGGER `stok_penerimaan` AFTER INSERT ON `detail_pengambilan`
            FOR EACH ROW BEGIN
            UPDATE penerimaan_bahan_baku SET STOK_PENERIMAAN=STOK_PENERIMAAN-NEW.JUMLAH_KG
            WHERE ID_PENERIMAAN=NEW.ID_PENERIMAAN;
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
        Schema::dropIfExists('detail_pengambilan');
    }
}
