<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembayaranPenjualan;
use DB;
use Auth;

class PembayaranCustomerController extends Controller
{
    public function index()
    {
    	$data = PembayaranPenjualan::all();
    	return view('owner.pembayaran-customer')->with(compact("data"));
    }

    public function update(Request $request)
    {
        //tested by dea (14/9/2020 16:40)
        $request->validate([
            'id' => 'required|integer|exists:App\Models\PembayaranPenjualan,KODE_PEMBAYARAN_PENJUALAN'
        ]);
        $data = null;
        DB::transaction(function() use ($request,&$data){
        	$data = PembayaranPenjualan::find($request->id);
        	if($data->STATUS_PEMBAYARAN){
        		$data->STATUS_PEMBAYARAN = 0;
        	}
        	else{
        		$data->STATUS_PEMBAYARAN = 1;
        	}
            $data->ID_OWNER = Auth::user()->owner(Auth::user()->ID_USER)->ID_OWNER;
            $data->TGL_PEMBAYARAN = date("Y-m-d");
        	$data->save();
        });

    	return response()->json(["success" => true, "data" => $data]);
    }
}
