<?php

namespace App\Http\Controllers\OperatorMesin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProsesProduksi;
use App\Models\PenerimaanBahanBaku;
use DB;

class HasilProduksiController extends Controller
{
    public function index()
    {
    	$data = ProsesProduksi::all();
    	return view('operator-mesin.evaluasi-hasil-produksi')->with(compact("data"));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		"KODE_PRODUKSI" => 'required|exists:App\Models\ProsesProduksi,KODE_PRODUKSI|integer',
            "HASIL_BAGUS_KG" => 'required|numeric|min:0',
            "HASIL_RUSAK_KG" => 'required|numeric|min:0',
            "EVALUASI_PRODUCT" => 'required|string|regex:/^[a-zA-Z ]+$/',
            "EVALUASI_MESIN" => 'required|string|regex:/^[a-zA-Z ]+$/',
    	]);

        DB::transaction(function() use ($request){
            $prosesproduksi = ProsesProduksi::find($request->KODE_PRODUKSI);
            $prosesproduksi->HASIL_BAGUS_KG = $request->HASIL_BAGUS_KG;
            $prosesproduksi->HASIL_RUSAK_KG = $request->HASIL_RUSAK_KG;
            $prosesproduksi->EVALUASI_PRODUCT = $request->EVALUASI_PRODUCT;
            $prosesproduksi->EVALUASI_MESIN = $request->EVALUASI_MESIN;

            $loop=0;

            $bahan_baku = [];

            foreach ($prosesproduksi->pengambilan_bahan_baku->detail_pengambilans as $key) {
                $loop++;
                $nama = "EVALUASI_BAHAN_BAKU_".$loop;
                $request->validate([
                    $nama => 'required'
                ]);

                $bahan_baku[$loop-1] = $request->$nama;
            }

            $prosesproduksi->EVALUASI_BAHAN_BAKU = $bahan_baku;
            $prosesproduksi->save();

            $penerimaan = $prosesproduksi->pengambilan_bahan_baku->detail_pengambilans;

            foreach ($penerimaan as $key => $value) {
                $penerimaan = PenerimaanBahanBaku::find($value->ID_PENERIMAAN);
                $nama_bahan = $penerimaan->bahan_baku->NAMA_BAHAN_BAKU;
                if(strpos(strtolower($nama_bahan),"plastik") !== false){
                    $penerimaan->STOK_PENERIMAAN = $penerimaan->STOK_PENERIMAAN + $prosesproduksi->HASIL_RUSAK_KG;
                }
                $penerimaan->save();
            }
        });
        return redirect('/operator-mesin/evaluasi-hasil-produksi');

    }

    public function update(Request $request)
    {
        $request->validate([
            "KODE_PRODUKSI" => 'required|exists:App\Models\ProsesProduksi,KODE_PRODUKSI|integer',
            "HASIL_BAGUS_KG" => 'required|numeric|min:0',
            "HASIL_RUSAK_KG" => 'required|numeric|min:0',
            "EVALUASI_PRODUCT" => 'required|string|regex:/^[a-zA-Z ]+$/',
            "EVALUASI_MESIN" => 'required|string|regex:/^[a-zA-Z ]+$/',
        ]);
        
        DB::transaction(function() use ($request){
            $prosesproduksi = ProsesProduksi::find($request->KODE_PRODUKSI);
            $prosesproduksi->HASIL_BAGUS_KG = $request->HASIL_BAGUS_KG;

            $penerimaan = $prosesproduksi->pengambilan_bahan_baku->detail_pengambilans;

            foreach ($penerimaan as $key => $value) {
                $penerimaan = PenerimaanBahanBaku::find($value->ID_PENERIMAAN);
                $nama_bahan = $penerimaan->bahan_baku->NAMA_BAHAN_BAKU;
                if(strpos(strtolower($nama_bahan),"plastik") !== false){
                    $penerimaan->STOK_PENERIMAAN = $penerimaan->STOK_PENERIMAAN - $prosesproduksi->HASIL_RUSAK_KG + $request->HASIL_RUSAK_KG;
                }
                $penerimaan->save();
            }

            $prosesproduksi->HASIL_RUSAK_KG = $request->HASIL_RUSAK_KG;
            $prosesproduksi->EVALUASI_PRODUCT = $request->EVALUASI_PRODUCT;
            $prosesproduksi->EVALUASI_MESIN = $request->EVALUASI_MESIN;

            $loop=0;
            $bahan_baku = [];
            foreach ($prosesproduksi->pengambilan_bahan_baku->detail_pengambilans as $key) {
                $loop++;
                $nama = "EVALUASI_BAHAN_BAKU_".$loop;
                $request->validate([
                    $nama => 'required'
                ]);

                $bahan_baku[$loop-1] = $request->$nama;
            }

            $prosesproduksi->EVALUASI_BAHAN_BAKU = $bahan_baku;
            $prosesproduksi->save();
        });
        return redirect('/operator-mesin/evaluasi-hasil-produksi');
    }
}
