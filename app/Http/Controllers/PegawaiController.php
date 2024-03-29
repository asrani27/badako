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
        if ($data->status_pegawai == 'PNS') {
            return view('pegawai.edit.pns.profile', compact('data', 'unitkerja', 'pangkat'));
        }
        if ($data->status_pegawai == 'PPPK') {
            return view('pegawai.edit.pppk.profile', compact('data', 'unitkerja', 'pangkat'));
        }
        if ($data->status_pegawai == 'NON ASN') {
            return view('pegawai.edit.nonasn.profile', compact('data', 'unitkerja', 'pangkat'));
        }
    }
    public function editKepegawaian()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.kepegawaian', compact('data'));
    }
    public function editCuti()
    {
        $data = Auth::user()->pegawai;
        return view('pegawai.edit.cuti', compact('data'));
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


        if (Auth::user()->pegawai->status_pegawai == 'NON ASD') {
            $data = Auth::user()->pegawai;
            $data->nama = $req->nama;
            $data->nip = $req->nip;
            $data->unitkerja_id = $req->unitkerja_id;
            $data->jabatan = $req->jabatan;
            $data->mkg = $req->mkg;
            $data->jkel = $req->jkel;
            $data->tempat_lahir = $req->tempat_lahir;
            $data->tanggal_lahir = $req->tanggal_lahir;
            $data->email = $req->email;
            $data->rekening = $req->rekening;
            $data->file_rekening = $name_rekening;
            $data->save();
        } else {
            $data = Auth::user()->pegawai;
            $data->nama = $req->nama;
            $data->nip = $req->nip;
            if (Auth::user()->pegawai->status_pegawai == 'PPPK') {
                $data->golongan = $req->golongan;
            } else {
                $data->pangkat_id = $req->pangkat_id;
            }
            if ($req->jenis_jabatan == 'JF') {
                $data->jenjang_jabatan = $req->jenjang_jabatan;
            } else {
                $data->jenjang_jabatan = null;
            }
            $data->jabatan = $req->jabatan;
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
        }


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
        $data->jenjang_pendidikan = $req->jenjang_pendidikan;
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

    public function updateCuti(Request $req)
    {
        $data = Auth::user()->pegawai;
        $data->sisacuti_2023 = $req->sisacuti_2023;
        $data->sisacuti_2024 = $req->sisacuti_2024;
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

    public function updateKepegawaianNONASN(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file_nonasn'  => 'mimes:pdf|max:2048',
            'file_str'  => 'mimes:pdf|max:2048',
            'file_sip'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus PDF dan Maks 2MB');
            return back();
        }
        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/kepegawaian';

        if ($req->file_nonasn == null) {
            $name_nonasn = Auth::user()->pegawai->file_nonasn;
        } else {
            $file_nonasn = $req->file('file_nonasn');
            $extension_nonasn = $req->file_nonasn->getClientOriginalExtension();
            $name_nonasn = 'nonasn' . uniqid() . '.' . $extension_nonasn;
            $file_nonasn->move($path, $name_nonasn);
        }
        if ($req->file_str == null) {
            $name_str = Auth::user()->pegawai->file_str;
        } else {
            $file_str = $req->file('file_str');
            $extension_str = $req->file_str->getClientOriginalExtension();
            $name_str = 'str' . uniqid() . '.' . $extension_str;
            $file_str->move($path, $name_str);
        }

        if ($req->file_sip == null) {
            $name_sip = Auth::user()->pegawai->file_sip;
        } else {
            $file_sip = $req->file('file_sip');
            $extension_sip = $req->file_sip->getClientOriginalExtension();
            $name_sip = 'sip' . uniqid() . '.' . $extension_sip;
            $file_sip->move($path, $name_sip);
        }

        $data = Auth::user()->pegawai;
        $data->nomor_nonasn = $req->nomor_nonasn;
        $data->tanggal_nonasn = $req->tanggal_nonasn;
        $data->file_nonasn = $name_nonasn;

        $data->nomor_str = $req->nomor_str;
        $data->tanggal_str = $req->tanggal_str;
        $data->file_str = $name_str;

        $data->nomor_sip = $req->nomor_sip;
        $data->tanggal_sip = $req->tanggal_sip;
        $data->file_sip = $name_sip;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
    public function updateKepegawaianPPPK(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file_pengangkatan'  => 'mimes:pdf|max:2048',
            'file_spmt'  => 'mimes:pdf|max:2048',
            'file_spk'  => 'mimes:pdf|max:2048',
            'file_str'  => 'mimes:pdf|max:2048',
            'file_sip'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/kepegawaian';

        if ($req->file_pengangkatan == null) {
            $name_pengangkatan = Auth::user()->pegawai->file_pengangkatan;
        } else {
            $file_pengangkatan = $req->file('file_pengangkatan');
            $extension_pengangkatan = $req->file_pengangkatan->getClientOriginalExtension();
            $name_pengangkatan = 'pengangkatan' . uniqid() . '.' . $extension_pengangkatan;
            $file_pengangkatan->move($path, $name_pengangkatan);
        }

        if ($req->file_spmt == null) {
            $name_spmt = Auth::user()->pegawai->file_spmt;
        } else {
            $file_spmt = $req->file('file_spmt');
            $extension_spmt = $req->file_spmt->getClientOriginalExtension();
            $name_spmt = 'spmt' . uniqid() . '.' . $extension_spmt;
            $file_spmt->move($path, $name_spmt);
        }

        if ($req->file_spk == null) {
            $name_spk = Auth::user()->pegawai->file_spk;
        } else {
            $file_spk = $req->file('file_spk');
            $extension_spk = $req->file_spk->getClientOriginalExtension();
            $name_spk = 'spk' . uniqid() . '.' . $extension_spk;
            $file_spk->move($path, $name_spk);
        }

        if ($req->file_str == null) {
            $name_str = Auth::user()->pegawai->file_str;
        } else {
            $file_str = $req->file('file_str');
            $extension_str = $req->file_str->getClientOriginalExtension();
            $name_str = 'str' . uniqid() . '.' . $extension_str;
            $file_str->move($path, $name_str);
        }

        if ($req->file_sip == null) {
            $name_sip = Auth::user()->pegawai->file_sip;
        } else {
            $file_sip = $req->file('file_sip');
            $extension_sip = $req->file_sip->getClientOriginalExtension();
            $name_sip = 'sip' . uniqid() . '.' . $extension_sip;
            $file_sip->move($path, $name_sip);
        }

        $data = Auth::user()->pegawai;
        $data->nomor_pengangkatan = $req->nomor_pengangkatan;
        $data->tanggal_pengangkatan = $req->tanggal_pengangkatan;
        $data->file_pengangkatan = $name_pengangkatan;

        $data->nomor_spmt = $req->nomor_spmt;
        $data->tanggal_spmt = $req->tanggal_spmt;
        $data->file_spmt = $name_spmt;

        $data->nomor_spk = $req->nomor_spk;
        $data->tanggal_spk = $req->tanggal_spk;
        $data->file_spk = $name_spk;

        $data->nomor_str = $req->nomor_str;
        $data->tanggal_str = $req->tanggal_str;
        $data->file_str = $name_str;

        $data->nomor_sip = $req->nomor_sip;
        $data->tanggal_sip = $req->tanggal_sip;
        $data->file_sip = $name_sip;
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
            'file_berkala'  => 'mimes:pdf|max:2048',
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

        if ($req->file_berkala == null) {
            $name_berkala = Auth::user()->pegawai->file_berkala;
        } else {
            $file_berkala = $req->file('file_berkala');
            $extension_berkala = $req->file_berkala->getClientOriginalExtension();
            $name_berkala = 'berkala' . uniqid() . '.' . $extension_berkala;
            $file_berkala->move($path, $name_berkala);
        }

        if ($req->file_karpeg == null) {
            $name_karpeg = Auth::user()->pegawai->file_karpeg;
        } else {
            $file_karpeg = $req->file('file_karpeg');
            $extension_karpeg = $req->file_karpeg->getClientOriginalExtension();
            $name_karpeg = 'karpeg' . uniqid() . '.' . $extension_karpeg;
            $file_karpeg->move($path, $name_karpeg);
        }

        if ($req->file_str == null) {
            $name_str = Auth::user()->pegawai->file_str;
        } else {
            $file_str = $req->file('file_str');
            $extension_str = $req->file_str->getClientOriginalExtension();
            $name_str = 'str' . uniqid() . '.' . $extension_str;
            $file_str->move($path, $name_str);
        }
        if ($req->file_sip == null) {
            $name_sip = Auth::user()->pegawai->file_sip;
        } else {
            $file_sip = $req->file('file_sip');
            $extension_sip = $req->file_sip->getClientOriginalExtension();
            $name_sip = 'sip' . uniqid() . '.' . $extension_sip;
            $file_sip->move($path, $name_sip);
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

        $data->nomor_berkala = $req->nomor_berkala;
        $data->tanggal_berkala = $req->tanggal_berkala;
        $data->file_berkala = $name_berkala;

        $data->nomor_str = $req->nomor_str;
        $data->tanggal_str = $req->tanggal_str;
        $data->file_str = $name_str;

        $data->nomor_sip = $req->nomor_sip;
        $data->tanggal_sip = $req->tanggal_sip;
        $data->file_sip = $name_sip;

        $data->nomor_kariskarsu = $req->nomor_kariskarsu;
        $data->file_kariskarsu = $name_kariskarsu;

        $data->nomor_karpeg = $req->nomor_karpeg;
        $data->file_karpeg = $name_karpeg;

        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
}
