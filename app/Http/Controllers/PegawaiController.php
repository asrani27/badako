<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Image;
use Storage;

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
            'file'  => 'mimes:jpg,png,jpeg|max:1024',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File Harus Gambar, Maksimal 1MB');
            return back();
        }

        if ($req->file == null) {
            $filename = Auth::user()->pegawai->foto;
        } else {
            $extension = $req->file->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $image = $req->file('file');
            $realPath = public_path('storage') . '/foto';
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
        return view('pegawai.edit.profile', compact('data', 'unitkerja'));
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
        $data = Auth::user()->pegawai;
        $data->no_bpjs = $req->no_bpjs;
        $data->kelas_bpjs = $req->kelas_bpjs;
        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
    public function updateNPWP(Request $req)
    {
        $data = Auth::user()->pegawai;
        $data->no_npwp = $req->no_npwp;
        $data->save();
        Session::flash('success', 'Berhasil Di update');
        return redirect('/pegawai/beranda');
    }
    public function updatePendidikan(Request $req)
    {
        $data = Auth::user()->pegawai;
        $data->jenjang = $req->jenjang;
        $data->gelar = $req->gelar;
        $data->prodi = $req->prodi;
        $data->tempat_pendidikan = $req->tempat_pendidikan;
        $data->tahun_lulus = $req->tahun_lulus;
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

        // $validator = Validator::make($req->all(), [
        //     'file_ktp'  => 'mimes:jpg,jpeg|max:10240',
        // ]);

        // if ($validator->fails()) {
        //     $req->flash();
        //     Session::flash('File harus JPG/JPEG dan Maks 10MB');
        //     return back();
        // }

        // if ($req->file_ktp == null) {
        //     $filename_ktp = null;
        // } else {
        //     $extension = $req->file_ktp->getClientOriginalExtension();
        //     $filename_ktp = uniqid() . '.' . $extension;

        //     $image = $req->file('file_kk');

        //     $realPath = public_path('storage') . '/asn_' . Auth::user()->pegawai->nip . '/real';
        //     $compressPath = public_path('storage');

        //     $img = Image::make($image->path());
        //     $img->resize(1000, 1000, function ($const) {
        //         $const->aspectRatio();
        //     })->save($compressPath . '/' . $filename_ktp);

        //     Storage::disk('public')->move($filename_ktp, '/asn_' . Auth::user()->pegawai->nip . '/compress/' . $filename_ktp);
        //     $image->move($realPath, $filename_ktp);
        // }

        $data = Auth::user()->pegawai;
        $data->nik = $req->nik;
        $data->agama = $req->agama;
        $data->kewarganegaraan = $req->kewarganegaraan;

        $data->save();

        Session::flash('success', 'Berhasil Di update');

        return redirect('/pegawai/beranda');
    }
}
