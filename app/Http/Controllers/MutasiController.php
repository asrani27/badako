<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mutasi;
use App\Models\M_pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;

class MutasiController extends Controller
{
    public function index()
    {
        $data = Mutasi::orderBy('id')->paginate(10);
        return view('superadmin.mutasi.index', compact('data'));
    }
    public function create()
    {
        $pegawai = M_pegawai::get();
        $unitkerja = UnitKerja::get();
        return view('superadmin.mutasi.create', compact('pegawai', 'unitkerja'));
    }
    public function store(Request $req)
    {

        $pegawai = M_pegawai::find($req->pegawai_id);

        $param = $req->all();
        $param['nip']  = $pegawai->nip;
        $param['nama'] = $pegawai->nama;

        Mutasi::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/mutasi');
    }
    public function edit($id)
    {
        $data = Mutasi::find($id);
        $pegawai = M_pegawai::get();
        $unitkerja = UnitKerja::get();
        return view('superadmin.mutasi.edit', compact('pegawai', 'data', 'unitkerja'));
    }
    public function update(Request $req, $id)
    {
        $pegawai = M_pegawai::find($req->pegawai_id);

        $param = $req->all();
        $param['nip']  = $pegawai->nip;
        $param['nama'] = $pegawai->nama;

        Mutasi::find($id)->update($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/mutasi');
    }
    public function delete($id)
    {
        $data = Mutasi::find($id)->delete();
        return back();
        Session::flash('success', 'berhasil di hapus');
    }
    public function word($id)
    {
        $data = Mutasi::find($id);
        $pangkat = M_pegawai::where('nip', $data->nip)->first();

        $word = new TemplateProcessor(public_path() . '/word/mutasi.docx');
        $word->setValues([
            'nomor' => $data->nomor,
            'nip' => $data->nip,
            'nama' => $data->nama,
            'pangkat' => $pangkat->pangkat == null ? null : $pangkat->pangkat->nama,
            'golongan' => $pangkat->pangkat == null ? null : $pangkat->pangkat->golongan,
            'jabatan_lama' => $data->jabatan_lama,
            'unitkerja_lama' => $data->unitkerja_lama,
            'jabatan_baru' => $data->jabatan_baru,
            'unitkerja_baru' => $data->unitkerja_baru,
            'ditetapkan' => Carbon::parse($data->ditetapkan)->translatedFormat('d F Y'),
        ]);

        $file = 'mutasi_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }
}
