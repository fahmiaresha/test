<?php

use Illuminate\Database\Seeder;

class PenerimaanBahanBakuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('penerimaan_bahan_baku')->insert([
            'ID_SUPPLIER' => rand(1,30),
			'KODE_BAHAN_BAKU' => 1,
			'ID_ADMIN_GUDANG' => rand(1,3),
			'TGL_KEDATANGAN' => date("Y-m-d",strtotime("2020-08-28")),
			'SATUAN' => "kg",
			'TOTAL_BERAT' => 100,
			'JUMLAH_KARUNG_SAK' => 10,
			'ISI_KARUNG' => 10,
			'STOK_PENERIMAAN' => 100
        ]);

        DB::table('penerimaan_bahan_baku')->insert([
            'ID_SUPPLIER' => rand(1,30),
			'KODE_BAHAN_BAKU' => 2,
			'ID_ADMIN_GUDANG' => rand(1,3),
			'TGL_KEDATANGAN' => date("Y-m-d",strtotime("2020-08-28")),
			'SATUAN' => "kg",
			'TOTAL_BERAT' => 50,
			'JUMLAH_KARUNG_SAK' => 5,
			'ISI_KARUNG' => 10,
			'STOK_PENERIMAAN' => 50
        ]);

        DB::table('penerimaan_bahan_baku')->insert([
            'ID_SUPPLIER' => rand(1,30),
			'KODE_BAHAN_BAKU' => 3,
			'ID_ADMIN_GUDANG' => rand(1,3),
			'TGL_KEDATANGAN' => date("Y-m-d",strtotime("2020-08-28")),
			'SATUAN' => "kg",
			'TOTAL_BERAT' => 10,
			'JUMLAH_KARUNG_SAK' => 1,
			'ISI_KARUNG' => 10,
			'STOK_PENERIMAAN' => 10
        ]);

        DB::table('penerimaan_bahan_baku')->insert([
            'ID_SUPPLIER' => rand(1,30),
			'KODE_BAHAN_BAKU' => 1,
			'ID_ADMIN_GUDANG' => rand(1,3),
			'TGL_KEDATANGAN' => date("Y-m-d",strtotime("2020-08-29")),
			'SATUAN' => "kg",
			'TOTAL_BERAT' => 150,
			'JUMLAH_KARUNG_SAK' => 15,
			'ISI_KARUNG' => 10,
			'STOK_PENERIMAAN' => 150
        ]);

        DB::table('penerimaan_bahan_baku')->insert([
            'ID_SUPPLIER' => rand(1,30),
			'KODE_BAHAN_BAKU' => 2,
			'ID_ADMIN_GUDANG' => rand(1,3),
			'TGL_KEDATANGAN' => date("Y-m-d",strtotime("2020-08-29")),
			'SATUAN' => "kg",
			'TOTAL_BERAT' => 50,
			'JUMLAH_KARUNG_SAK' => 5,
			'ISI_KARUNG' => 10,
			'STOK_PENERIMAAN' => 50
        ]);

        DB::table('penerimaan_bahan_baku')->insert([
            'ID_SUPPLIER' => rand(1,30),
			'KODE_BAHAN_BAKU' => 3,
			'ID_ADMIN_GUDANG' => rand(1,3),
			'TGL_KEDATANGAN' => date("Y-m-d",strtotime("2020-08-29")),
			'SATUAN' => "kg",
			'TOTAL_BERAT' => 10,
			'JUMLAH_KARUNG_SAK' => 1,
			'ISI_KARUNG' => 10,
			'STOK_PENERIMAAN' => 10
        ]);

        DB::table('penerimaan_bahan_baku')->insert([
            'ID_SUPPLIER' => rand(1,30),
			'KODE_BAHAN_BAKU' => 1,
			'ID_ADMIN_GUDANG' => rand(1,3),
			'TGL_KEDATANGAN' => date("Y-m-d",strtotime("2020-08-30")),
			'SATUAN' => "kg",
			'TOTAL_BERAT' => 100,
			'JUMLAH_KARUNG_SAK' => 10,
			'ISI_KARUNG' => 10,
			'STOK_PENERIMAAN' => 100
        ]);

        DB::table('penerimaan_bahan_baku')->insert([
            'ID_SUPPLIER' => rand(1,30),
			'KODE_BAHAN_BAKU' => 3,
			'ID_ADMIN_GUDANG' => rand(1,3),
			'TGL_KEDATANGAN' => date("Y-m-d",strtotime("2020-08-30")),
			'SATUAN' => "kg",
			'TOTAL_BERAT' => 20,
			'JUMLAH_KARUNG_SAK' => 2,
			'ISI_KARUNG' => 10,
			'STOK_PENERIMAAN' => 20
        ]);
    }
}