<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembayaranPenerimaanBahanBaku;
use DB;
use Auth;

class PembayaranSupplierController extends Controller
{
    public function index()
    {
        $data = PembayaranPenerimaanBahanBaku::all();
        
        return view('owner.pembayaran-supplier')->with(compact("data"));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:App\Models\PembayaranPenerimaanBahanBaku,KODE_PEMBAYARAN'
        ]);
        $data = null;
        DB::transaction(function() use ($request,&$data){
        	$data = PembayaranPenerimaanBahanBaku::find($request->id);
        	if($data->STATUS_PEMBAYARAN){
                $data->STATUS_PEMBAYARAN = 0;
        	}
        	else{
        		$data->STATUS_PEMBAYARAN = 1;
            }
            $data->ID_OWNER = Auth::user()->owner(Auth::user()->ID_USER)->ID_OWNER;
        	$data->save();
        });
        return response()->json(["success" => true, "data" => $data]);
    }
}
