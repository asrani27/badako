<?php

namespace App\Http\Controllers;

use Svg\Tag\Rect;
use App\Models\Kadis;
use App\Models\Pensiun;
use App\Models\Pasangan;
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
        //tanda tangan digital

        // $folderPath = public_path('storage/ttd/');

        // $image_parts = explode(";base64,", $req->signed);

        // $image_type_aux = explode("image/", $image_parts[0]);

        // $image_type = $image_type_aux[1];

        // $image_base64 = base64_decode($image_parts[1]);

        // $filename = $folderPath . uniqid() . '.' . $image_type;

        // file_put_contents($filename, $image_base64);
        //----------------//

        $kadis = Kadis::where('is_aktif', 1)->first();
        $sek = Sekretaris::where('is_aktif', 1)->first();

        $param = $req->all();
        $param['kadis'] = $kadis->nip;
        $param['sekretaris'] = $sek->nip;
        // $param['ttd'] = $filename;

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
    public function isipasangan($id)
    {
        $data = Pasangan::where('pensiun_id', $id)->first();
        return view('pegawai.pensiun.isi_pasangan', compact('id', 'data'));
    }
    public function store_pasangan(Request $req, $id)
    {
        $check = Pasangan::where('pensiun_id', $id)->first();
        if ($check == null) {
            $n = new Pasangan;
            $n->nama = $req->nama;
            $n->tempat_lahir = $req->tempat_lahir;
            $n->tanggal_lahir = $req->tanggal_lahir;
            $n->tanggal_kawin = $req->tanggal_kawin;
            $n->keterangan = $req->keterangan;
            $n->pensiun_id = $id;
            $n->save();
            Session::flash('success', 'berhasil disimpan');
            return back();
        } else {
            $u = $check;
            $u->nama = $req->nama;
            $u->tempat_lahir = $req->tempat_lahir;
            $u->tanggal_lahir = $req->tanggal_lahir;
            $u->tanggal_kawin = $req->tanggal_kawin;
            $u->keterangan = $req->keterangan;
            $u->pensiun_id = $id;
            $u->save();
            Session::flash('success', 'berhasil diupdate');
            return back();
        }
        return view('pegawai.pensiun.isi_pasangan', compact('id'));
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
