<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->KODE_JABATAN == 1) {
            return redirect()->route('owner');
        } 
        else if (Auth::user()->KODE_JABATAN == 2) {
            return redirect()->route('admin-gudang');
        }
        else if(Auth::user()->KODE_JABATAN == 3){
            return redirect()->route('manajer-marketing');
        }
        else if (Auth::user()->KODE_JABATAN == 4) {
            return redirect()->route('sales-a');
        }
        else if (Auth::user()->KODE_JABATAN == 5) {
            return redirect()->route('sales-b');
        }
        else if (Auth::user()->KODE_JABATAN == 6) {
            return redirect()->route('operator-mesin');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }

    public function changepass(Request $req){

        $id = Auth::user()->id_pegawai;

        $pegawai = Pegawai::find($id);
        $pegawai->password = bcrypt($req->password);
        $pegawai->save();

        return redirect('/');
    }

    public function username()
    {
        return 'username';
    }
}
