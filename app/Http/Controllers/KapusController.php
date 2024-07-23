<?php

namespace App\Http\Controllers;

use App\Models\Kapus;
use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KapusController extends Controller
{

    public function index()
    {
        $data = Kapus::where('user_id', Auth::user()->id)->paginate(10);
        return view('admin.kapus.index', compact('data'));
    }
    public function create()
    {
        $pegawai = M_pegawai::get();
        return view('admin.kapus.create', compact('pegawai'));
    }
    public function edit($id)
    {
        $data = Kapus::find($id);
        return view('admin.kapus.edit', compact('data'));
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
        return view('admin.kapus.create', compact('pegawai'));
    }
    public function store(Request $req)
    {
        $pegawai = M_pegawai::find($req->pegawai_id);

        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        Kapus::create($param);

        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/kapus');
    }

    public function update(Request $req, $id)
    {

        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        Kapus::find($id)->update($param);

        Session::flash('success', 'berhasil di update');
        return redirect('/admin/kapus');
    }
    public function delete($id)
    {
        $data = Kapus::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
}
