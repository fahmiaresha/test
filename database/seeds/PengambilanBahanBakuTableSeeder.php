<?php

use Illuminate\Database\Seeder;

class PengambilanBahanBakuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 1,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-28 06:00:00")),
			'HASIL_PRODUK' => "Tutup Galon ORI Polos"
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 2,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-28 14:00:00")),
			'HASIL_PRODUK' => "Tutup Galon ORI Aqua"
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 3,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-28 22:00:00")),
			'HASIL_PRODUK' => "Tutup Galon ORI Cleo"
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 4,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-29 06:00:00")),
			'HASIL_PRODUK' => "Tutup Galon ORI Warna"
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 1,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-29 14:00:00")),
			'HASIL_PRODUK' => "Tutup Galon Pendek Polos"
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 2,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-29 22:00:00")),
			'HASIL_PRODUK' => "Tutup Galon Pendek Aqua"
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 3,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-30 06:00:00")),
			'HASIL_PRODUK' => "Tutup Galon Pendek Cleo"
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 4,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-30 14:00:00")),
			'HASIL_PRODUK' => "Tutup Galon Pendek Warna"
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => 1,
			'WAKTU_PENGAMBILAN' => date("Y-m-d H:i:s",strtotime("2020-08-30 22:00:00")),
			'HASIL_PRODUK' => "Tutup Galon Panjang Polos"
        ]);
    }
}