<?php

namespace App\Http\Controllers;

use App\Models\KenaikanPangkat;
use App\Models\Pensiun;
use Illuminate\Http\Request;
use App\Models\PengangkatanCPNS;
use Illuminate\Support\Facades\Session;

class UsulanController extends Controller
{
    public function usulan1()
    {
        $data = PengangkatanCPNS::where('verifikasi_atasan_isi', 'setuju')->where('verifikasi_unitkerja_isi', 'setuju')->paginate(10);
        return view('superadmin.usulan1.index', compact('data'));
    }
    public function usulan2()
    {
        return view('superadmin.usulan2.index');
    }
    public function usulan3()
    {
        return view('superadmin.usulan3.index');
    }

    //----------------------------------------------------
    public function usulan4()
    {
        $data = Pensiun::where('verifikasi_atasan', 'disetujui')->paginate(15);
        return view('superadmin.usulan4.index', compact('data'));
    }

    public function  verifikasi_dinkes($id)
    {
        Pensiun::find($id)->update([
            'verifikasi_umpeg' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }

    public function pensiun_ditolak($id)
    {
        Pensiun::find($id)->update([
            'verifikasi_umpeg' => 'ditolak'
        ]);
        Session::flash('info', 'ditolak');
        return back();
    }

    //----------------------------------------------------


    //----------------------------------------------------
    public function pangkat()
    {
        $data = KenaikanPangkat::where('verifikasi_atasan', 'disetujui')->paginate(15);
        return view('superadmin.usulan_pangkat.index', compact('data'));
    }

    public function  pangkat_diterima($id)
    {
        KenaikanPangkat::find($id)->update([
            'verifikasi_umpeg' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }

    public function pangkat_ditolak($id)
    {
        KenaikanPangkat::find($id)->update([
            'verifikasi_umpeg' => 'ditolak'
        ]);
        Session::flash('info', 'ditolak');
        return back();
    }

    //----------------------------------------------------


    public function usulan5()
    {
        return view('superadmin.usulan5.index');
    }
    public function usulan6()
    {
        return view('superadmin.usulan6.index');
    }
    public function usulan7()
    {
        return view('superadmin.usulan7.index');
    }
    public function usulan8()
    {
        return view('superadmin.usulan8.index');
    }
    public function usulan9()
    {
        return view('superadmin.usulan9.index');
    }
    public function usulan10()
    {
        return view('superadmin.usulan10.index');
    }
    public function usulan11()
    {
        return view('superadmin.usulan11.index');
    }
    public function usulan12()
    {
        return view('superadmin.usulan12.index');
    }
    public function usulan13()
    {
        return view('superadmin.usulan13.index');
    }
    public function usulan14()
    {
        return view('superadmin.usulan14.index');
    }
    public function usulan15()
    {
        return view('superadmin.usulan15.index');
    }
    public function usulan16()
    {
        return view('superadmin.usulan16.index');
    }
}
