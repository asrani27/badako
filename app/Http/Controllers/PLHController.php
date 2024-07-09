<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PLH;
use App\Models\Kadis;
use App\Models\M_pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;

class PLHController extends Controller
{
    public function index()
    {
        $data = PLH::orderBy('id', 'DESC')->paginate(10);
        return view('superadmin.plh.index', compact('data'));
    }
    public function search()
    {
        $keyword = request()->get('search');
        $data = PLH::where('nama', 'LIKE', '%' . $keyword . '%')->orWhere('nip', 'LIKE', '%' . $keyword . '%')->paginate(10);
        request()->flash();
        return view('superadmin.plh.index', compact('data'));
    }
    public function create()
    {
        $pegawai = M_pegawai::get();
        $unitkerja = UnitKerja::get();
        $kadis = Kadis::where('is_aktif', 1)->first();
        return view('superadmin.plh.create', compact('pegawai', 'unitkerja', 'kadis'));
    }
    public function store(Request $req)
    {
        $pegawai = M_pegawai::find($req->pegawai_id);

        $param = $req->all();
        $param['nip']  = $pegawai->nip;
        $param['nama'] = $pegawai->nama;
        $param['jabatan']   = $pegawai->jabatan;
        $param['unitkerja'] = $pegawai->unitkerja == null ? null : $pegawai->unitkerja->nama;


        PLH::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/plh');
    }
    public function edit($id)
    {
        $kadis = Kadis::where('is_aktif', 1)->first();
        $data = PLH::find($id);
        $pegawai = M_pegawai::get();
        $unitkerja = UnitKerja::get();
        return view('superadmin.plh.edit', compact('pegawai', 'data', 'unitkerja', 'kadis'));
    }
    public function update(Request $req, $id)
    {
        $pegawai = M_pegawai::find($req->pegawai_id);

        $param = $req->all();
        $param['nip']  = $pegawai->nip;
        $param['nama'] = $pegawai->nama;
        $param['jabatan']   = $pegawai->jabatan;
        $param['unitkerja'] = $pegawai->unitkerja == null ? null : $pegawai->unitkerja->nama;
        //dd($param);
        PLH::find($id)->update($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/superadmin/plh');
    }
    public function delete($id)
    {
        $data = plh::find($id)->delete();
        Session::flash('success', 'berhasil di hapus');
        return back();
    }
    public function word($id)
    {
        $data = PLH::find($id);

        $word = new TemplateProcessor(public_path() . '/word/plh.docx');
        $word->setValues([
            'nomor' => $data->nomor,
            'dari' => $data->dari,
            'darinomor' => $data->darinomor,
            'daritanggal' => Carbon::parse($data->daritanggal)->translatedFormat('d F Y'),
            'nip' => $data->nip,
            'nama' => $data->nama,
            'jabatan' => $data->jabatan,
            'unitkerja' => $data->unitkerja,
            'sebagai' => $data->sebagai,
            'pada' => $data->pada,
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),
            'mulai' => Carbon::parse($data->sampai)->translatedFormat('d F Y'),
            'sampai' => Carbon::parse($data->sampai)->translatedFormat('d F Y'),
            'ditetapkan' => Carbon::parse($data->ditetapkan)->translatedFormat('d F Y'),

            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
        ]);

        $file = 'plh_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }
}
