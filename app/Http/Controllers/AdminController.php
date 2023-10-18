<?php

namespace App\Http\Controllers;

use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function beranda()
    {
        $pns = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->count();
        $pkkk = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pkkk')->count();
        $nonasn = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'non asn')->count();
        return view('admin.home', compact('pns', 'pkkk', 'nonasn'));
    }

    public function pegawai()
    {

        $data = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->paginate(10);

        return view('admin.pegawai.index', compact('data'));
    }

    public function resetPassPegawai($id)
    {
        $password = M_pegawai::find($id)->nip;
        M_pegawai::find($id)->user->update(['password' => bcrypt($password)]);
        Session::flash('success', 'berhasil di reset, password : ' . $password);
        return redirect('/admin/data/pegawai');
    }
}
