<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Timeline;
use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SuperadminController extends Controller
{

    public function index()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('superadmin.home', compact('data'));
    }
    public function pegawai()
    {
        $data = M_pegawai::paginate(10);

        return view('superadmin.pegawai.index', compact('data'));
    }
    public function syncPegawai()
    {
        $response = Http::get('https://tpp.banjarmasinkota.go.id/api/pegawai/skpd/1.02.01.');
        $data = $response->getBody()->getContents();
        $data = json_decode($data)->data;
        foreach ($data as $key => $item) {
            $check = M_pegawai::where('nip', $item->nip)->first();
            if ($check == null) {
                $n = new M_pegawai;
                $n->nip = $item->nip;
                $n->nama = $item->nama;
                $n->save();
            }
        }

        Session::flash('success', 'berhasil di sinkron');
        return redirect('/superadmin/data/pegawai');
    }
    public function resetPassPegawai($id)
    {
        $pegawai = M_pegawai::find($id)->user->update(['password' => bcrypt('bjm123')]);
        Session::flash('success', 'berhasil di reset, password : bjm123');
        return redirect('/superadmin/data/pegawai');
    }
    public function addPegawai()
    {
        return view('superadmin.pegawai.create');
    }
    public function storePegawai(Request $req)
    {
        $check = M_pegawai::where('nip', $req->nip)->first();
        if ($check == null) {
            M_pegawai::create($req->all());
            Session::flash('success', 'berhasil disimpan');
            return redirect('/superadmin/data/pegawai');
        } else {
            Session::flash('error', 'NIP sudah ada');
            return back();
        }
    }
    public function editPegawai($id)
    {
        $data = M_pegawai::find($id);
        return view('superadmin.pegawai.edit', compact('data'));
    }
    public function updatePegawai(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
            'nip' => 'required|unique:m_pegawai,nip,' . $id,
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'NIP sudah ada');
            return back();
        }
        M_pegawai::find($id)->update([
            'nip' => $req->nip,
            'nama' => $req->nama
        ]);

        Session::flash('success', 'Berhasil Di update');
        return back();
    }
    public function deletePegawai($id)
    {
        M_pegawai::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }
    public function pelanggan()
    {
        $data = User::where('is_petugas', null)->where('username', '!=', 'superadmin')->paginate(10);

        return view('superadmin.pelanggan.index', compact('data'));
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('superadmin.pelanggan.timeline', compact('data'));
    }

    public function deletePermohonan($id)
    {
        Timeline::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return redirect('/superadmin/beranda');
    }

    public function profilPegawai($id)
    {
        $data = M_pegawai::find($id);
        return view('superadmin.pegawai.profile', compact('data'));
    }

    public function akunPegawai()
    {
        $data = M_pegawai::get();
        $role = Role::where('name', 'pegawai')->first();
        foreach ($data as $key => $item) {
            $check = User::where('username', $item->nip)->first();
            if ($check == null) {
                //create akun
                $n = new User;
                $n->name = $item->nama;
                $n->username = $item->nip;
                $n->password = bcrypt($item->nip);
                $n->pegawai_id = $item->id;
                $n->save();
                $n->roles()->attach($role);
            }
        }

        Session::flash('success', 'Akun Login berhasil dibuat, username : nip, password :nip');
        return back();
    }
}
