<?php

namespace App\Http\Controllers\SalesA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepoAirMinum;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $province = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        $id_sales = Auth::user()->sales_a(Auth::user()->ID_USER);
        $data = DepoAirMinum::where('ID_SALES_A',$id_sales->ID_SALES_A)->get();
        return view('sales-a/customer', compact('data', 'province'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        $r->validate([
            'kota' => 'required|exists:App\Models\IndonesiaCity,id|integer',
            'nama_customer' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'nama_depo' => 'required|string|max:50',
            'alamat_depo' => 'required|string|max:100',
            'no_telp_depo' => 'nullable|string|max:50|regex:/^[0-9 ]+$/',
            'email_depo' => 'nullable|string|email'
        ]);

        $depo_air_minum = new DepoAirMinum;
        $depo_air_minum->id_sales_a = $r->id_sales_a;
        $depo_air_minum->nama_depo = $r->nama_depo;
        $depo_air_minum->alamat_depo = $r->alamat_depo;
        $depo_air_minum->kode_kota = $r->kota;
        $depo_air_minum->no_telp_depo = $r->no_telp_depo;
        $depo_air_minum->email_depo = $r->email_depo;
        $depo_air_minum->nama_customer = $r->nama_customer;
        $depo_air_minum->save();

        return redirect('/sales-a/customer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        $r->validate([
            'kota' => 'required|exists:App\Models\IndonesiaCity,id|integer',
            'nama_customer' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'nama_depo' => 'required|string|max:50',
            'alamat_depo' => 'required|string|max:100',
            'no_telp_depo' => 'nullable|string|max:50|regex:/^[0-9 ]+$/',
            'email_depo' => 'nullable|string|email'
        ]);

        $depo_air_minum = DepoAirMinum::find($r->kode_depo);
        $depo_air_minum->nama_depo = $r->nama_depo;
        $depo_air_minum->alamat_depo = $r->alamat_depo;
        $depo_air_minum->kode_kota = $r->kota;
        $depo_air_minum->no_telp_depo = $r->no_telp_depo;
        $depo_air_minum->email_depo = $r->email_depo;
        $depo_air_minum->nama_customer = $r->nama_customer;
        $depo_air_minum->save();

        return redirect('/sales-a/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getKota($kode_depo)
    { 
        $depo = DepoAirMinum::where('KODE_DEPO',$kode_depo);

        return $depo->value('KODE_KOTA');
    }
}
