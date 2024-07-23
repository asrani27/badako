<?php

namespace App\Http\Controllers;

use App\Models\Kapus;
use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KapusController extends Controller
{

    public function index()
    {
        $data = Kapus::paginate(40);
        return view('superadmin.kapus.index', compact('data'));
    }
    public function create()
    {
        $pegawai = M_pegawai::get();
        return view('superadmin.kapus.create', compact('pegawai'));
    }
    public function edit($id)
    {
        $data = Kapus::find($id);
        return view('superadmin.kapus.edit', compact('data'));
    }
    public function aktifkan($id)
    {
        $kapus = Kapus::where('is_aktif', 1)->first();
        if ($kapus == null) {
            Kapus::find($id)->update([
                'is_aktif' => 1,
            ]);
            Session::flash('success', 'berhasil di simpan');
            return back();
        } else {
            $kapus->update([
                'is_aktif' => null
            ]);
            Kapus::find($id)->update([
                'is_aktif' => 1,
            ]);
            Session::flash('success', 'berhasil di simpan');
            return back();
        }
        return view('superadmin.kapus.create', compact('pegawai'));
    }
    public function store(Request $req)
    {
        $pegawai = M_pegawai::find($req->pegawai_id);

        Kapus::create($req->all());

        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/kapus');
    }

    public function update(Request $req, $id)
    {

        Kapus::find($id)->update($req->all());

        Session::flash('success', 'berhasil di update');
        return redirect('/superadmin/kapus');
    }
    public function delete($id)
    {
        $data = Kapus::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
}
