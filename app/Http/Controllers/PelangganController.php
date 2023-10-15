<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    public function home()
    {
        $data = Timeline::where('user_id', Auth::user()->id)->paginate(15);
        return view('pelanggan.home', compact('data'));
    }

    public function addPermohonan()
    {
        return view('pelanggan.permohonan.add');
    }

    public function storePermohonan(Request $req)
    {

        $n = new Timeline;
        $n->tanggal = $req->tanggal;
        $n->nama = $req->nama;
        $n->telp = $req->telp;
        $n->user_id = Auth::user()->id;
        $n->save();
        Session::flash('success', 'Berhasil Di simpan');
        return redirect('/pelanggan/home');
    }

    public function deletePermohonan($id)
    {
        Timeline::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return redirect('/pelanggan/home');
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('pelanggan.timeline', compact('data'));
    }
}
