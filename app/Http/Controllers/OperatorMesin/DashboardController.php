<?php

namespace App\Http\Controllers\OperatorMesin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\ProsesProduksi;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $StockPlastikBekas = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Plastik Bekas')
                            ->first();
        $StockPlastikVirgin = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Plastik Virgin')
                            ->first();
        $StockPewarna = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Pewarna')
                            ->first();
        $BelumSelesai = ProsesProduksi::select('*')
                        ->where(DB::Raw('IFNULL( EVALUASI_PRODUCT, null )', 'IFNULL( EVALUASI_MESIN, null )', 'IFNULL( EVALUASI_BAHAN_BAKU, null )'))
                        ->count();
        $Check = ProsesProduksi::select('*')->count();
        $Selesai = $Check - $BelumSelesai;

        $data = ProsesProduksi::select('*')
                        ->where(DB::Raw('IFNULL( EVALUASI_PRODUCT, null )', 'IFNULL( EVALUASI_MESIN, null )', 'IFNULL( EVALUASI_BAHAN_BAKU, null )'))
                        ->get();

        return view('operator-mesin.dashboard')->with(compact('data', 'StockPlastikBekas', 'StockPlastikVirgin', 'StockPewarna', 'Selesai', 'BelumSelesai'));
    }
}
