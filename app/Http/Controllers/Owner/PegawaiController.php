<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesA;
use App\Models\SalesB;
use App\Models\OperatorMesin;
use App\Models\ManajerMarketing;
use App\Models\AdminGudang;
use App\Models\User;
use DB;

class PegawaiController extends Controller
{
       public function indexSales()
    {
    	$data_sales_a = SalesA::all();
    	$data_sales_b = SalesB::all();
    	return view('/owner/sales')->with(compact("data_sales_a","data_sales_b"));
    }

    public function viewSalesA($id)
    {
    	$data = SalesA::find($id);
        $jabatan = "Sales A";
        $jenis_kelamin = DB::table('sales_a')->where('ID_SALES_A', $id)->value('JENIS_KELAMIN_SALES_A');
    	return view('/owner/detail-sales')->with(compact("data","jabatan","jenis_kelamin"));
    }

    public function viewSalesB($id)
    {
    	$data = SalesB::find($id);
        $jabatan = "Sales B";
        $jenis_kelamin = DB::table('sales_b')->where('ID_SALES_B', $id)->value('JENIS_KELAMIN_SALES_B');
    	return view('/owner/detail-sales')->with(compact("data","jabatan","jenis_kelamin"));
    }

    public function indexOperatorMesin(){
        $data = OperatorMesin::all();
        return view('/owner/operator-mesin')->with(compact("data"));
    }

    public function indexAdminGudang(){
        $data = AdminGudang::all();
        return view('/owner/admin-gudang')->with(compact("data"));
    }

    public function indexManajerMarketing(){
        $data = ManajerMarketing::all();
        return view('/owner/manajer-marketing')->with(compact("data"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA' => 'required|regex:/^[a-zA-Z ]+$/',
            'JENIS_KELAMIN' => 'required|integer',
            'KODE_JABATAN' => 'required|exists:App\Models\Jabatan,KODE_JABATAN|integer',
            'ALAMAT' => 'required|between:8,100',
            'PROVINSI' => 'required|exists:App\Models\IndonesiaProvince,id|integer',
            'KODE_KOTA' => 'required|exists:App\Models\IndonesiaCity,id|integer',
            'USERNAME_USER' => 'required|between:5,100',
            'FOTO_PROFILE' => 'required|integer|between:1,12',
            'NO_TELP' => 'nullable|regex:/^[0-9 +()-]+$/',
            'EMAIL' => 'nullable|email',
        ]);

        $foto = '/assets/img/avatar/avatar-'.$request->FOTO_PROFILE.'.png';
        $request->JENIS_KELAMIN = intval($request->JENIS_KELAMIN);
        
        DB::transaction(function() use ($request,$foto){
            // input ke sales A
            if($request->KODE_JABATAN == 4){

                SalesA::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_SALES_A' => ucwords($request->NAMA),
                    'ALAMAT_SALES_A' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_SALES_A' => $request->JENIS_KELAMIN,
                    'NO_TELP_SALES_A' => $request->NO_TELP,
                    'EMAIL_SALES_A' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

            }
            // input ke sales B
            elseif($request->KODE_JABATAN == 5){

                SalesB::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_SALES_B' => ucwords($request->NAMA),
                    'ALAMAT_SALES_B' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_SALES_B' => $request->JENIS_KELAMIN,
                    'NO_TELP_SALES_B' => $request->NO_TELP,
                    'EMAIL_SALES_B' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

            }

            elseif($request->KODE_JABATAN == 6){

                OperatorMesin::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_OPERATOR_MESIN' => ucwords($request->NAMA),
                    'ALAMAT_OPERATOR_MESIN' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_OPERATOR_MESIN' => $request->JENIS_KELAMIN,
                    'NO_TELP_OPERATOR_MESIN' => $request->NO_TELP,
                    'EMAIL_OPERATOR_MESIN' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

            }

            elseif($request->KODE_JABATAN == 3){

                //insert manajer marketing

                ManajerMarketing::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_MANAJER_MARKETING' => ucwords($request->NAMA),
                    'ALAMAT_MANAJER_MARKETING' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_MANAJER_MARKETING' => $request->JENIS_KELAMIN,
                    'NO_TELP_MANAJER_MARKETING' => $request->NO_TELP,
                    'EMAIL_MANAJER_MARKETING' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

            }
            elseif($request->KODE_JABATAN == 2){

                //insert admin gudang

                AdminGudang::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_ADMIN_GUDANG' => ucwords($request->NAMA),
                    'ALAMAT_ADMIN_GUDANG' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_ADMIN_GUDANG' => $request->JENIS_KELAMIN,
                    'NO_TELP_ADMIN_GUDANG' => $request->NO_TELP,
                    'EMAIL_ADMIN_GUDANG' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

            }

            User::insert([
                'KODE_JABATAN' => $request->KODE_JABATAN,
                'username' => strtolower($request->USERNAME_USER),
                'FOTO_PROFILE' => $foto,
                'created_at' => date('Y-m-d H:i:s')
            ]);

        });

        if($request->KODE_JABATAN == 4 || $request->KODE_JABATAN == 5){
            return redirect('/owner/sales');
        }
        elseif($request->KODE_JABATAN == 6){
            return redirect('/owner/operator-mesin');
        }
        elseif($request->KODE_JABATAN == 3){
            return redirect('/owner/manajer-marketing');
        }
        elseif($request->KODE_JABATAN == 2){
            return redirect('/owner/admin-gudang');
        }
    }

}
