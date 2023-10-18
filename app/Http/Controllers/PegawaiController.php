<?php

namespace App\Http\Controllers;

use Image;
use Storage;
use App\Models\Pangkat;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function beranda()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.home', compact('data'));
    }

    public function ubahfoto(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'foto'  => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File Harus Gambar, Maksimal 2MB');
            return back();
        }

        if ($req->foto == null) {
            $filename = Auth::user()->pegawai->foto;
        } else {
            $extension = $req->foto->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $image = $req->file('foto');
            $realPath = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/foto/real';
            $compressPath = public_path('storage');

            $img = Image::make($image->path());

            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save($compressPath . '/' . $filename);

            Storage::disk('public')->move($filename, '/' . Auth::user()->pegawai->nip . '/foto/compress/' . $filename);
            $image->move($realPath, $filename);
        }

        Auth::user()->pegawai->update(['foto' => $filename]);
        Session::flash('success', 'Berhasil Disimpan');
        return back();
    }
    public function edit()
    {
        $data = Auth::user()->pegawai;
        $active = 'profile';
        return view('pegawai.edit', compact('data', 'active'));
    }

    public function editProfile()
    {
        $data = Auth::user()->pegawai;
        $unitkerja = UnitKerja::get();
        $pangkat = Pangkat::get();
        return view('pegawai.edit.profile', compact('data', 'unitkerja', 'pangkat'));
    }
    public function editKepegawaian()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.kepegawaian', compact('data'));
    }
    public function editStatus()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.status', compact('data'));
    }
    public function editKependudukan()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.kependudukan', compact('data'));
    }

    public function editBPJS()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.bpjs', compact('data'));
    }

    public function editNPWP()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.npwp', compact('data'));
    }
    public function editAlamat()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.alamat', compact('data'));
    }
    public function editPendidikan()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.pendidikan', compact('data'));
    }
    public function updateProfile(Request $req)
    {
        $data = Auth::user()->pegawai;
        $data->nama = $req->nama;
        $data->nip = $req->nip;
        $data->pangkat_id = $req->pangkat_id;
        $data->jabatan = $req->jabatan;
        $data->kelas_jabatan = $req->kelas_jabatan;
        $data->jenis_jabatan = $req->jenis_jabatan;
        $data->mkg = $req->mkg;
        $data->unitkerja_id = $req->unitkerja_id;
        $data->jkel = $req->jkel;
        $data->tempat_lahir = $req->tempat_lahir;
        $data->tanggal_lahir = $req->tanggal_lahir;
        $data->email = $req->email;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
    public function updateStatus(Request $req)
    {
        $data = Auth::user()->pegawai;
        $data->status_pegawai = $req->status_pegawai;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
    public function updateBPJS(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file_bpjs'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/bpjs';

        if ($req->file_bpjs == null) {
            $name_bpjs = Auth::user()->pegawai->file_bpjs;
        } else {
            $file_bpjs = $req->file('file_bpjs');
            $extension_bpjs = $req->file_bpjs->getClientOriginalExtension();
            $name_bpjs = 'bpjs' . uniqid() . '.' . $extension_bpjs;
            $file_bpjs->move($path, $name_bpjs);
        }

        $data = Auth::user()->pegawai;
        $data->no_bpjs = $req->no_bpjs;
        $data->kelas_bpjs = $req->kelas_bpjs;
        $data->file_bpjs = $name_bpjs;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
    public function updateNPWP(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file_npwp'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/npwp';

        if ($req->file_npwp == null) {
            $name_npwp = Auth::user()->pegawai->file_npwp;
        } else {
            $file_npwp = $req->file('file_npwp');
            $extension_npwp = $req->file_npwp->getClientOriginalExtension();
            $name_npwp = 'npwp' . uniqid() . '.' . $extension_npwp;
            $file_npwp->move($path, $name_npwp);
        }

        $data = Auth::user()->pegawai;
        $data->no_npwp = $req->no_npwp;
        $data->file_npwp = $name_npwp;
        $data->save();
        Session::flash('success', 'Berhasil Di update');
        return redirect('/pegawai/beranda');
    }
    public function updatePendidikan(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file_ijazah'  => 'mimes:pdf|max:2048',
            'file_transkrip'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/pendidikan';

        if ($req->file_ijazah == null) {
            $name_ijazah = Auth::user()->pegawai->file_ijazah;
        } else {
            $file_ijazah = $req->file('file_ijazah');
            $extension_ijazah = $req->file_ijazah->getClientOriginalExtension();
            $name_ijazah = 'ijazah' . uniqid() . '.' . $extension_ijazah;
            $file_ijazah->move($path, $name_ijazah);
        }

        if ($req->file_transkrip == null) {
            $name_transkrip = Auth::user()->pegawai->file_transkrip;
        } else {
            $file_transkrip = $req->file('file_transkrip');
            $extension_transkrip = $req->file_transkrip->getClientOriginalExtension();
            $name_transkrip = 'transkrip' . uniqid() . '.' . $extension_transkrip;
            $file_transkrip->move($path, $name_transkrip);
        }

        $data = Auth::user()->pegawai;
        $data->jenjang = $req->jenjang;
        $data->gelar = $req->gelar;
        $data->prodi = $req->prodi;
        $data->tempat_pendidikan = $req->tempat_pendidikan;
        $data->tahun_lulus = $req->tahun_lulus;
        $data->file_ijazah = $name_ijazah;
        $data->file_transkrip = $name_transkrip;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
    public function updateAlamat(Request $req)
    {
        $data = Auth::user()->pegawai;
        $data->alamat = $req->alamat;
        $data->rt = $req->rt;
        $data->rw = $req->rw;
        $data->kelurahan = $req->kelurahan;
        $data->kecamatan = $req->kecamatan;
        $data->kota = $req->kota;
        $data->provinsi = $req->provinsi;
        $data->kodepos = $req->kodepos;
        $data->telp = $req->telp;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
    public function updateKependudukan(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file_ktp'  => 'mimes:pdf|max:2048',
            'file_kk'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/kependudukan';

        if ($req->file_ktp == null) {
            $name_ktp = Auth::user()->pegawai->file_ktp;
        } else {
            $file_ktp = $req->file('file_ktp');
            $extension_ktp = $req->file_ktp->getClientOriginalExtension();
            $name_ktp = 'ktp' . uniqid() . '.' . $extension_ktp;
            $file_ktp->move($path, $name_ktp);
        }

        if ($req->file_kk == null) {
            $name_kk = Auth::user()->pegawai->file_kk;
        } else {
            $file_kk = $req->file('file_kk');
            $extension_kk = $req->file_kk->getClientOriginalExtension();
            $name_kk = 'kk' . uniqid() . '.' . $extension_kk;
            $file_kk->move($path, $name_kk);
        }

        $data = Auth::user()->pegawai;
        $data->nik = $req->nik;
        $data->agama = $req->agama;
        $data->kewarganegaraan = $req->kewarganegaraan;
        $data->file_ktp = $name_ktp;
        $data->file_kk = $name_kk;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
}
