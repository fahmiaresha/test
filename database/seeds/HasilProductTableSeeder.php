<?php

use Illuminate\Database\Seeder;

class HasilProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

		DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 1,
            'KODE_PRODUCT' => 1,
            'HASIL_BAGUS_PCS' => floatval(9*250),
            'HASIL_RUSAK_PCS' => floatval(1*250),
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 2,
            'KODE_PRODUCT' => 2,
            'HASIL_BAGUS_PCS' => floatval(19*250),
            'HASIL_RUSAK_PCS' => floatval(1*250),
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 3,
            'KODE_PRODUCT' => 3,
            'HASIL_BAGUS_PCS' => floatval(8*250),
            'HASIL_RUSAK_PCS' => floatval(2*250),
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 4,
            'KODE_PRODUCT' => 4,
            'HASIL_BAGUS_PCS' => floatval(18*250),
            'HASIL_RUSAK_PCS' => floatval(2*250),
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 5,
            'KODE_PRODUCT' => 5,
            'HASIL_BAGUS_PCS' => floatval(18*250),
            'HASIL_RUSAK_PCS' => floatval(2*250),
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 6,
            'KODE_PRODUCT' => 6,
            'HASIL_BAGUS_PCS' => floatval(19.2*250),
            'HASIL_RUSAK_PCS' => floatval(0.8*250),
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 7,
            'KODE_PRODUCT' => 7,
            'HASIL_BAGUS_PCS' => floatval(19.3*250),
            'HASIL_RUSAK_PCS' => floatval(0.7*250),
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 8,
            'KODE_PRODUCT' => 8,
            'HASIL_BAGUS_PCS' => floatval(20*250),
            'HASIL_RUSAK_PCS' => floatval(0*250),
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 9,
            'KODE_PRODUCT' => 9,
            'HASIL_BAGUS_PCS' => floatval(19.9*250),
            'HASIL_RUSAK_PCS' => floatval(0.1*250)
        ]);
        
    }
}