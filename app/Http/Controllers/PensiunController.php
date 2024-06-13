<?php

namespace App\Http\Controllers;

use App\Models\Kadis;
use App\Models\Pensiun;
use App\Models\M_pegawai;
use App\Models\UnitKerja;
use App\Models\Sekretaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PensiunController extends Controller
{
    public function index()
    {
        $data = Pensiun::where('nip', Auth::user()->username)->get();
        return view('pegawai.pensiun.index', compact('data'));
    }

    public function create()
    {

        $check = Pensiun::where('nip', Auth::user()->username)->first();
        if ($check == null) {
            $pegawai = M_pegawai::get();
            $data  = Auth::user()->pegawai;
            $kadis = Kadis::where('is_aktif', 1)->first();
            $sek = Sekretaris::where('is_aktif', 1)->first();
            return view('pegawai.pensiun.create', compact('data', 'pegawai', 'kadis', 'sek'));
        } else {
            Session::flash('info', 'anda telah mengajukan pensiun');
            return back();
        }
    }

    public function delete($id)
    {
        $data = Pensiun::find($id)->delete();

        Session::flash('success', 'berhasil di hapus');
        return back();
    }

    public function store(Request $req)
    {
        $kadis = Kadis::where('is_aktif', 1)->first();
        $sek = Sekretaris::where('is_aktif', 1)->first();

        $param = $req->all();
        $param['kadis'] = $kadis->nip;
        $param['sekretaris'] = $sek->nip;

        Pensiun::create($param);

        Session::flash('success', 'berhasil disimpan');
        return redirect('/pegawai/pensiun');
    }

    public function verifikasi()
    {
        $data = Pensiun::where('atasan_langsung', Auth::user()->pegawai->nip)->where('verifikasi_unitkerja', 'disetujui')->paginate(15);
        return view('pegawai.pensiun.verifikasi', compact('data'));
    }
    public function verifikasi_sekretaris()
    {
        $data = Pensiun::where('verifikasi_umpeg', 'disetujui')->paginate(15);
        return view('pegawai.pensiun.verifikasisekretaris', compact('data'));
    }
    public function verifikasiSekretaris($id)
    {
        Pensiun::find($id)->update([
            'verifikasi_sekretaris' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }

    public function verifikasi_kadis()
    {
        $data = Pensiun::where('verifikasi_umpeg', 'disetujui')->paginate(15);
        return view('pegawai.pensiun.verifikasikadis', compact('data'));
    }
    public function verifikasiKadis($id)
    {
        Pensiun::find($id)->update([
            'verifikasi_kadis' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
    public function verifikasi_atasan($id)
    {
        Pensiun::find($id)->update([
            'verifikasi_atasan' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
    public function surat1($id)
    {
        $url = env('APP_URL') . '/check/verifikasi/digital/pengangkatancpns/' . $id;
        $qrcode = base64_encode(QrCode::format('svg')->size(600)->errorCorrection('H')->generate($url));
        $customPaper = array(0, 0, 610, 860);
        $kadis = Kadis::where('is_aktif', 1)->first();
        $data = PengangkatanCPNS::find($id);

        $pdf = PDF::loadView('pegawai.pengangkatan.surat1', compact('data', 'qrcode', 'kadis'))->setPaper($customPaper);
        return $pdf->stream(Auth::user()->pegawai->nama . '_surat_pengantar.pdf');
        //return $pdf->download(Auth::user()->pegawai->nama . '_surat_pengantar.pdf');
    }
}
