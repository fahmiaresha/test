<?php

use Illuminate\Database\Seeder;

class KonfirmasiPenjualanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('konfirmasi_penjualan')->insert([
            'KODE_DEPO' => rand(1,10),
            'ID_SALES_B' => rand(1,3),
            'TGL_KONFIRMASI_PENJUALAN' => date("Y-m-d",strtotime("2020-08-28")),
            'STATUS_KONFIRMASI_PENJUALAN' => 1,
            'CATATAN' => "Stok habis"
        ]);

        DB::table('konfirmasi_penjualan')->insert([
            'KODE_DEPO' => rand(1,10),
            'ID_SALES_B' => rand(1,3),
            'TGL_KONFIRMASI_PENJUALAN' => date("Y-m-d",strtotime("2020-08-28")),
            'STATUS_KONFIRMASI_PENJUALAN' => 1
        ]);

        DB::table('konfirmasi_penjualan')->insert([
            'KODE_DEPO' => rand(1,10),
            'ID_SALES_B' => rand(1,3),
            'TGL_KONFIRMASI_PENJUALAN' => date("Y-m-d",strtotime("2020-08-29")),
            'STATUS_KONFIRMASI_PENJUALAN' => 1
        ]);

        DB::table('konfirmasi_penjualan')->insert([
            'KODE_DEPO' => rand(1,10),
            'ID_SALES_B' => rand(1,3),
            'TGL_KONFIRMASI_PENJUALAN' => date("Y-m-d",strtotime("2020-08-29")),
            'STATUS_KONFIRMASI_PENJUALAN' => 1
        ]);

        DB::table('konfirmasi_penjualan')->insert([
            'KODE_DEPO' => rand(1,10),
            'ID_SALES_B' => rand(1,3),
            'TGL_KONFIRMASI_PENJUALAN' => date("Y-m-d",strtotime("2020-08-30")),
            'STATUS_KONFIRMASI_PENJUALAN' => 1
        ]);

        DB::table('konfirmasi_penjualan')->insert([
            'KODE_DEPO' => rand(1,10),
            'ID_SALES_B' => rand(1,3),
            'TGL_KONFIRMASI_PENJUALAN' => date("Y-m-d",strtotime("2020-08-30")),
            'STATUS_KONFIRMASI_PENJUALAN' => 0
        ]);
    }
}