<?php

namespace App\Http\Controllers;

use App\Models\M_pegawai;
use App\Models\Sekretaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SekretarisController extends Controller
{
    public function index()
    {
        $data = Sekretaris::paginate(40);
        return view('superadmin.sekretaris.index', compact('data'));
    }
    public function create()
    {
        $pegawai = M_pegawai::get();
        return view('superadmin.sekretaris.create', compact('pegawai'));
    }
    public function edit($id)
    {
        $data = Sekretaris::find($id);
        return view('superadmin.sekretaris.edit', compact('data'));
    }
    public function aktifkan($id)
    {
        $sekretaris = Sekretaris::where('is_aktif', 1)->first();
        if ($sekretaris == null) {
            Sekretaris::find($id)->update([
                'is_aktif' => 1,
            ]);
            Session::flash('success', 'berhasil di simpan');
            return back();
        } else {
            $sekretaris->update([
                'is_aktif' => null
            ]);
            Sekretaris::find($id)->update([
                'is_aktif' => 1,
            ]);
            Session::flash('success', 'berhasil di simpan');
            return back();
        }
        return view('superadmin.sekretaris.create', compact('pegawai'));
    }
    public function store(Request $req)
    {
        $pegawai = M_pegawai::find($req->pegawai_id);

        Sekretaris::create($req->all());

        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/sekretaris');
    }


    public function update(Request $req, $id)
    {

        Sekretaris::find($id)->update($req->all());

        Session::flash('success', 'berhasil di update');
        return redirect('/superadmin/sekretaris');
    }

    public function delete($id)
    {
        $data = Sekretaris::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
}
