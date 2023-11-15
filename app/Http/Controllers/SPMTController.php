<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SPMT;
use App\Models\Kadis;
use App\Models\M_pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;

class SPMTController extends Controller
{
    public function index()
    {
        $data = SPMT::orderBy('id')->paginate(10);
        return view('superadmin.spmt.index', compact('data'));
    }
    public function search()
    {
        $keyword = request()->get('search');
        $data = SPMT::where('nama', 'LIKE', '%' . $keyword . '%')->orWhere('nip', 'LIKE', '%' . $keyword . '%')->paginate(10);
        request()->flash();
        return view('superadmin.spmt.index', compact('data'));
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
        return view('superadmin.spmt.create', compact('pegawai', 'unitkerja', 'kadis'));
    }
    public function store(Request $req)
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

        SPMT::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/spmt');
    }
    public function edit($id)
    {
        $data = SPMT::find($id);
        $pegawai = M_pegawai::get();
        $unitkerja = UnitKerja::get();
        return view('superadmin.spmt.edit', compact('pegawai', 'data', 'unitkerja'));
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

        SPMT::find($id)->update($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/spmt');
    }
    public function delete($id)
    {
        $data = SPMT::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
    public function word($id)
    {
        $data = SPMT::find($id);
        $pangkat = M_pegawai::where('nip', $data->nip)->first();

        $word = new TemplateProcessor(public_path() . '/word/spmt.docx');
        $word->setValues([
            'nomor' => $data->nomor,
            'nip1' => $data->nip1,
            'nama1' => $data->nama1,
            'pangkat1' => $data->pangkat1,
            'jabatan1' => $data->jabatan1,

            'nip2' => $data->nip2,
            'nama2' => $data->nama2,
            'pangkat2' => $data->pangkat2,
            'jabatan2' => $data->jabatan2,

            'pejabat' => $data->pejabat,
            'nomormutasi' => $data->nomormutasi,
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),
            'tmt' => Carbon::parse($data->tmt)->translatedFormat('d F Y'),

            'sejak' => Carbon::parse($data->sejak)->translatedFormat('d F Y'),
            'pada' => $data->pada,
            'sebagai' => $data->sebagai,
            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
            'ditetapkan' => Carbon::parse($data->ditetapkan)->translatedFormat('d F Y'),
        ]);

        $file = 'spmt_' . $data->nip2 . '_' . $data->nama2 . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }
}
