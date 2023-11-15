<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kadis;
use App\Models\Berkala;
use App\Models\M_pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;

class BerkalaController extends Controller
{
    public function index()
    {
        $data = Berkala::orderBy('id')->paginate(10);
        return view('superadmin.berkala.index', compact('data'));
    }
    public function search()
    {
        $keyword = request()->get('search');
        $data = Berkala::where('nama', 'LIKE', '%' . $keyword . '%')->orWhere('nip', 'LIKE', '%' . $keyword . '%')->paginate(10);
        request()->flash();
        return view('superadmin.berkala.index', compact('data'));
    }
    public function create()
    {
        $kadis = Kadis::where('is_aktif', 1)->first();
        if ($kadis == null) {
            Session::flash('error', 'Kepala Dinas Belum Ada, harap isi di menu kepala dinas');
            return back();
        }
        $pegawai = M_pegawai::get();
        $unitkerja = UnitKerja::get();
        return view('superadmin.berkala.create', compact('pegawai', 'unitkerja', 'kadis'));
    }
    public function store(Request $req)
    {
        $pegawai = M_pegawai::find($req->pegawai_id);

        $param = $req->all();
        $param['nama']  = $pegawai->nama;
        $param['nip'] = $pegawai->nip;
        $param['pangkat'] = $pegawai->pangkat == null ? null : $pegawai->pangkat->nama . ', ' . $pegawai->pangkat->golongan;
        $param['jabatan'] = $pegawai->jabatan;
        $param['unitkerja']  = $pegawai->unitkerja == null ? null : $pegawai->unitkerja->nama;

        Berkala::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/berkala');
    }

    public function edit($id)
    {
        $data = Berkala::find($id);
        $pegawai = M_pegawai::get();
        $unitkerja = UnitKerja::get();
        return view('superadmin.berkala.edit', compact('pegawai', 'data', 'unitkerja'));
    }

    public function update(Request $req, $id)
    {
        $pegawai1 = M_pegawai::find($req->pegawai_id);
        $pegawai2 = M_pegawai::find($req->pegawai_id2);

        $param = $req->all();
        $param['nama1']  = $pegawai1->nama;
        $param['nip1'] = $pegawai1->nip;
        $param['pangkat1'] = $pegawai1->pangkat == null ? null : $pegawai1->pangkat->nama . ', ' . $pegawai1->pangkat->golongan;
        $param['jabatan1'] = $pegawai1->jabatan;

        $param['nama2']  = $pegawai2->nama;
        $param['nip2'] = $pegawai2->nip;
        $param['pangkat2'] = $pegawai2->pangkat == null ? null : $pegawai2->pangkat->nama . ', ' . $pegawai2->pangkat->golongan;
        $param['jabatan2'] = $pegawai2->jabatan;

        berkala::find($id)->update($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/berkala');
    }

    public function delete($id)
    {
        $data = Berkala::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
    public function word($id)
    {
        $data = Berkala::find($id);
        $pangkat = M_pegawai::where('nip', $data->nip)->first();

        $word = new TemplateProcessor(public_path() . '/word/berkala.docx');
        $word->setValues([
            'nomor' => $data->nomor,
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),
            'nama' => $data->nama,
            'nip' => $data->nip,
            'pangkat' => $data->pangkat,

            'jabatan' => $data->jabatan,
            'unitkerja' => $data->unitkerja,
            'gajilama' => $data->gajilama,
            'tanggallama' => Carbon::parse($data->tanggallama)->translatedFormat('d F Y'),

            'tanggalmulaiberlaku' => Carbon::parse($data->tanggalmulaiberlaku)->translatedFormat('d F Y'),
            'mkglama' => $data->mkglama,
            'gajibaru' => $data->gajibaru,
            'mkgbaru' => $data->mkgbaru,
            'golongan' => $data->golongan,
            'tanggalbaru' => Carbon::parse($data->tanggalbaru)->translatedFormat('d F Y'),
            'tanggalyad' => Carbon::parse($data->tanggalyad)->translatedFormat('d F Y'),

            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
        ]);

        $file = 'berkala_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }
}
