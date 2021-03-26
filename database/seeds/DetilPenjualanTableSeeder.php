<?php

use Illuminate\Database\Seeder;

class DetilPenjualanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 1,
            'KODE_PRODUCT' => 1,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 61,
            'HARGA_BARANG' => 325,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 1,
            'KODE_PRODUCT' => 2,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 425,
            'HARGA_BARANG' => 400,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 2,
            'KODE_PRODUCT' => 3,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 149,
            'HARGA_BARANG' => 400,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 3,
            'KODE_PRODUCT' => 4,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 564,
            'HARGA_BARANG' => 350,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 3,
            'KODE_PRODUCT' => 5,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 291,
            'HARGA_BARANG' => 230,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 4,
            'KODE_PRODUCT' => 1,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 493,
            'HARGA_BARANG' => 325,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 4,
            'KODE_PRODUCT' => 2,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 783,
            'HARGA_BARANG' => 400,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 4,
            'KODE_PRODUCT' => 3,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 63,
            'HARGA_BARANG' => 400,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 4,
            'KODE_PRODUCT' => 4,
            'JUMLAH_SAK' => 1,
            'JUMLAH_PCS' => 878,
            'HARGA_BARANG' => 350,
        ]);
    }
}