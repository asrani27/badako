<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\Kadis;
use Carbon\CarbonPeriod;
use App\Models\JenisCuti;
use App\Models\M_pegawai;
use App\Models\Sekretaris;
use Illuminate\Http\Request;
use App\Models\LiburNasional;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CutiController extends Controller
{
    public function index()
    {
        $data = Cuti::where('nip', Auth::user()->pegawai->nip)->get();
        return view('pegawai.cuti.index', compact('data'));
    }

    public function buktidukung($id)
    {
        $data = Cuti::find($id);
        return view('pegawai.cuti.upload', compact('data'));
    }


    public function upload(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'file'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus scan PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/bukti_dukung';

        $file = $req->file('file');
        $extension = $req->file->getClientOriginalExtension();
        $filename = str_replace(' ', '_', $req->nama) . uniqid() . '.' . $extension;
        $file->move($path, $filename);

        $new = Cuti::find($id)->update([
            'bukti' => $filename,
        ]);

        Session::flash('success', 'Berhasil disimpan');
        return redirect('/pegawai/cuti');
    }
    public function atasanSetujui($id)
    {
        $data = Cuti::find($id);
        return view('pegawai.cuti.ttd', compact('data'));
    }
    public function verifikasi_kadis()
    {
        $data = Cuti::where('kepala_dinas', Auth::user()->pegawai->nip)->where('verifikasi_atasan', 'disetujui')->where('umpeg', 'disetujui')->where('verifikasi_sekretaris', 'disetujui')->orderBy('verifikasi_kadis', 'ASC')->paginate(20);
        return view('pegawai.cuti.kadis', compact('data'));
    }
    public function verifikasi_sekretaris()
    {
        $data = Cuti::where('sekretaris', Auth::user()->pegawai->nip)->where('verifikasi_atasan', 'disetujui')->where('umpeg', 'disetujui')->orderBy('verifikasi_sekretaris', 'ASC')->paginate(20);
        return view('pegawai.cuti.verifikasi', compact('data'));
    }
    public function verifikasi()
    {
        $kadis = Kadis::first()->nip;
        $sekretaris = Sekretaris::first()->nip;

        $data = Cuti::where('atasan_langsung', Auth::user()->pegawai->nip)->orderBy('verifikasi_atasan', 'ASC')->paginate(15);
        return view('pegawai.cuti.verifikasi', compact('data'));
    }

    public function verifAtasanLangsungSetuju(Request $req, $id)
    {
        //tanda tangan digital
        $folderPath = public_path('storage/ttd/');

        $image_parts = explode(";base64,", $req->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $filename = $folderPath . uniqid() . '.' . $image_type;

        file_put_contents($filename, $image_base64);
        //----------------//

        $cuti = Cuti::find($id)->update([
            'verifikasi_atasan' => 'disetujui',
            'ttd_atasan' => $filename,
        ]);
        Session::flash('success', 'berhasil');
        return redirect('/pegawai/cuti/verifikasi');
    }

    public function verifikasiSekretaris($id)
    {
        Cuti::find($id)->update([
            'verifikasi_sekretaris' => 'disetujui',
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
    public function create()
    {

        $jenis = JenisCuti::get();
        $pegawai = M_pegawai::get();
        if (auth::user()->pegawai->unitkerja == null) {
            Session::flash('warning', 'tidak memiliki unitkerja, harap isi unitkerja terlebih dahulu');
            return back();
        } else {
            return view('pegawai.cuti.create', compact('jenis', 'pegawai'));
        }
    }
    public function delete($id)
    {
        $cuti = Cuti::find($id)->delete();
        Session::flash('success', 'berhasil di ajukan');
        return back();
    }
    public function setujui($id)
    {
        $cuti = Cuti::find($id)->update([
            'verifikasi_atasan' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
    public function tolak($id)
    {
        $cuti = Cuti::find($id)->update([
            'verifikasi_atasan' => 'ditolak'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
    public function kadisSetujui($id)
    {
        $cuti = Cuti::find($id)->update([
            'verifikasi_kadis' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
    public function kadisTolak($id)
    {
        $cuti = Cuti::find($id)->update([
            'verifikasi_kadis' => 'ditolak'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
    public function store(Request $req)
    {
        //tanda tangan digital

        $folderPath = public_path('storage/ttd/');

        $image_parts = explode(";base64,", $req->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $filename = $folderPath . uniqid() . '.' . $image_type;

        file_put_contents($filename, $image_base64);
        //----------------//

        $mulai   = Carbon::parse($req->mulai);
        $sampai  = Carbon::parse($req->sampai);

        $dateAll = CarbonPeriod::create($mulai, $sampai);

        $dates = [];

        foreach ($dateAll as $item) {
            $dates[] = $item->format('Y-m-d');
        }

        $liburNasional = LiburNasional::get();
        $diff = collect($dates)->diff($liburNasional->pluck('tanggal'));

        $collection = collect($diff)->map(function ($value, $key) {
            $value = Carbon::parse($value)->format('l');
            return $value;
        });

        $pegawai = dataPegawai($req->nip);
        if (Auth::user()->pegawai->unitkerja->kode == '170029' || Auth::user()->pegawai->unitkerja->kode == '170030' || Auth::user()->pegawai->unitkerja->kode == '170032') {
            $lama = count($collection->diff(['Sunday', 'Saturday']));
        } else {
            $lama = count($collection->diff(['Sunday']));
        }
        $kadis = Kadis::where('is_aktif', 1)->first()->nip;
        $sekretaris = Sekretaris::where('is_aktif', 1)->first()->nip;
        $cuti = new Cuti;
        $cuti->nip = $req->nip;
        $cuti->nama = $pegawai->nama;
        $cuti->kode_unitkerja = $req->kode_unitkerja;
        $cuti->unit_kerja = $pegawai->unitkerja == null ? null : $pegawai->unitkerja->nama;
        $cuti->jabatan = $pegawai->jabatan;
        $cuti->mulai = $mulai;
        $cuti->sampai = $sampai;
        $cuti->jenis_cuti_id = $req->jenis_id;
        $cuti->alasan = $req->alasan;
        $cuti->alamat = $req->alamat;
        $cuti->telp = $req->telp;
        if ($req->jenis_id == 1) {
            $cuti->lama = $lama;
        } else {
            $cuti->lama = count($dates);
        }
        $cuti->atasan_langsung = $req->atasan_langsung;
        $cuti->kepala_dinas = $kadis;
        $cuti->sekretaris = $sekretaris;
        $cuti->ttd = $filename;
        $cuti->save();
        Session::flash('success', 'berhasil di ajukan');
        return redirect('/pegawai/cuti');
    }

    public function pdf($id)
    {
        $url = env('APP_URL') . '/check/verifikasi/digital/cuti/' . $id;

        $qrcode = base64_encode(QrCode::format('svg')->size(600)->errorCorrection('H')->generate($url));

        $customPaper = array(0, 0, 610, 1160);

        $checkKadis = Cuti::find($id);

        $kadis = Kadis::where('nip', $checkKadis->kepala_dinas)->first();

        $sisaCuti = 12 - Cuti::where('nip', Auth::user()->pegawai->nip)->where('jenis_cuti_id', 1)->sum('lama');
        $cutiN1 = M_pegawai::where('nip', Auth::user()->pegawai->nip)->first() == null ? null :  M_pegawai::where('nip', Auth::user()->pegawai->nip)->first()->sisacuti_2023;
        $cuti = Cuti::find($id);
        $pdf = PDF::loadView('pegawai.cuti.pdf', compact('cuti', 'qrcode', 'kadis', 'sisaCuti', 'cutiN1'))->setPaper($customPaper);
        return $pdf->download(Auth::user()->pegawai->nama . '_cuti.pdf');
    }
}
