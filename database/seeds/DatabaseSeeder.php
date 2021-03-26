<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JabatanTableSeeder::class);
        $this->call(JenisBahanBakuTableSeeder::class);
        $this->call(JenisProductTableSeeder::class);
        $this->call(MouldingTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BahanBakuTableSeeder::class);
        $this->call(MesinTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(PenerimaanBahanBakuTableSeeder::class);
        $this->call(DepoAirMinumTableSeeder::class);
        $this->call(PengambilanBahanBakuTableSeeder::class);
        $this->call(DetailPengambilanTableSeeder::class);
        $this->call(PembayaranPenerimaanBahanBakuTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(KonfirmasiPenjualanTableSeeder::class);
        $this->call(ProsesProduksiTableSeeder::class);
        $this->call(PenjualanTableSeeder::class);
        $this->call(HasilProductTableSeeder::class);
        $this->call(PembayaranPenjualanTableSeeder::class);
        $this->call(PengirimanTableSeeder::class);
        $this->call(DetilPenjualanTableSeeder::class);
        $this->call(EvaluasiKinerjaSalesaTableSeeder::class);
        $this->call(EvaluasiKinerjaSalesbTableSeeder::class);
    }
}
