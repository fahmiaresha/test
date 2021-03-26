<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 1,
            'NAMA_PRODUCT' => "Tutup Galon ORI Polos",
            'HARGA_PRODUCT' => 325,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 1,
            'NAMA_PRODUCT' => "Tutup Galon ORI Aqua",
            'HARGA_PRODUCT' => 400,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 1,
            'NAMA_PRODUCT' => "Tutup Galon ORI Cleo",
            'HARGA_PRODUCT' => 400,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 1,
            'NAMA_PRODUCT' => "Tutup Galon ORI Warna",
            'HARGA_PRODUCT' => 350,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 2,
            'NAMA_PRODUCT' => "Tutup Galon Pendek Polos",
            'HARGA_PRODUCT' => 230,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 2,
            'NAMA_PRODUCT' => "Tutup Galon Pendek Aqua",
            'HARGA_PRODUCT' => 300,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 2,
            'NAMA_PRODUCT' => "Tutup Galon Pendek Cleo",
            'HARGA_PRODUCT' => 300,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 2,
            'NAMA_PRODUCT' => "Tutup Galon Pendek Warna",
            'HARGA_PRODUCT' => 250,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 3,
            'NAMA_PRODUCT' => "Tutup Galon Panjang Polos",
            'HARGA_PRODUCT' => 105,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 3,
            'NAMA_PRODUCT' => "Tutup Galon Panjang Aqua",
            'HARGA_PRODUCT' => 200,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 3,
            'NAMA_PRODUCT' => "Tutup Galon Panjang Cleo",
            'HARGA_PRODUCT' => 200,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 3,
            'NAMA_PRODUCT' => "Tutup Galon Panjang Warna",
            'HARGA_PRODUCT' => 150,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 4,
            'NAMA_PRODUCT' => "Tutup Botol Kecap Merah",
            'HARGA_PRODUCT' => 200,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 5,
            'NAMA_PRODUCT' => "Tutup Botol Shortneck Hitam",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 5,
            'NAMA_PRODUCT' => "Tutup Botol Shortneck Biru",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 5,
            'NAMA_PRODUCT' => "Tutup Botol Shortneck Merah",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 6,
            'NAMA_PRODUCT' => "Tutup Botol Longneck Merah",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 6,
            'NAMA_PRODUCT' => "Tutup Botol Longneck Kuning",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 6,
            'NAMA_PRODUCT' => "Tutup Botol Longneck Hijau",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 6,
            'NAMA_PRODUCT' => "Tutup Botol Longneck Biru",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 6,
            'NAMA_PRODUCT' => "Tutup Botol Longneck Orange",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 6,
            'NAMA_PRODUCT' => "Tutup Botol Longneck Ungu",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 0,
        ]);

        DB::table('product')->insert([
            'KODE_JENIS_PRODUCT' => 7,
            'NAMA_PRODUCT' => "Tutup Botol Flip Top Kuning",
            'HARGA_PRODUCT' => 175,
            'STOK_PRODUCT' => 0,
        ]);

    }
}