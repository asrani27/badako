<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\M_pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function beranda()
    {
        $pns = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->count();
        $pkkk = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pkkk')->count();
        $nonasn = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'non asn')->count();

        $tigatahun = Carbon::now()->subyear(3)->format('Y');
        $duatahun = Carbon::now()->subyear(2)->format('Y');

        $naikpangkat = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_pangkat', $tigatahun)->get();
        $naikberkala = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_berkala', $duatahun)->get();

        $pensiun = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->get()->map(function ($item) {
            if ($item->tanggal_lahir == null) {
                $item->age = 0;
            } else {
                $now = Carbon::now(); // Tanggal sekarang
                $b_day = Carbon::parse();
                $item->age = $b_day->diffInYears($now);
            }

            if ($item->jenis_jabatan == 'JPT' && $item->age == 60) {
                $item->pensiun = 'Y';
            } elseif ($item->jenis_jabatan == 'JFT' || $item->jenjang_jabatan == 'AHLI MADYA' || $item->age == 58) {
                $item->pensiun = 'Y';
            } else {
                $item->pensiun = 'T';
            }
            return $item;
        })->where('pensiun', 'Y');



        return view('admin.home', compact('pns', 'pkkk', 'nonasn', 'naikpangkat', 'naikberkala', 'pensiun'));
    }

    public function profil()
    {
        $data = Auth::user()->unitkerja;
        return view('admin.profil', compact('data'));
    }
    public function updateProfil(Request $req)
    {
        $data = Auth::user()->unitkerja->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'telp' => $req->telp,
            'jumlah_penduduk' => $req->jumlah_penduduk,
            'jumlah_kelurahan' => $req->jumlah_kelurahan,
            'jumlah_rt' => $req->jumlah_rt,
            'jumlah_kk' => $req->jumlah_kk,
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
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

    public function addPegawai()
    {
        return view('admin.pegawai.create');
    }
    public function storePegawai(Request $req)
    {

        $check = M_pegawai::where('nip', $req->nip)->first();
        if ($check == null) {
            $param = $req->all();
            $param['unitkerja_id'] = Auth::user()->unitkerja_id;
            M_pegawai::create($param);
            Session::flash('success', 'berhasil disimpan');
            return redirect('/admin/data/pegawai');
        } else {
            $check->update([
                'unitkerja_id' => Auth::user()->unitkerja_id,
            ]);
            Session::flash('success', 'berhasil disimpan');
            return redirect('/admin/data/pegawai');
        }
    }
    public function editPegawai($id)
    {
        $data = M_pegawai::find($id);
        return view('admin.pegawai.edit', compact('data'));
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
        M_pegawai::find($id)->update(['unitkerja_id' => null]);
        Session::flash('success', 'Berhasil Di hapus ');
        return back();
    }
    public function profilPegawai($id)
    {
        $data = M_pegawai::find($id);
        return view('admin.pegawai.profile', compact('data'));
    }
    public function akunPegawai()
    {
        $data = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->get();
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
