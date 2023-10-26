<?php

namespace App\Http\Controllers;

use Image;
use Storage;
use App\Models\Nomor;
use App\Models\Pangkat;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function beranda()
    {
        $data = Auth::user()->pegawai;
        $aduan = Nomor::first();
        return view('pegawai.home', compact('data', 'aduan'));
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
        $validator = Validator::make($req->all(), [
            'file_rekening'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus scan PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/rekening';

        if ($req->file_rekening == null) {
            $name_rekening = Auth::user()->pegawai->file_rekening;
        } else {
            $file_rekening = $req->file('file_rekening');
            $extension_npwp = $req->file_rekening->getClientOriginalExtension();
            $name_rekening = 'rekening' . uniqid() . '.' . $extension_npwp;
            $file_rekening->move($path, $name_rekening);
        }

        $data = Auth::user()->pegawai;
        $data->nama = $req->nama;
        $data->nip = $req->nip;
        if (Auth::user()->pegawai->status_pegawai == 'PPPK') {
            $data->golongan = $req->golongan;
        } else {
            $data->pangkat_id = $req->pangkat_id;
        }
        $data->jabatan = $req->jabatan;
        $data->jenjang_jabatan = $req->jenjang_jabatan;
        $data->kelas_jabatan = $req->kelas_jabatan;
        $data->jenis_jabatan = $req->jenis_jabatan;
        $data->mkg = $req->mkg;
        $data->unitkerja_id = $req->unitkerja_id;
        $data->jkel = $req->jkel;
        $data->tempat_lahir = $req->tempat_lahir;
        $data->tanggal_lahir = $req->tanggal_lahir;
        $data->email = $req->email;
        $data->rekening = $req->rekening;
        $data->file_rekening = $name_rekening;
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
        //dd($req->all());
        $data = Auth::user()->pegawai;
        $data->sesuai_ktp = $req->sesuai_ktp;
        $data->provinsi = $req->provinsi;
        $data->kota = $req->kota;
        $data->kecamatan = $req->kecamatan;
        $data->kelurahan = $req->kelurahan;
        $data->alamat = $req->alamat;
        $data->rt = $req->rt;
        $data->rw = $req->rw;
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


    public function updateKepegawaian(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file_cpns'  => 'mimes:pdf|max:2048',
            'file_spmt'  => 'mimes:pdf|max:2048',
            'file_pns'  => 'mimes:pdf|max:2048',
            'file_pangkat'  => 'mimes:pdf|max:2048',
            'file_jafung'  => 'mimes:pdf|max:2048',
            'file_kariskarsu'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/kepegawaian';

        if ($req->file_cpns == null) {
            $name_cpns = Auth::user()->pegawai->file_cpns;
        } else {
            $file_cpns = $req->file('file_cpns');
            $extension_cpns = $req->file_cpns->getClientOriginalExtension();
            $name_cpns = 'cpns' . uniqid() . '.' . $extension_cpns;
            $file_cpns->move($path, $name_cpns);
        }

        if ($req->file_spmt == null) {
            $name_spmt = Auth::user()->pegawai->file_spmt;
        } else {
            $file_spmt = $req->file('file_spmt');
            $extension_spmt = $req->file_spmt->getClientOriginalExtension();
            $name_spmt = 'spmt' . uniqid() . '.' . $extension_spmt;
            $file_spmt->move($path, $name_spmt);
        }

        if ($req->file_pns == null) {
            $name_pns = Auth::user()->pegawai->file_pns;
        } else {
            $file_pns = $req->file('file_pns');
            $extension_pns = $req->file_pns->getClientOriginalExtension();
            $name_pns = 'pns' . uniqid() . '.' . $extension_pns;
            $file_pns->move($path, $name_pns);
        }

        if ($req->file_pangkat == null) {
            $name_pangkat = Auth::user()->pegawai->file_pangkat;
        } else {
            $file_pangkat = $req->file('file_pangkat');
            $extension_pangkat = $req->file_pangkat->getClientOriginalExtension();
            $name_pangkat = 'pangkat' . uniqid() . '.' . $extension_pangkat;
            $file_pangkat->move($path, $name_pangkat);
        }

        if ($req->file_jafung == null) {
            $name_jafung = Auth::user()->pegawai->file_jafung;
        } else {
            $file_jafung = $req->file('file_jafung');
            $extension_jafung = $req->file_jafung->getClientOriginalExtension();
            $name_jafung = 'jafung' . uniqid() . '.' . $extension_jafung;
            $file_jafung->move($path, $name_jafung);
        }

        if ($req->file_kariskarsu == null) {
            $name_kariskarsu = Auth::user()->pegawai->file_kariskarsu;
        } else {
            $file_kariskarsu = $req->file('file_kariskarsu');
            $extension_kariskarsu = $req->file_kariskarsu->getClientOriginalExtension();
            $name_kariskarsu = 'kariskarsu' . uniqid() . '.' . $extension_kariskarsu;
            $file_kariskarsu->move($path, $name_kariskarsu);
        }

        $data = Auth::user()->pegawai;
        $data->nomor_cpns = $req->nomor_cpns;
        $data->tanggal_cpns = $req->tanggal_cpns;
        $data->file_cpns = $name_cpns;

        $data->nomor_spmt = $req->nomor_spmt;
        $data->tanggal_spmt = $req->tanggal_spmt;
        $data->file_spmt = $name_spmt;

        $data->nomor_pns = $req->nomor_pns;
        $data->tanggal_pns = $req->tanggal_pns;
        $data->file_pns = $name_pns;

        $data->nomor_pangkat = $req->nomor_pangkat;
        $data->tanggal_pangkat = $req->tanggal_pangkat;
        $data->file_pangkat = $name_pangkat;

        $data->nomor_jafung = $req->nomor_jafung;
        $data->tanggal_jafung = $req->tanggal_jafung;
        $data->file_jafung = $name_jafung;

        $data->nomor_kariskarsu = $req->nomor_kariskarsu;
        $data->file_kariskarsu = $name_kariskarsu;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
}
