<?php

namespace App\Http\Controllers;

use App\Models\Piket;
use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PiketController extends Controller
{
    public function index()
    {
        $data = Piket::where('unitkerja_id', Auth::user()->unitkerja->id)->orderBy('id', 'DESC')->paginate(15);
        return view('admin.piket.index', compact('data'));
    }
    public function create()
    {
        $pegawai = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja->id)->get();
        return view('admin.piket.create', compact('pegawai'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        $param['nama'] = M_pegawai::where('nip', $req->nip)->first()->nama;
        $param['unitkerja_id'] = Auth::user()->unitkerja->id;
        Piket::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/admin/piket');
    }
    public function edit($id)
    {
        $data = Piket::find($id);
        $pegawai = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja->id)->get();
        return view('admin.piket.edit', compact('data', 'pegawai'));
    }
    public function update(Request $req, $id)
    {
        $param = $req->all();
        $param['nama'] = M_pegawai::where('nip', $req->nip)->first()->nama;
        $param['unitkerja_id'] = Auth::user()->unitkerja->id;
        Piket::find($id)->update($param);
        Session::flash('success', 'Berhasil diupdate');
        return redirect('/admin/piket');
    }
    public function delete($id)
    {
        $data = Piket::find($id)->delete();
        Session::flash('success', 'Berhasil dihapus');
        return back();
    }
}
