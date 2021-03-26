<?php

use Illuminate\Database\Seeder;

class PenjualanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('penjualan')->insert([
            'ID_MANAJER_MARKETING' => rand(1,5),
            'KODE_DEPO' => 1,
            'ID_SALES_B' => rand(1,5),
            'TGL_PENJUALAN' => date("Y-m-d",strtotime("2020-08-28")),
            'TGL_KIRIM' => date("Y-m-d",strtotime("2020-08-29")),
            'METODE_KIRIM' => "JNE",
            'ONGKOS_KIRIM' => 20000,
            'TOTAL_PENJUALAN' => floatval((61*325)+(425*400)+20000),
            'STATUS_PENJUALAN' => 1
        ]);

        DB::table('penjualan')->insert([
            'ID_MANAJER_MARKETING' => rand(1,5),
            'KODE_DEPO' => 2,
            'ID_SALES_B' => rand(1,5),
            'TGL_PENJUALAN' => date("Y-m-d",strtotime("2020-08-29")),
            'TGL_KIRIM' => date("Y-m-d",strtotime("2020-08-29")),
            'METODE_KIRIM' => "Ambil Sendiri",
            'ONGKOS_KIRIM' => 0,
            'TOTAL_PENJUALAN' => floatval((149*400)+0),
            'STATUS_PENJUALAN' => 1
        ]);

        DB::table('penjualan')->insert([
            'ID_MANAJER_MARKETING' => rand(1,5),
            'KODE_DEPO' => 3,
            'ID_SALES_B' => rand(1,5),
            'TGL_PENJUALAN' => date("Y-m-d",strtotime("2020-08-30")),
            'TGL_KIRIM' => date("Y-m-d",strtotime("2020-08-30")),
            'METODE_KIRIM' => "POS",
            'ONGKOS_KIRIM' => 12000,
            'TOTAL_PENJUALAN' => floatval((564*350)+(291*230)+12000),
            'STATUS_PENJUALAN' => 1
        ]);

        DB::table('penjualan')->insert([
            'ID_MANAJER_MARKETING' => rand(1,5),
            'KODE_DEPO' => 4,
            'ID_SALES_B' => rand(1,5),
            'TGL_PENJUALAN' => date("Y-m-d",strtotime("2020-08-31")),
            'TGL_KIRIM' => date("Y-m-d",strtotime("2020-08-31")),
            'METODE_KIRIM' => "TIKI",
            'ONGKOS_KIRIM' => 30000,
            'TOTAL_PENJUALAN' => floatval((493*325)+(783*400)+(63*400)+(878*350)+30000),
            'STATUS_PENJUALAN' => 0
        ]);
    }
}