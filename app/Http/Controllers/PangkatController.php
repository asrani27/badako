<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kadis;
use App\Models\M_pegawai;
use App\Models\Sekretaris;
use Illuminate\Http\Request;
use App\Models\KenaikanPangkat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;

class PangkatController extends Controller
{
    public function index()
    {
        $data = KenaikanPangkat::where('nip', Auth::user()->username)->get();
        return view('pegawai.pangkat.index', compact('data'));
    }

    public function create()
    {
        $check = KenaikanPangkat::where('nip', Auth::user()->username)->first();
        if ($check == null) {
            $pegawai = M_pegawai::get();
            $data  = Auth::user()->pegawai;

            $kadis = Kadis::where('is_aktif', 1)->first();
            $sek = Sekretaris::where('is_aktif', 1)->first();
            return view('pegawai.pangkat.create', compact('data', 'pegawai', 'kadis', 'sek'));
        } else {
            Session::flash('info', 'anda telah mengajukan pangkat');
            return back();
        }
    }

    public function delete($id)
    {
        $data = KenaikanPangkat::find($id)->delete();

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

        KenaikanPangkat::create($param);

        Session::flash('success', 'berhasil disimpan');
        return redirect('/pegawai/pangkat');
    }

    public function word_pengantar($id)
    {
        $data = KenaikanPangkat::find($id);

        $word = new TemplateProcessor(public_path() . '/word/pangkat_pengantar.docx');
        $word->setValues([
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),

            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
        ]);

        $file = 'surat_pengantar_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }

    public function word_mutasi($id)
    {
        $data = KenaikanPangkat::find($id);

        $word = new TemplateProcessor(public_path() . '/word/pangkat_mutasi.docx');
        $word->setValues([
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),

            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
        ]);

        $file = 'surat_mutasi_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }

    public function word_hukuman($id)
    {
        $data = KenaikanPangkat::find($id);

        $word = new TemplateProcessor(public_path() . '/word/pangkat_hukuman.docx');
        $word->setValues([
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),

            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
        ]);

        $file = 'surat_tidak_kena_hukuman_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }

    public function verifikasi()
    {
        if (Auth::user()->pegawai->unitkerja->kode == '170029' || Auth::user()->pegawai->unitkerja->kode == '170030' || Auth::user()->pegawai->unitkerja->kode == '170032') {
            $data = KenaikanPangkat::where('atasan_langsung', Auth::user()->pegawai->nip)->paginate(15);
        } else {
            $data = KenaikanPangkat::where('atasan_langsung', Auth::user()->pegawai->nip)->where('verifikasi_unitkerja', 'disetujui')->paginate(15);
        }
        return view('pegawai.pangkat.verifikasi', compact('data'));
    }
    public function verifikasi_sekretaris()
    {
        $data = KenaikanPangkat::where('verifikasi_umpeg', 'disetujui')->paginate(15);
        return view('pegawai.pangkat.verifikasisekretaris', compact('data'));
    }
    public function verifikasiSekretaris($id)
    {
        KenaikanPangkat::find($id)->update([
            'verifikasi_sekretaris' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }

    public function verifikasi_kadis()
    {
        $data = KenaikanPangkat::where('verifikasi_umpeg', 'disetujui')->paginate(15);
        return view('pegawai.pangkat.verifikasikadis', compact('data'));
    }
    public function verifikasiKadis($id)
    {
        KenaikanPangkat::find($id)->update([
            'verifikasi_kadis' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
    public function verifikasi_atasan($id)
    {
        KenaikanPangkat::find($id)->update([
            'verifikasi_atasan' => 'disetujui'
        ]);
        Session::flash('success', 'berhasil');
        return back();
    }
}
