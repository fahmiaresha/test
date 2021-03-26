<?php

namespace App\Http\Controllers\SalesB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KonfirmasiPenjualan;
use DB;

class FollowUpController extends Controller
{
    public function index()
    {
    	$data = KonfirmasiPenjualan::all();
    	return view('sales-b/follow-up-customer')->with(compact("data"));
    }

    public function order(Request $request)
    {
    	$request->validate([
    		'ID_KONFIRMASI_PENJUALAN' => 'required|exists:App\Models\KonfirmasiPenjualan,ID_KONFIRMASI_PENJUALAN|integer'
    	]);
        DB::transaction(function() use ($request){
        	$konfirmasi = KonfirmasiPenjualan::find($request->ID_KONFIRMASI_PENJUALAN);
        	$konfirmasi->STATUS_KONFIRMASI_PENJUALAN = 1;
        	$konfirmasi->save();
        });
    	return response()->json(["success" => true]);
    }

    public function tidakOrder(Request $request)
    {
    	$request->validate([
    		'alasan' => 'required|max:255|string',
    		'ID_KONFIRMASI_PENJUALAN' => 'required|exists:App\Models\KonfirmasiPenjualan,ID_KONFIRMASI_PENJUALAN|integer'
    	]);
        DB::transaction(function() use ($request){
        	$konfirmasi = KonfirmasiPenjualan::find($request->ID_KONFIRMASI_PENJUALAN);
        	$konfirmasi->STATUS_KONFIRMASI_PENJUALAN = 1;
        	$konfirmasi->CATATAN = $request->alasan;
        	$konfirmasi->save();
        });
    	return response()->json(["success" => true]);
    }
}
