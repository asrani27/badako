<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiburNasional;
use Illuminate\Support\Facades\Session;

class LiburNasionalController extends Controller
{
    public function index()
    {
        $data = LiburNasional::orderBy('id', 'desc')->paginate(10);

        return view('superadmin.liburnasional.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.liburnasional.create');
    }
    public function store(Request $req)
    {
        $checkTanggal = LiburNasional::where('tanggal', $req->tanggal)->first();
        if ($checkTanggal == null) {
            LiburNasional::create($req->all());
            Session::flash('success', 'berhasil di simpan');
            return redirect('/superadmin/data/liburnasional');
        } else {
            Session::flash('info', 'tanggal sudah ada');
            return back();
        }
    }
    public function edit($id)
    {
        $data = LiburNasional::find($id);
        return view('superadmin.liburnasional.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        LiburNasional::find($id)->update($req->all());
        Session::flash('success', 'berhasil di update');
        return redirect('/superadmin/data/liburnasional');
    }
    public function delete($id)
    {
        LiburNasional::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
}
