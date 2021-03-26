<?php

use Illuminate\Database\Seeder;

class ProsesProduksiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    { 
        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 1,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-28"))
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 2,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-28"))
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 3,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-28"))
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 4,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-29"))
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 5,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-29"))
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 6,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-29"))
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 7,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-30"))
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 8,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-30"))
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => 9,
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-30"))
        ]);
        
    }
}