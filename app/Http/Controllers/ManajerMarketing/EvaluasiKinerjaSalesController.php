<?php

namespace App\Http\Controllers\ManajerMarketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EvaluasiKinerjaSalesa;
use App\Models\EvaluasiKinerjaSalesb;

class EvaluasiKinerjaSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesA = EvaluasiKinerjaSalesa::select('evaluasi_kinerja_salesa.*', 'm.nama_manajer_marketing', 's.nama_sales_a')
                ->join('manajer_marketing as m', 'm.id_manajer_marketing', '=', 'evaluasi_kinerja_salesa.id_manajer_marketing')
                ->join('sales_a as s', 's.id_sales_a', '=', 'evaluasi_kinerja_salesa.id_sales_a')
                ->get();
        $salesB = EvaluasiKinerjaSalesb::select('evaluasi_kinerja_salesb.*', 'm.nama_manajer_marketing', 's.nama_sales_b')
                ->join('manajer_marketing as m', 'm.id_manajer_marketing', '=', 'evaluasi_kinerja_salesb.id_manajer_marketing')
                ->join('sales_b as s', 's.id_sales_b', '=', 'evaluasi_kinerja_salesb.id_sales_b')
                ->get();

        return view('/manajer-marketing/evaluasi-kinerja-sales')->with(compact('salesA', 'salesB'));
    }
}
