<?php

use Illuminate\Database\Seeder;

class MouldingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $mouldings = ['Tipe A', 'Tipe B'];

    	foreach($mouldings as $m){
    		DB::table('moulding')->insert([
	            'nama_moulding' => $m
            ]);
        } 
    }
}