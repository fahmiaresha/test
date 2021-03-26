<?php

namespace App\Http\Controllers\ManajerMarketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepoAirMinum;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        $data = DepoAirMinum::all();

        return view('manajer-marketing/customer', compact('data', 'provinsi'));
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
            'id_manajer_marketing' => 'required|exists:App\Models\ManajerMarketing,ID_MANAJER_MARKETING|integer',
            'nama_customer' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'nama_depo' => 'required|string|max:50|regex:/^[a-zA-Z .]+$/',
            'alamat_depo' => 'required|string|max:100',
            'no_telp_depo' => 'nullable|string|max:50|regex:/^[0-9 +]+$/',
            'email_depo' => 'nullable|string|email'
        ]);

        $depo_air_minum = new DepoAirMinum;
        $depo_air_minum->NAMA_DEPO = $r->nama_depo;
        $depo_air_minum->ALAMAT_DEPO = $r->alamat_depo;
        $depo_air_minum->ID_MANAJER_MARKETING = $r->id_manajer_marketing;
        $depo_air_minum->KODE_KOTA = $r->kota;
        $depo_air_minum->NO_TELP_DEPO = $r->no_telp_depo;
        $depo_air_minum->EMAIL_DEPO = $r->email_depo;
        $depo_air_minum->NAMA_CUSTOMER = $r->nama_customer;
        $depo_air_minum->save();

        return redirect('/manajer-marketing/customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getKota($kode_depo)
    { 
        $depo = DepoAirMinum::where('KODE_DEPO',$kode_depo);

        return $depo->value('KODE_KOTA');
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
            'nama_depo' => 'required|string|max:50|regex:/^[a-zA-Z .]+$/',
            'alamat_depo' => 'required|string|max:100',
            'no_telp_depo' => 'nullable|string|max:50|regex:/^[0-9 +]+$/',
            'email_depo' => 'nullable|string|email'
        ]);

        $depo_air_minum = DepoAirMinum::find($r->kode_depo);
        $depo_air_minum->NAMA_DEPO = $r->nama_depo;
        $depo_air_minum->ALAMAT_DEPO = $r->alamat_depo;
        $depo_air_minum->KODE_KOTA = $r->kota;
        $depo_air_minum->NO_TELP_DEPO = $r->no_telp_depo;
        $depo_air_minum->EMAIL_DEPO = $r->email_depo;
        $depo_air_minum->NAMA_CUSTOMER = $r->nama_customer;
        $depo_air_minum->save();

        return redirect('/manajer-marketing/customer');
    }
}
