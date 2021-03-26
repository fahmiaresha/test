<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\SalesA;
use App\Models\SalesB;
use App\Models\OperatorMesin;
use App\Models\ManajerMarketing;
use App\Models\AdminGudang;
use App\Models\User;

class ProfileController extends Controller
{

    public function editPegawai(Request $request){
        $request->validate([
            'NAMA' => 'required|regex:/^[a-zA-Z ]+$/',
            'JENIS_KELAMIN' => 'required|integer',
            'KODE_JABATAN' => 'required|exists:App\Models\Jabatan,KODE_JABATAN|integer',
            'ALAMAT' => 'required|between:8,100',
            'PROVINSI' => 'required|exists:App\Models\IndonesiaProvince,id|integer',
            'KODE_KOTA' => 'required|exists:App\Models\IndonesiaCity,id|integer',
            'USERNAME_USER' => 'required|between:5,100',
            'FOTO_PROFILE' => 'required|integer|between:1,12',
            'NO_TELP' => 'required|regex:/^[0-9+ +()]+$/',
            'EMAIL' => 'nullable|email',
        ]);

        $foto = '/assets/img/avatar/avatar-'.$request->FOTO_PROFILE.'.png';
        $request->JENIS_KELAMIN = intval($request->JENIS_KELAMIN);
        
        DB::transaction(function() use ($request,$foto){
            // input ke sales A
            if($request->KODE_JABATAN == 4){

                $id = Auth::user()->sales_a(Auth::user()->ID_USER)->ID_SALES_A;
                $pegawai = SalesA::where('ID_SALES_A',$id);

                $pegawai->update([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_SALES_A' => ucwords($request->NAMA),
                    'ALAMAT_SALES_A' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_SALES_A' => $request->JENIS_KELAMIN,
                    'NO_TELP_SALES_A' => $request->NO_TELP,
                    'EMAIL_SALES_A' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            }
            // input ke sales B
            elseif($request->KODE_JABATAN == 5){

                $id = Auth::user()->sales_b(Auth::user()->ID_USER)->ID_SALES_B;
                $pegawai = SalesB::where('ID_SALES_B',$id);

                $pegawai->update([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_SALES_B' => ucwords($request->NAMA),
                    'ALAMAT_SALES_B' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_SALES_B' => $request->JENIS_KELAMIN,
                    'NO_TELP_SALES_B' => $request->NO_TELP,
                    'EMAIL_SALES_B' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            }

            elseif($request->KODE_JABATAN == 6){

                //insert operator mesin
                $id = Auth::user()->operator_mesin(Auth::user()->ID_USER)->ID_OPERATOR_MESIN;
                $pegawai = OperatorMesin::where('ID_OPERATOR_MESIN',$id);

                $pegawai->update([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_OPERATOR_MESIN' => ucwords($request->NAMA),
                    'ALAMAT_OPERATOR_MESIN' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_OPERATOR_MESIN' => $request->JENIS_KELAMIN,
                    'NO_TELP_OPERATOR_MESIN' => $request->NO_TELP,
                    'EMAIL_OPERATOR_MESIN' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            }

            elseif($request->KODE_JABATAN == 3){

                //insert manajer marketing
                $id = Auth::user()->manajer_marketing(Auth::user()->ID_USER)->ID_MANAJER_MARKETING;
                $pegawai = ManajerMarketing::where('ID_MANAJER_MARKETING',$id);

                $pegawai->update([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_MANAJER_MARKETING' => ucwords($request->NAMA),
                    'ALAMAT_MANAJER_MARKETING' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_MANAJER_MARKETING' => $request->JENIS_KELAMIN,
                    'NO_TELP_MANAJER_MARKETING' => $request->NO_TELP,
                    'EMAIL_MANAJER_MARKETING' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            }
            elseif($request->KODE_JABATAN == 2){

                //insert admin gudang
                $id = Auth::user()->admin_gudang(Auth::user()->ID_USER)->ID_ADMIN_GUDANG;
                $pegawai = AdminGudang::where('ID_ADMIN_GUDANG',$id);

                $pegawai->update([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_ADMIN_GUDANG' => ucwords($request->NAMA),
                    'ALAMAT_ADMIN_GUDANG' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_ADMIN_GUDANG' => $request->JENIS_KELAMIN,
                    'NO_TELP_ADMIN_GUDANG' => $request->NO_TELP,
                    'EMAIL_ADMIN_GUDANG' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            }
            
            $id_user = Auth::user()->ID_USER;
            $user = User::where('ID_USER',$id_user);

            $user->update([
                'KODE_JABATAN' => $request->KODE_JABATAN,
                'username' => strtolower($request->USERNAME_USER),
                'FOTO_PROFILE' => $foto,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        });

        return redirect('home');
    }
}
