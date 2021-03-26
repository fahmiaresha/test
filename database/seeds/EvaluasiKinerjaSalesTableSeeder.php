<?php

use Illuminate\Database\Seeder;

class EvaluasiKinerjaSalesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluasi_kinerja_sales')->insert([
            'ID_PENJUALAN' => 1,
            'TGL_EVALUASI_KINERJA_SALES' => date("Y-m-d",strtotime("2020-08-30")),
            'EVALUASI_SALES_1' => "Sedang",
            'EVALUASI_SALES_2' => "Baik"
        ]);

        DB::table('evaluasi_kinerja_sales')->insert([
            'ID_PENJUALAN' => 2,
            'TGL_EVALUASI_KINERJA_SALES' => date("Y-m-d",strtotime("2020-08-31")),
            'EVALUASI_SALES_1' => "Baik",
            'EVALUASI_SALES_2' => "Sedang"
        ]);

        DB::table('evaluasi_kinerja_sales')->insert([
            'ID_PENJUALAN' => 3,
            'TGL_EVALUASI_KINERJA_SALES' => date("Y-m-d",strtotime("2020-09-01")),
            'EVALUASI_SALES_1' => "Baik",
            'EVALUASI_SALES_2' => "Baik"
        ]);

        DB::table('evaluasi_kinerja_sales')->insert([
            'ID_PENJUALAN' => 4,
            'TGL_EVALUASI_KINERJA_SALES' => date("Y-m-d",strtotime("2020-09-02")),
            'EVALUASI_SALES_1' => "Sedang",
            'EVALUASI_SALES_2' => "Sedang"
        ]);
    }
}