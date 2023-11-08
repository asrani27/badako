<?php

namespace App\Http\Controllers;

use App\Models\Kadis;
use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KadisController extends Controller
{
    public function index()
    {
        $data = Kadis::paginate(40);
        return view('superadmin.kadis.index', compact('data'));
    }
    public function create()
    {
        $pegawai = M_pegawai::get();
        return view('superadmin.kadis.create', compact('pegawai'));
    }
    public function aktifkan($id)
    {
        $kadis = Kadis::where('is_aktif', 1)->first();
        if ($kadis == null) {
            Kadis::find($id)->update([
                'is_aktif' => 1,
            ]);
            Session::flash('success', 'berhasil di simpan');
            return back();
        } else {
            $kadis->update([
                'is_aktif' => null
            ]);
            Kadis::find($id)->update([
                'is_aktif' => 1,
            ]);
            Session::flash('success', 'berhasil di simpan');
            return back();
        }
        return view('superadmin.kadis.create', compact('pegawai'));
    }
    public function store(Request $req)
    {
        $pegawai = M_pegawai::find($req->pegawai_id);

        $param['nip']  = $pegawai->nip;
        $param['nama'] = $pegawai->nama;
        $param['pangkat'] = $pegawai->pangkat == null ? null : $pegawai->pangkat->nama . ', ' . $pegawai->pangkat->golongan;

        Kadis::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/kadis');
    }

    public function delete($id)
    {
        $data = Kadis::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
}
