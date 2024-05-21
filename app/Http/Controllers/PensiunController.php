<?php

namespace App\Http\Controllers;

use App\Models\Pensiun;
use Illuminate\Http\Request;

class PensiunController extends Controller
{
    public function index()
    {
        $data = Pensiun::get();
        return view('pegawai.pensiun.index', comapct('data'));
    }
    public function pegawai()
    {
        if (Auth::user()->pegawai->status_pegawai == null) {
            Session::flash('info', 'harap isi status pegawai terlebih dahulu');
            return back();
        } else {
            $data = PengangkatanCPNS::where('nip', Auth::user()->username)->get();
            return view('pegawai.pengangkatan.index', compact('data'));
        }
    }

    public function addPengangkatan()
    {
        $data = Auth::user()->pegawai;
        if ($data->status_pegawai == 'PNS') {
            Session::flash('info', 'Hanya untuk CPNS');
            return back();
        } else {
            $pegawai = M_pegawai::where('unitkerja_id', $data->unitkerja_id)->get();
            return view('pegawai.pengangkatan.create', compact('data', 'pegawai'));
        }
    }
    public function deletePengangkatan($id)
    {
        PengangkatanCPNS::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
    public function storePengangkatan(Request $req)
    {
        $param = $req->all();
        $param['verifikasi_unitkerja'] = UnitKerja::find($req->unitkerja_id)->kode;
        $param['verifikasi_kadis'] = Kadis::where('is_aktif', 1)->first()->nip;
        $param['verifikasi_sekretaris'] = Sekretaris::where('is_aktif', 1)->first()->nip;
        $param['verifikasi_atasan'] = $req->atasan_langsung;
        $param['verifikasi_dinkes'] = 'DINKES';
        $param['unit_kerja_id'] = $req->unitkerja_id;
        $param['pangkat_id'] = $req->pangkat_id;

        PengangkatanCPNS::create($param);

        Session::flash('success', 'berhasil disimpan');
        return redirect('/pegawai/pengangkatan');
    }

    //--------------------------------------------------------//
    public function admin()
    {
        $data = PengangkatanCPNS::where('verifikasi_unitkerja', Auth::user()->unitkerja->kode)->paginate(10);
        return view('admin.pengangkatan.index', compact('data'));
    }
    public function verifikasi_admin($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_unitkerja_isi' => 'setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    //-----------------------------------------------------//
    public function verifikasiCpns()
    {
        $data = PengangkatanCPNS::where('verifikasi_atasan', Auth::user()->username)->where('verifikasi_unitkerja_isi', 'setuju')->paginate(10);

        // $datasekretaris = PengangkatanCPNS::where('verifikasi_atasan_isi', 'setuju')->where('verifikasi_unitkerja_isi', 'setuju')->where('verifikasi_dinkes_isi', 'setuju')->paginate(10);
        return view('pegawai.pengangkatan.verifikasi', compact('data'));
    }
    public function verifikasiSekretaris()
    {
        $data = PengangkatanCPNS::where('verifikasi_atasan_isi', 'setuju')->where('verifikasi_unitkerja_isi', 'setuju')->where('verifikasi_dinkes_isi', 'setuju')->paginate(10);
        return view('pegawai.pengangkatan.verifikasisekretaris', compact('data'));
    }
    public function verifikasiKadis()
    {
        $data = PengangkatanCPNS::where('verifikasi_atasan_isi', 'setuju')->where('verifikasi_unitkerja_isi', 'setuju')->where('verifikasi_dinkes_isi', 'setuju')->where('verifikasi_sekretaris_isi', 'setuju')->paginate(10);
        return view('pegawai.pengangkatan.verifikasikadis', compact('data'));
    }
    public function atasanSetuju($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_atasan_isi' => 'setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function atasanMenolak($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_atasan_isi' => 'tidak setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }

    public function sekretarisSetuju($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_sekretaris_isi' => 'setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function sekretarisMenolak($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_sekretaris_isi' => 'tidak setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function kadisSetuju($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_kadis_isi' => 'setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function kadisMenolak($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_kadis_isi' => 'tidak setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function dinkesSetuju($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_dinkes_isi' => 'setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function dinkesMenolak($id)
    {
        PengangkatanCPNS::find($id)->update([
            'verifikasi_dinkes_isi' => 'tidak setuju'
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function dinkesDelete($id)
    {
        PengangkatanCPNS::find($id)->delete();
        Session::flash('success', 'berhasil dihapus');
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
