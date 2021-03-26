<?php

namespace App\Http\Controllers\AdminGudang;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\PembayaranPenjualan;
use App\Models\Penjualan;
use App\Models\DepoAirMinum;
use App\Models\Supplier;
use Carbon\Carbon;

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

        $day = Carbon::now()->format('d');
        $month = Carbon::now()->addMonth(0)->format('m');
        $year = Carbon::now()->format('Y');
        $PenjualanBulanan = PembayaranPenjualan::select(DB::raw('SUM(p.TOTAL_PENJUALAN) as TOTAL'))
                            ->join('penjualan as p', 'p.ID_PENJUALAN', '=', 'pembayaran_penjualan.ID_PENJUALAN')
                            ->where('pembayaran_penjualan.STATUS_PEMBAYARAN', '=', 1)
                            ->whereDate(DB::raw('MONTH(pembayaran_penjualan.TGL_PEMBAYARAN)'), $month)
                            ->first();
        $PenjualanMingguan = PembayaranPenjualan::select(DB::raw('SUM(p.TOTAL_PENJUALAN) as TOTAL'))
                            ->join('penjualan as p', 'p.ID_PENJUALAN', '=', 'pembayaran_penjualan.ID_PENJUALAN')
                            ->where('pembayaran_penjualan.STATUS_PEMBAYARAN', '=', 1)
                            ->whereDate(DB::raw('MONTH(pembayaran_penjualan.TGL_PEMBAYARAN)'), $month)
                            ->first();
        
        $Order = Penjualan::select(DB::raw('DATE_FORMAT(TGL_PENJUALAN, "%d/%m/%Y") AS TANGGAL'), 'KODE_DEPO')
                ->where('STATUS_PENJUALAN', '=', 0)
                ->get();

        $supplier = Supplier::select('NAMA_SUPPLIER', 'ALAMAT_SUPPLIER')->get();
        $customer = DepoAirMinum::select('NAMA_CUSTOMER', 'ALAMAT_DEPO')->get();
        
        return view('admin-gudang.dashboard')->with(compact('StockPlastikBekas', 'StockPlastikVirgin', 'StockPewarna', 'PenjualanBulanan', 'PenjualanMingguan', 'Order', 'supplier', 'customer'));
    }
}
