<?php

use Illuminate\Database\Seeder;

class DetailPengambilanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 1,
			'KODE_PENGAMBILAN' => 1,
			'JUMLAH_KG' => 10,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' =>1,
			'JUMLAH_KG' => 1,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 1,
			'KODE_PENGAMBILAN' =>2,
			'JUMLAH_KG' => 10,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' =>2,
			'JUMLAH_KG' => 1,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 1,
			'KODE_PENGAMBILAN' => 3,
			'JUMLAH_KG' => 10,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' =>3,
			'JUMLAH_KG' => 1,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 1,
			'KODE_PENGAMBILAN' =>4,
			'JUMLAH_KG' => 10,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' => 4,
			'JUMLAH_KG' => 1,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 1,
			'KODE_PENGAMBILAN' => 5,
			'JUMLAH_KG' => 10,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' =>5,
			'JUMLAH_KG' => 1,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 1,
			'KODE_PENGAMBILAN' =>6,
			'JUMLAH_KG' => 10,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' => 6,
			'JUMLAH_KG' => 1,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 1,
			'KODE_PENGAMBILAN' =>7,
			'JUMLAH_KG' => 20,
			'JUMLAH_SAK_KARUNG' => 2
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' => 7,
			'JUMLAH_KG' => 1,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 1,
			'KODE_PENGAMBILAN' =>8,
			'JUMLAH_KG' => 20,
			'JUMLAH_SAK_KARUNG' => 2
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' => 8,
			'JUMLAH_KG' => 1,
			'JUMLAH_SAK_KARUNG' => 1
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 2,
			'KODE_PENGAMBILAN' =>9,
			'JUMLAH_KG' => 20,
			'JUMLAH_SAK_KARUNG' => 2
        ]);

        DB::table('detail_pengambilan')->insert([
			'ID_PENERIMAAN' => 3,
			'KODE_PENGAMBILAN' => 9,
			'JUMLAH_KG' => 2,
			'JUMLAH_SAK_KARUNG' => 1
        ]);
        
    }
}