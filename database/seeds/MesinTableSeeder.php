<?php

use Illuminate\Database\Seeder;

class MesinTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('mesin')->insert([
            'kode_moulding' => 1,
            'nama_mesin' => 'Mesin 1'
        ]);

        DB::table('mesin')->insert([
            'kode_moulding' => 2,
            'nama_mesin' => 'Mesin 2'
        ]);

        DB::table('mesin')->insert([
            'kode_moulding' => 1,
            'nama_mesin' => 'Mesin 3'
        ]);

        DB::table('mesin')->insert([
            'kode_moulding' => 2,
            'nama_mesin' => 'Mesin 4'
        ]);
    }
}