<?php

namespace App\Http\Controllers\ManajerMarketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesA;
use App\Models\SalesB;
use App\Models\EvaluasiKinerjaSalesa;
use App\Models\EvaluasiKinerjaSalesb;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
    	$data_sales_a = SalesA::all();
    	$data_sales_b = SalesB::all();
    	return view('/manajer-marketing/sales')->with(compact("data_sales_a","data_sales_b"));
    }

    public function viewA($id)
    {
        //tanggal pertama bulan ini
    	$date = Carbon::now()->startOfMonth();

	    //tanggal terakhir bulan ini
	    $date_end = Carbon::now()->endOfMonth();

    	$data = SalesA::find($id);
        $jabatan = "Sales A";
        $jenis_kelamin = DB::table('sales_a')->where('ID_SALES_A', $id)->value('JENIS_KELAMIN_SALES_A');
        $evaluasi = EvaluasiKinerjaSalesa::select('ID_EVALUASI_KINERJA_SALESA')
                    ->where('ID_SALES_A', '=', $id)
                    ->whereBetween(DB::raw('DATE(TGL_EVALUASI_KINERJA_SALESA)'),[$date,$date_end])
                    ->count();
    	return view('/manajer-marketing/detail-sales')->with(compact("data","jabatan","evaluasi", "jenis_kelamin"));
    }

    public function viewB($id)
    {
        //tanggal pertama bulan ini
    	$date = Carbon::now()->startOfMonth();

	    //tanggal terakhir bulan ini
        $date_end = Carbon::now()->endOfMonth();
        
    	$data = SalesB::find($id);
        $jabatan = "Sales B";
        $jenis_kelamin = DB::table('sales_b')->where('ID_SALES_B', $id)->value('JENIS_KELAMIN_SALES_B');
        $evaluasi = EvaluasiKinerjaSalesa::select('ID_EVALUASI_KINERJA_SALESA')
                    ->where('ID_SALES_A', '=', $id)
                    ->whereBetween(DB::raw('DATE(TGL_EVALUASI_KINERJA_SALESA)'),[$date,$date_end])
                    ->count();
    	return view('/manajer-marketing/detail-sales')->with(compact("data","jabatan","evaluasi", "jenis_kelamin"));
    }

    public function EvaluasiKinerjaSales(Request $request){
        if($request->jabatan == "Sales A"){
            EvaluasiKinerjaSalesa::insert([
                'ID_MANAJER_MARKETING' => 1,
                'ID_SALES_A' => $request->id_sales,
                'TGL_EVALUASI_KINERJA_SALESA' => date("Y-m-d"),
                'EVALUASI_SALESA' => $request->evaluasi
            ]);
        }
        else{
            EvaluasiKinerjaSalesb::insert([
                'ID_MANAJER_MARKETING' => 1,
                'ID_SALES_B' => $request->id_sales,
                'TGL_EVALUASI_KINERJA_SALESB' => date("Y-m-d"),
                'EVALUASI_SALESB' => $request->evaluasi
            ]);
        }

        return redirect('/manajer-marketing/evaluasi-kinerja-sales');
    }

    // Tutup
    public function insertA($id)
    {
        $data = SalesA::find($id);
        $jabatan = "Sales A";
        return view('/manajer-marketing/input-evaluasi-kinerja-sales')->with(compact("data","jabatan"));
    }

    public function insertB($id)
    {
        $data = SalesB::find($id);
        $jabatan = "Sales B";
        return view('/manajer-marketing/input-evaluasi-kinerja-sales')->with(compact("data","jabatan"));
    }

    public function storeA(Request $request)
    {
        $request->validate([
            'ID_MANAJER_MARKETING' => 'required|exist:App\Models\ManajerMarketing,ID_MANAJER_MARKETING|integer',
            'TGL_EVALUASI_KINERJA_SALESA' => 'required|date_format:Y-m-d',
            'ID_SALES_A' => 'required|exist:App\Models\SalesA,ID_SALES_A|integer',
            'EVALUASI_SALESA' => 'required|string|max:300|regex:/^[a-zA-Z ]+$/',
        ]);

        $data = EvaluasiKinerjaSalesa::insert([
            'ID_MANAJER_MARKETING' => $request->ID_MANAJER_MARKETING,
            'TGL_EVALUASI_KINERJA_SALESA' => date("Y-m-d",strtotime($request->TGL_EVALUASI_KINERJA_SALESA)),
            'ID_SALES_A' => $request->ID_SALES_A,
            'EVALUASI_SALESA' => $request->EVALUASI_SALESA
        ]);

        return redirect('/manajer-marketing/evaluasi-kinerja-sales');
    }

    public function storeB(Request $request)
    {
        $request->validate([
            'ID_MANAJER_MARKETING' => 'required|exist:App\Models\ManajerMarketing,ID_MANAJER_MARKETING|integer',
            'TGL_EVALUASI_KINERJA_SALESB' => 'required|date_format:Y-m-d',
            'ID_SALES_B' => 'required|exist:App\Models\SalesB,ID_SALES_B|integer',
            'EVALUASI_SALESB' => 'required|string|max:300|regex:/^[a-zA-Z ]+$/',
        ]);

        $data = EvaluasiKinerjaSalesb::insert([
            'ID_MANAJER_MARKETING' => $request->ID_MANAJER_MARKETING,
            'TGL_EVALUASI_KINERJA_SALESB' => date("Y-m-d",strtotime($request->TGL_EVALUASI_KINERJA_SALESB)),
            'ID_SALES_B' => $request->ID_SALES_B,
            'EVALUASI_SALESB' => $request->EVALUASI_SALESB
        ]);

        return redirect('/manajer-marketing/evaluasi-kinerja-sales');
    }
}
