<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\Role;
use App\Models\User;
use App\Models\Nomor;
use App\Models\Pangkat;
use App\Models\BelumIsi;
use App\Models\Timeline;
use App\Models\M_pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SuperadminController extends Controller
{

    public function cariPegawai()
    {
        $keyword = request()->get('search');
        $data = M_pegawai::where('nama', 'LIKE', '%' . $keyword . '%')->orWhere('nip', 'LIKE', '%' . $keyword . '%')->paginate(10);
        request()->flash();
        return view('superadmin.pegawai.index', compact('data'));
    }

    public function storebelum($i)
    {
        if (BelumIsi::where('nip', $i->nip)->first() == null) {
            $n = new BelumIsi;
            $n->nip = $i->nip;
            $n->nama = $i->nama;
            $n->unitkerja = $i->unitkerja == null ? null : $i->unitkerja->nama;
            $n->status_pegawai = 'PNS';
            $n->save();
        } else {
        }
    }

    public function storebelumnon($i)
    {
        if (BelumIsi::where('nip', $i->nip)->first() == null) {
            $n = new BelumIsi;
            $n->nip = $i->nip;
            $n->nama = $i->nama;
            $n->unitkerja = $i->unitkerja == null ? null : $i->unitkerja->nama;
            $n->status_pegawai = 'NON ASN';
            $n->save();
        } else {
        }
    }
    public function storebelumpppk($i)
    {
        if (BelumIsi::where('nip', $i->nip)->first() == null) {
            $n = new BelumIsi;
            $n->nip = $i->nip;
            $n->nama = $i->nama;
            $n->unitkerja = $i->unitkerja == null ? null : $i->unitkerja->nama;
            $n->status_pegawai = 'PPPK';
            $n->save();
        } else {
        }
    }

    public function asnbelumisi()
    {
        BelumIsi::where('status_pegawai', 'PNS')->get()->map->delete();
        $pns = M_pegawai::where('status_pegawai', 'PNS')->get();
        foreach ($pns as $i) {
            if ($i->jenis_jabatan == null) {
                $this->storebelum($i);
            } elseif ($i->jenis_jabatan == 'JF') {
                if ($i->nip == null) {
                    $this->storebelum($i);
                }
                if ($i->nama == null) {
                    $this->storebelum($i);
                }
                if ($i->jkel == null) {
                    $this->storebelum($i);
                }
                if ($i->tempat_lahir == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_lahir == null) {
                    $this->storebelum($i);
                }
                if ($i->email == null) {
                    $this->storebelum($i);
                }
                if ($i->pangkat_id == null) {
                    $this->storebelum($i);
                }
                if ($i->jabatan == null) {
                    $this->storebelum($i);
                }
                if ($i->jenis_jabatan == null) {
                    $this->storebelum($i);
                }
                if ($i->jenjang_jabatan == null) {
                    $this->storebelum($i);
                }
                if ($i->kelas_jabatan == null) {
                    $this->storebelum($i);
                }
                if ($i->mkg == null) {
                    $this->storebelum($i);
                }
                if ($i->rekening == null) {
                    $this->storebelum($i);
                }
                if ($i->file_rekening == null) {
                    $this->storebelum($i);
                }
                if ($i->nik == null) {
                    $this->storebelum($i);
                }
                if ($i->agama == null) {
                    $this->storebelum($i);
                }
                if ($i->kewarganegaraan == null) {
                    $this->storebelum($i);
                }
                if ($i->file_ktp == null) {
                    $this->storebelum($i);
                }
                if ($i->file_kk == null) {
                    $this->storebelum($i);
                }
                if ($i->no_bpjs == null) {
                    $this->storebelum($i);
                }
                if ($i->kelas_bpjs == null) {
                    $this->storebelum($i);
                }
                if ($i->file_bpjs == null) {
                    $this->storebelum($i);
                }
                if ($i->jenjang_pendidikan == null) {
                    $this->storebelum($i);
                }
                if ($i->gelar == null) {
                    $this->storebelum($i);
                }
                if ($i->prodi == null) {
                    $this->storebelum($i);
                }
                if ($i->tempat_pendidikan == null) {
                    $this->storebelum($i);
                }
                if ($i->tahun_lulus == null) {
                    $this->storebelum($i);
                }
                if ($i->file_ijazah == null) {
                    $this->storebelum($i);
                }
                if ($i->file_transkrip == null) {
                    $this->storebelum($i);
                }
                if ($i->provinsi == null) {
                    $this->storebelum($i);
                }
                if ($i->kota == null) {
                    $this->storebelum($i);
                }
                if ($i->kecamatan == null) {
                    $this->storebelum($i);
                }
                if ($i->kelurahan == null) {
                    $this->storebelum($i);
                }
                if ($i->rt == null) {
                    $this->storebelum($i);
                }
                if ($i->rw == null) {
                    $this->storebelum($i);
                }
                if ($i->alamat == null) {
                    $this->storebelum($i);
                }
                if ($i->kodepos == null) {
                    $this->storebelum($i);
                }
                if ($i->telp == null) {
                    $this->storebelum($i);
                }
                if ($i->no_npwp == null) {
                    $this->storebelum($i);
                }
                if ($i->file_npwp == null) {
                    $this->storebelum($i);
                }
                if ($i->nomor_cpns == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_cpns == null) {
                    $this->storebelum($i);
                }
                if ($i->file_cpns == null) {
                    $this->storebelum($i);
                }
                if ($i->nomor_jafung == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_jafung == null) {
                    $this->storebelum($i);
                }
                if ($i->file_jafung == null) {
                    $this->storebelum($i);
                }

                if ($i->nomor_spmt == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_spmt == null) {
                    $this->storebelum($i);
                }
                if ($i->file_spmt == null) {
                    $this->storebelum($i);
                }
                if ($i->nomor_pns == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_pns == null) {
                    $this->storebelum($i);
                }
                if ($i->file_pns == null) {
                    $this->storebelum($i);
                }
                if ($i->nomor_str == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_str == null) {
                    $this->storebelum($i);
                }
                if ($i->file_str == null) {
                    $this->storebelum($i);
                }
                if ($i->nomor_sip == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_sip == null) {
                    $this->storebelum($i);
                }
                if ($i->file_sip == null) {
                    $this->storebelum($i);
                }
            } else {
                if ($i->nip == null) {
                    $this->storebelum($i);
                }
                if ($i->nama == null) {
                    $this->storebelum($i);
                }
                if ($i->jkel == null) {
                    $this->storebelum($i);
                }
                if ($i->tempat_lahir == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_lahir == null) {
                    $this->storebelum($i);
                }
                if ($i->email == null) {
                    $this->storebelum($i);
                }
                if ($i->pangkat_id == null) {
                    $this->storebelum($i);
                }
                if ($i->jabatan == null) {
                    $this->storebelum($i);
                }
                if ($i->jenis_jabatan == null) {
                    $this->storebelum($i);
                }
                if ($i->jenjang_jabatan == null) {
                    $this->storebelum($i);
                }
                if ($i->kelas_jabatan == null) {
                    $this->storebelum($i);
                }
                if ($i->mkg == null) {
                    $this->storebelum($i);
                }
                if ($i->rekening == null) {
                    $this->storebelum($i);
                }
                if ($i->file_rekening == null) {
                    $this->storebelum($i);
                }
                if ($i->nik == null) {
                    $this->storebelum($i);
                }
                if ($i->agama == null) {
                    $this->storebelum($i);
                }
                if ($i->kewarganegaraan == null) {
                    $this->storebelum($i);
                }
                if ($i->file_ktp == null) {
                    $this->storebelum($i);
                }
                if ($i->file_kk == null) {
                    $this->storebelum($i);
                }
                if ($i->no_bpjs == null) {
                    $this->storebelum($i);
                }
                if ($i->kelas_bpjs == null) {
                    $this->storebelum($i);
                }
                if ($i->file_bpjs == null) {
                    $this->storebelum($i);
                }
                if ($i->jenjang_pendidikan == null) {
                    $this->storebelum($i);
                }
                if ($i->gelar == null) {
                    $this->storebelum($i);
                }
                if ($i->prodi == null) {
                    $this->storebelum($i);
                }
                if ($i->tempat_pendidikan == null) {
                    $this->storebelum($i);
                }
                if ($i->tahun_lulus == null) {
                    $this->storebelum($i);
                }
                if ($i->file_ijazah == null) {
                    $this->storebelum($i);
                }
                if ($i->file_transkrip == null) {
                    $this->storebelum($i);
                }
                if ($i->provinsi == null) {
                    $this->storebelum($i);
                }
                if ($i->kota == null) {
                    $this->storebelum($i);
                }
                if ($i->kecamatan == null) {
                    $this->storebelum($i);
                }
                if ($i->kelurahan == null) {
                    $this->storebelum($i);
                }
                if ($i->rt == null) {
                    $this->storebelum($i);
                }
                if ($i->rw == null) {
                    $this->storebelum($i);
                }
                if ($i->alamat == null) {
                    $this->storebelum($i);
                }
                if ($i->kodepos == null) {
                    $this->storebelum($i);
                }
                if ($i->telp == null) {
                    $this->storebelum($i);
                }
                if ($i->no_npwp == null) {
                    $this->storebelum($i);
                }
                if ($i->file_npwp == null) {
                    $this->storebelum($i);
                }
                if ($i->nomor_cpns == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_cpns == null) {
                    $this->storebelum($i);
                }
                if ($i->file_cpns == null) {
                    $this->storebelum($i);
                }

                if ($i->nomor_spmt == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_spmt == null) {
                    $this->storebelum($i);
                }
                if ($i->file_spmt == null) {
                    $this->storebelum($i);
                }
                if ($i->nomor_pns == null) {
                    $this->storebelum($i);
                }
                if ($i->tanggal_pns == null) {
                    $this->storebelum($i);
                }
                if ($i->file_pns == null) {
                    $this->storebelum($i);
                }
            }
        }
        Session::flash('success', 'berhasil di generate');
        return back();
    }
    public function pppkbelumisi()
    {
        BelumIsi::where('status_pegawai', 'PPPK')->get()->map->delete();
        $pns = M_pegawai::where('status_pegawai', 'PPPK')->get();
        foreach ($pns as $i) {
            if ($i->nip == null) {
                $this->storebelumpppk($i);
            }
            if ($i->nama == null) {
                $this->storebelumpppk($i);
            }
            if ($i->jkel == null) {
                $this->storebelumpppk($i);
            }
            if ($i->tempat_lahir == null) {
                $this->storebelumpppk($i);
            }
            if ($i->tanggal_lahir == null) {
                $this->storebelumpppk($i);
            }

            if ($i->email == null) {
                $this->storebelumpppk($i);
            }
            if ($i->jabatan == null) {
                $this->storebelumpppk($i);
            }
            if ($i->mkg == null) {
                $this->storebelumpppk($i);
            }
            if ($i->rekening == null) {
                $this->storebelumpppk($i);
            }
            if ($i->file_rekening == null) {
                $this->storebelumpppk($i);
            }
            if ($i->nik == null) {
                $this->storebelumpppk($i);
            }
            if ($i->agama == null) {
                $this->storebelumpppk($i);
            }
            if ($i->kewarganegaraan == null) {
                $this->storebelumpppk($i);
            }
            if ($i->file_ktp == null) {
                $this->storebelumpppk($i);
            }
            if ($i->file_kk == null) {
                $this->storebelumpppk($i);
            }
            if ($i->no_bpjs == null) {
                $this->storebelumpppk($i);
            }
            if ($i->kelas_bpjs == null) {
                $this->storebelumpppk($i);
            }
            if ($i->file_bpjs == null) {
                $this->storebelumpppk($i);
            }
            if ($i->jenjang_pendidikan == null) {
                $this->storebelumpppk($i);
            }
            if ($i->gelar == null) {
                $this->storebelumpppk($i);
            }
            if ($i->prodi == null) {
                $this->storebelumpppk($i);
            }
            if ($i->tempat_pendidikan == null) {
                $this->storebelumpppk($i);
            }
            if ($i->tahun_lulus == null) {
                $this->storebelumpppk($i);
            }
            if ($i->file_ijazah == null) {
                $this->storebelumpppk($i);
            }
            if ($i->file_transkrip == null) {
                $this->storebelumpppk($i);
            }
            if ($i->provinsi == null) {
                $this->storebelumpppk($i);
            }
            if ($i->kota == null) {
                $this->storebelumpppk($i);
            }
            if ($i->kecamatan == null) {
                $this->storebelumpppk($i);
            }
            if ($i->kelurahan == null) {
                $this->storebelumpppk($i);
            }
            if ($i->rt == null) {
                $this->storebelumpppk($i);
            }
            if ($i->rw == null) {
                $this->storebelumpppk($i);
            }
            if ($i->alamat == null) {
                $this->storebelumpppk($i);
            }
            if ($i->kodepos == null) {
                $this->storebelumpppk($i);
            }
            if ($i->telp == null) {
                $this->storebelumpppk($i);
            }
            if ($i->no_npwp == null) {
                $this->storebelumpppk($i);
            }
            if ($i->file_npwp == null) {
                $this->storebelumpppk($i);
            }
        }
        Session::flash('success', 'berhasil di generate');
        return back();
    }

    public function nonasnbelumisi()
    {
        BelumIsi::where('status_pegawai', 'NON ASN')->get()->map->delete();
        $pns = M_pegawai::where('status_pegawai', 'NON ASN')->get();
        foreach ($pns as $i) {

            if ($i->nip == null) {
                $this->storebelumnon($i);
            }
            if ($i->nama == null) {
                $this->storebelumnon($i);
            }
            if ($i->jkel == null) {
                $this->storebelumnon($i);
            }
            if ($i->tempat_lahir == null) {
                $this->storebelumnon($i);
            }
            if ($i->tanggal_lahir == null) {
                $this->storebelumnon($i);
            }
            if ($i->email == null) {
                $this->storebelumnon($i);
            }
            if ($i->jabatan == null) {
                $this->storebelumnon($i);
            }
            if ($i->mkg == null) {
                $this->storebelumnon($i);
            }
            if ($i->rekening == null) {
                $this->storebelumnon($i);
            }
            if ($i->file_rekening == null) {
                $this->storebelumnon($i);
            }

            if ($i->agama == null) {
                $this->storebelumnon($i);
            }
            if ($i->kewarganegaraan == null) {
                $this->storebelumnon($i);
            }
            if ($i->file_ktp == null) {
                $this->storebelumnon($i);
            }
            if ($i->file_kk == null) {
                $this->storebelumnon($i);
            }
            if ($i->no_bpjs == null) {
                $this->storebelumnon($i);
            }
            if ($i->kelas_bpjs == null) {
                $this->storebelumnon($i);
            }
            if ($i->file_bpjs == null) {
                $this->storebelumnon($i);
            }
            if ($i->jenjang_pendidikan == null) {
                $this->storebelumnon($i);
            }
            if ($i->gelar == null) {
                $this->storebelumnon($i);
            }
            if ($i->prodi == null) {
                $this->storebelumnon($i);
            }
            if ($i->tempat_pendidikan == null) {
                $this->storebelumnon($i);
            }
            if ($i->tahun_lulus == null) {
                $this->storebelumnon($i);
            }
            if ($i->file_ijazah == null) {
                $this->storebelumnon($i);
            }
            if ($i->file_transkrip == null) {
                $this->storebelumnon($i);
            }
            if ($i->provinsi == null) {
                $this->storebelumnon($i);
            }
            if ($i->kota == null) {
                $this->storebelumnon($i);
            }
            if ($i->kecamatan == null) {
                $this->storebelumnon($i);
            }
            if ($i->kelurahan == null) {
                $this->storebelumnon($i);
            }
            if ($i->rt == null) {
                $this->storebelumnon($i);
            }
            if ($i->rw == null) {
                $this->storebelumnon($i);
            }
            if ($i->alamat == null) {
                $this->storebelumnon($i);
            }
            if ($i->kodepos == null) {
                $this->storebelumnon($i);
            }
            if ($i->telp == null) {
                $this->storebelumnon($i);
            }
            if ($i->no_npwp == null) {
                $this->storebelumnon($i);
            }
            if ($i->file_npwp == null) {
                $this->storebelumnon($i);
            }

            if ($i->nomor_nonasn == null) {
                $this->storebelumnon($i);
            }
            if ($i->tanggal_nonasn == null) {
                $this->storebelumnon($i);
            }
            if ($i->file_nonasn == null) {
                $this->storebelumnon($i);
            }
        }
        Session::flash('success', 'berhasil di generate');
        return back();
    }

    public function detail($nip)
    {
        $data = M_pegawai::where('nip', $nip)->first();
        if ($data->status_pegawai == 'PNS') {
            return view('superadmin.detailpns', compact('data'));
        }
        if ($data->status_pegawai == 'PPPK') {
            return view('superadmin.detailpppk', compact('data'));
        }
        if ($data->status_pegawai == 'NON ASN') {
            return view('superadmin.detailnonasn', compact('data'));
        }
    }

    public function index()
    {
        $pns = M_pegawai::where('status_pegawai', 'pns')->count();
        $pkkk = M_pegawai::where('status_pegawai', 'pkkk')->count();
        $nonasn = M_pegawai::where('status_pegawai', 'non asn')->count();

        $tidakisi = M_pegawai::where('status_pegawai', null)->count();

        $pj_struktural = M_pegawai::where('jenis_jabatan', 'JPT')->count() + M_pegawai::where('status_pegawai', 'JA')->count();

        $jfu = M_pegawai::where('jenis_jabatan', 'JF')->count();

        $tigatahun = Carbon::now()->subyear(3)->format('Y');
        $duatahun = Carbon::now()->subyear(2)->format('Y');
        $limatahun = Carbon::now()->subyear(5)->format('Y');

        $naikpangkat = M_pegawai::where('status_pegawai', 'pns')->whereYear('tanggal_pangkat', $tigatahun)->paginate(10);
        $naikberkala = M_pegawai::where('status_pegawai', 'pns')->whereYear('tanggal_berkala', $duatahun)->paginate(10);
        $str = M_pegawai::where('status_pegawai', 'pns')->whereYear('tanggal_str', $limatahun)->paginate(10);
        $sip = M_pegawai::where('status_pegawai', 'pns')->whereYear('tanggal_sip', $limatahun)->paginate(10);

        $belumisi = M_pegawai::where('status_pegawai', null)->paginate(10);

        $pnsbelumisi = BelumIsi::where('status_pegawai', 'PNS')->paginate(10);
        $pppkbelumisi = BelumIsi::where('status_pegawai', 'PPPK')->paginate(10);
        $nonasnbelumisi = BelumIsi::where('status_pegawai', 'NON ASN')->paginate(10);

        $pensiun = M_pegawai::where('status_pegawai', 'pns')->get()->map(function ($item) {
            if ($item->tanggal_lahir == null) {
                $item->age = 0;
            } else {
                $now = Carbon::now(); // Tanggal sekarang
                $b_day = Carbon::parse($item->tanggal_lahir);
                $item->age = $b_day->diffInYears($now);
            }

            if ($item->jenis_jabatan == 'JPT' && $item->age == 60) {
                $item->pensiun = 'Y';
            } elseif ($item->jenis_jabatan == 'JFT' && $item->jenjang_jabatan == 'AHLI MADYA' && $item->age == 60) {
                $item->pensiun = 'Y';
            } elseif ($item->age == 58) {
                $item->pensiun = 'Y';
            } else {
                $item->pensiun = 'T';
            }
            return $item;
        })->where('pensiun', 'Y');

        $unitkerja = UnitKerja::get();

        $jumlahpegawai = M_pegawai::count();

        $sd = M_pegawai::where('jenjang_pendidikan', 'SD')->count();
        $smp = M_pegawai::where('jenjang_pendidikan', 'SMP')->count();
        $sma = M_pegawai::where('jenjang_pendidikan', 'SMA')->count();
        $d1 = M_pegawai::where('jenjang_pendidikan', 'DI')->count();
        $d2 = M_pegawai::where('jenjang_pendidikan', 'DII')->count();
        $d3 = M_pegawai::where('jenjang_pendidikan', 'DIII')->count();
        $d4 = M_pegawai::where('jenjang_pendidikan', 'DIV')->count();
        $s1 = M_pegawai::where('jenjang_pendidikan', 'SI')->count();
        $s2 = M_pegawai::where('jenjang_pendidikan', 'SII')->count();
        $s3 = M_pegawai::where('jenjang_pendidikan', 'SIII')->count();
        $grafik1 = [
            [
                'label' => 'SD',
                'x' => 0,
                'y' => $sd,
            ],
            [
                'label' => 'SMP',
                'x' => 0,
                'y' => $smp,
            ],
            [
                'label' => 'SMA',
                'x' => 0,
                'y' => $sma,
            ],
            [
                'label' => 'DI',
                'x' => 0,
                'y' => $d1,
            ],
            [
                'label' => 'DII',
                'x' => 0,
                'y' => $d2,
            ],
            [
                'label' => 'DIII',
                'x' => 0,
                'y' => $d3,
            ],
            [
                'label' => 'DIV',
                'x' => 0,
                'y' => $d4,
            ],
            [
                'label' => 'SI',
                'x' => 0,
                'y' => $s1,
            ],
            [
                'label' => 'SII',
                'x' => 0,
                'y' => $s2,
            ],
            [
                'label' => 'SIII',
                'x' => 0,
                'y' => $s3,
            ],
        ];

        $grafik2 = collect(Pangkat::get()->toArray())->map(function ($item) {
            $data['label'] = $item['golongan'];
            $data['x'] = 0;
            $data['y'] = M_pegawai::where('pangkat_id', $item['id'])->count();
            return $data;
        })->toArray();
        $grafik3 = [
            [
                'label' => 'VII',
                'x' => 0,
                'y' => M_pegawai::where('golongan', 'VII')->count(),
            ],
            [
                'label' => 'IX',
                'x' => 0,
                'y' => M_pegawai::where('golongan', 'IX')->count(),
            ],
            [
                'label' => 'X',
                'x' => 0,
                'y' => M_pegawai::where('golongan', 'X')->count(),
            ],
        ];
        $grafik4 = [
            [
                'label' => 'Laki-Laki',
                'x' => 0,
                'y' => M_pegawai::where('jkel', 'L')->count(),
            ],
            [
                'label' => 'Perempuan',
                'x' => 0,
                'y' => M_pegawai::where('jkel', 'P')->count(),
            ],
        ];
        $grafik5 = [
            [
                'label' => 'PNS',
                'x' => 0,
                'y' => M_pegawai::where('status_pegawai', 'PNS')->count(),
            ],
            [
                'label' => 'PPPK',
                'x' => 0,
                'y' => M_pegawai::where('status_pegawai', 'PPPK')->count(),
            ],
            [
                'label' => 'NON ASN',
                'x' => 0,
                'y' => M_pegawai::where('status_pegawai', 'NON ASN')->count(),
            ],
        ];
        $grafik6 = [
            [
                'label' => 'JPT',
                'x' => 0,
                'y' => M_pegawai::where('jenis_jabatan', 'JPT')->count(),
            ],
            [
                'label' => 'JA',
                'x' => 0,
                'y' => M_pegawai::where('status_pegawai', 'JA')->count(),
            ],
            [
                'label' => 'JF',
                'x' => 0,
                'y' => M_pegawai::where('status_pegawai', 'JF')->count(),
            ],
        ];

        return view('superadmin.home', compact(
            'grafik1',
            'grafik2',
            'grafik3',
            'grafik4',
            'grafik5',
            'grafik6',
            'pns',
            'jumlahpegawai',
            'pkkk',
            'nonasn',
            'tidakisi',
            'pj_struktural',
            'jfu',
            'naikpangkat',
            'naikberkala',
            'str',
            'sip',
            'belumisi',
            'pensiun',
            'unitkerja',
            'pnsbelumisi',
            'pppkbelumisi',
            'nonasnbelumisi'
        ));
    }
    public function filter()
    {
        $unitkerja_id = request()->get('unitkerja');

        if ($unitkerja_id == null) {

            $pnsbelumisi = BelumIsi::where('status_pegawai', 'PNS')->paginate(10);
            $pppkbelumisi = BelumIsi::where('status_pegawai', 'PPPK')->paginate(10);
            $nonasnbelumisi = BelumIsi::where('status_pegawai', 'NON ASN')->paginate(10);
            $pns = M_pegawai::where('status_pegawai', 'pns')->count();
            $pkkk = M_pegawai::where('status_pegawai', 'pkkk')->count();
            $nonasn = M_pegawai::where('status_pegawai', 'non asn')->count();

            $tidakisi = M_pegawai::where('status_pegawai', null)->count();
            $pj_struktural = M_pegawai::where('jenis_jabatan', 'JPT')->count() + M_pegawai::where('status_pegawai', 'JA')->count();
            $jfu = M_pegawai::where('jenis_jabatan', 'JF')->count();

            $tigatahun = Carbon::now()->subyear(3)->format('Y');
            $duatahun = Carbon::now()->subyear(2)->format('Y');
            $limatahun = Carbon::now()->subyear(5)->format('Y');

            $naikpangkat = M_pegawai::where('status_pegawai', 'pns')->whereYear('tanggal_pangkat', $tigatahun)->paginate(10);
            $naikberkala = M_pegawai::where('status_pegawai', 'pns')->whereYear('tanggal_berkala', $duatahun)->paginate(10);
            $str = M_pegawai::where('status_pegawai', 'pns')->whereYear('tanggal_str', $limatahun)->paginate(10);
            $sip = M_pegawai::where('status_pegawai', 'pns')->whereYear('tanggal_sip', $limatahun)->paginate(10);

            $belumisi = M_pegawai::where('unit_kerja', null)->paginate(10);

            $jumlahpegawai = M_pegawai::count();
            $pensiun = M_pegawai::where('status_pegawai', 'pns')->paginate(10);
            $pensiun->transform(function ($item) {
                if ($item->tanggal_lahir == null) {
                    $item->age = 0;
                } else {
                    $now = Carbon::now(); // Tanggal sekarang
                    $b_day = Carbon::parse($item->tanggal_lahir);
                    $item->age = $b_day->diffInYears($now);
                }

                if ($item->jenis_jabatan == 'JPT' && $item->age == 60) {
                    $item->pensiun = 'Y';
                } elseif ($item->jenis_jabatan == 'JFT' || $item->jenjang_jabatan == 'AHLI MADYA' || $item->age == 60) {
                    $item->pensiun = 'Y';
                } elseif ($item->age == 58) {
                    $item->pensiun = 'Y';
                } else {
                    $item->pensiun = 'T';
                }
                return $item;
            })->where('pensiun', 'Y');
            $unitkerja = UnitKerja::get();

            $sd = M_pegawai::where('jenjang_pendidikan', 'SD')->count();
            $smp = M_pegawai::where('jenjang_pendidikan', 'SMP')->count();
            $sma = M_pegawai::where('jenjang_pendidikan', 'SMA')->count();
            $d1 = M_pegawai::where('jenjang_pendidikan', 'DI')->count();
            $d2 = M_pegawai::where('jenjang_pendidikan', 'DII')->count();
            $d3 = M_pegawai::where('jenjang_pendidikan', 'DIII')->count();
            $d4 = M_pegawai::where('jenjang_pendidikan', 'DIV')->count();
            $s1 = M_pegawai::where('jenjang_pendidikan', 'SI')->count();
            $s2 = M_pegawai::where('jenjang_pendidikan', 'SII')->count();
            $s3 = M_pegawai::where('jenjang_pendidikan', 'SIII')->count();
            $grafik1 = [
                [
                    'label' => 'SD',
                    'x' => 0,
                    'y' => $sd,
                ],
                [
                    'label' => 'SMP',
                    'x' => 0,
                    'y' => $smp,
                ],
                [
                    'label' => 'SMA',
                    'x' => 0,
                    'y' => $sma,
                ],
                [
                    'label' => 'DI',
                    'x' => 0,
                    'y' => $d1,
                ],
                [
                    'label' => 'DII',
                    'x' => 0,
                    'y' => $d2,
                ],
                [
                    'label' => 'DIII',
                    'x' => 0,
                    'y' => $d3,
                ],
                [
                    'label' => 'DIV',
                    'x' => 0,
                    'y' => $d4,
                ],
                [
                    'label' => 'SI',
                    'x' => 0,
                    'y' => $s1,
                ],
                [
                    'label' => 'SII',
                    'x' => 0,
                    'y' => $s2,
                ],
                [
                    'label' => 'SIII',
                    'x' => 0,
                    'y' => $s3,
                ],
            ];

            $grafik2 = collect(Pangkat::get()->toArray())->map(function ($item) {
                $data['label'] = $item['golongan'];
                $data['x'] = 0;
                $data['y'] = M_pegawai::where('pangkat_id', $item['id'])->count();
                return $data;
            })->toArray();
            $grafik3 = [
                [
                    'label' => 'VII',
                    'x' => 0,
                    'y' => M_pegawai::where('golongan', 'VII')->count(),
                ],
                [
                    'label' => 'IX',
                    'x' => 0,
                    'y' => M_pegawai::where('golongan', 'IX')->count(),
                ],
                [
                    'label' => 'X',
                    'x' => 0,
                    'y' => M_pegawai::where('golongan', 'X')->count(),
                ],
            ];
            $grafik4 = [
                [
                    'label' => 'Laki-Laki',
                    'x' => 0,
                    'y' => M_pegawai::where('jkel', 'L')->count(),
                ],
                [
                    'label' => 'Perempuan',
                    'x' => 0,
                    'y' => M_pegawai::where('jkel', 'P')->count(),
                ],
            ];
            $grafik5 = [
                [
                    'label' => 'PNS',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'PNS')->count(),
                ],
                [
                    'label' => 'PPPK',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'PPPK')->count(),
                ],
                [
                    'label' => 'NON ASN',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'NON ASN')->count(),
                ],
            ];
            $grafik6 = [
                [
                    'label' => 'JPT',
                    'x' => 0,
                    'y' => M_pegawai::where('jenis_jabatan', 'JPT')->count(),
                ],
                [
                    'label' => 'JA',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'JA')->count(),
                ],
                [
                    'label' => 'JF',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'JF')->count(),
                ],
            ];

            request()->flash();
            Session::flash('success', 'Berhasil Ditampilkan');
            return view('superadmin.home', compact(
                'pns',
                'pkkk',
                'nonasn',
                'tidakisi',
                'pj_struktural',
                'jfu',
                'naikpangkat',
                'naikberkala',
                'str',
                'sip',
                'belumisi',
                'pensiun',
                'unitkerja',
                'jumlahpegawai',
                'pnsbelumisi',
                'pppkbelumisi',
                'nonasnbelumisi',
                'grafik1',
                'grafik2',
                'grafik3',
                'grafik4',
                'grafik5',
                'grafik6',
            ));
        } else {

            $namaunitkerja = UnitKerja::find($unitkerja_id)->nama;
            $pnsbelumisi = BelumIsi::where('unitkerja', $namaunitkerja)->where('status_pegawai', 'PNS')->paginate(10);
            $pppkbelumisi = BelumIsi::where('unitkerja', $namaunitkerja)->where('status_pegawai', 'PPPK')->paginate(10);
            $nonasnbelumisi = BelumIsi::where('unitkerja', $namaunitkerja)->where('status_pegawai', 'NON ASN')->paginate(10);

            $pns = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pns')->count();
            $pkkk = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pkkk')->count();
            $nonasn = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'non asn')->count();

            $tidakisi = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', null)->count();
            $pj_struktural = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'JPT')->count() + M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'JA')->count();
            $jfu = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'JF')->count();

            $tigatahun = Carbon::now()->subyear(3)->format('Y');
            $duatahun = Carbon::now()->subyear(2)->format('Y');
            $limatahun = Carbon::now()->subyear(5)->format('Y');

            $jumlahpegawai = M_pegawai::where('unitkerja_id', $unitkerja_id)->count();

            $naikpangkat = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_pangkat', $tigatahun)->paginate(10);
            $naikberkala = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_berkala', $duatahun)->paginate(10);
            $str = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_str', $limatahun)->paginate(10);
            $sip = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_sip', $limatahun)->paginate(10);

            $belumisi = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('unit_kerja', null)->paginate(10);
            $pensiun = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pns')->get()->map(function ($item) {
                if ($item->tanggal_lahir == null) {
                    $item->age = 0;
                } else {
                    $now = Carbon::now(); // Tanggal sekarang
                    $b_day = Carbon::parse($item->tanggal_lahir);
                    $item->age = $b_day->diffInYears($now);
                }

                if ($item->jenis_jabatan == 'JPT' && $item->age == 60) {
                    $item->pensiun = 'Y';
                } elseif ($item->jenis_jabatan == 'JFT' || $item->jenjang_jabatan == 'AHLI MADYA' || $item->age == 60) {
                    $item->pensiun = 'Y';
                } elseif ($item->age == 58) {
                    $item->pensiun = 'Y';
                } else {
                    $item->pensiun = 'T';
                }
                return $item;
            })->where('pensiun', 'Y');
            $unitkerja = UnitKerja::get();
            $sd = M_pegawai::where('jenjang_pendidikan', 'SD')->count();
            $smp = M_pegawai::where('jenjang_pendidikan', 'SMP')->count();
            $sma = M_pegawai::where('jenjang_pendidikan', 'SMA')->count();
            $d1 = M_pegawai::where('jenjang_pendidikan', 'DI')->count();
            $d2 = M_pegawai::where('jenjang_pendidikan', 'DII')->count();
            $d3 = M_pegawai::where('jenjang_pendidikan', 'DIII')->count();
            $d4 = M_pegawai::where('jenjang_pendidikan', 'DIV')->count();
            $s1 = M_pegawai::where('jenjang_pendidikan', 'SI')->count();
            $s2 = M_pegawai::where('jenjang_pendidikan', 'SII')->count();
            $s3 = M_pegawai::where('jenjang_pendidikan', 'SIII')->count();
            $grafik1 = [
                [
                    'label' => 'SD',
                    'x' => 0,
                    'y' => $sd,
                ],
                [
                    'label' => 'SMP',
                    'x' => 0,
                    'y' => $smp,
                ],
                [
                    'label' => 'SMA',
                    'x' => 0,
                    'y' => $sma,
                ],
                [
                    'label' => 'DI',
                    'x' => 0,
                    'y' => $d1,
                ],
                [
                    'label' => 'DII',
                    'x' => 0,
                    'y' => $d2,
                ],
                [
                    'label' => 'DIII',
                    'x' => 0,
                    'y' => $d3,
                ],
                [
                    'label' => 'DIV',
                    'x' => 0,
                    'y' => $d4,
                ],
                [
                    'label' => 'SI',
                    'x' => 0,
                    'y' => $s1,
                ],
                [
                    'label' => 'SII',
                    'x' => 0,
                    'y' => $s2,
                ],
                [
                    'label' => 'SIII',
                    'x' => 0,
                    'y' => $s3,
                ],
            ];

            $grafik2 = collect(Pangkat::get()->toArray())->map(function ($item) {
                $data['label'] = $item['golongan'];
                $data['x'] = 0;
                $data['y'] = M_pegawai::where('pangkat_id', $item['id'])->count();
                return $data;
            })->toArray();
            $grafik3 = [
                [
                    'label' => 'VII',
                    'x' => 0,
                    'y' => M_pegawai::where('golongan', 'VII')->count(),
                ],
                [
                    'label' => 'IX',
                    'x' => 0,
                    'y' => M_pegawai::where('golongan', 'IX')->count(),
                ],
                [
                    'label' => 'X',
                    'x' => 0,
                    'y' => M_pegawai::where('golongan', 'X')->count(),
                ],
            ];
            $grafik4 = [
                [
                    'label' => 'Laki-Laki',
                    'x' => 0,
                    'y' => M_pegawai::where('jkel', 'L')->count(),
                ],
                [
                    'label' => 'Perempuan',
                    'x' => 0,
                    'y' => M_pegawai::where('jkel', 'P')->count(),
                ],
            ];
            $grafik5 = [
                [
                    'label' => 'PNS',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'PNS')->count(),
                ],
                [
                    'label' => 'PPPK',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'PPPK')->count(),
                ],
                [
                    'label' => 'NON ASN',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'NON ASN')->count(),
                ],
            ];
            $grafik6 = [
                [
                    'label' => 'JPT',
                    'x' => 0,
                    'y' => M_pegawai::where('jenis_jabatan', 'JPT')->count(),
                ],
                [
                    'label' => 'JA',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'JA')->count(),
                ],
                [
                    'label' => 'JF',
                    'x' => 0,
                    'y' => M_pegawai::where('status_pegawai', 'JF')->count(),
                ],
            ];
            request()->flash();
            Session::flash('success', 'Unit kerja ' . UnitKerja::find($unitkerja_id)->nama . ' Berhasil Ditampilkan');
            return view('superadmin.home', compact(
                'pns',
                'pkkk',
                'nonasn',
                'tidakisi',
                'pj_struktural',
                'jfu',
                'naikpangkat',
                'naikberkala',
                'str',
                'sip',
                'belumisi',
                'pensiun',
                'unitkerja',
                'jumlahpegawai',
                'pnsbelumisi',
                'pppkbelumisi',
                'nonasnbelumisi',
                'grafik1',
                'grafik2',
                'grafik3',
                'grafik4',
                'grafik5',
                'grafik6',
            ));
        }
    }

    public function bandingkan()
    {
        $unitkerja = UnitKerja::get();
        $uk = $unitkerja->map(function ($item) {
            $item->pns = $item->pegawai->where('status_pegawai', 'PNS')->count();
            $item->pppk = $item->pegawai->where('status_pegawai', 'PPPK')->count();
            $item->nonasn = $item->pegawai->where('status_pegawai', 'NON ASN')->count();
            $item->null = $item->pegawai->where('status_pegawai', null)->count();
            $item->totalpegawai = $item->pegawai->count();
            return $item;
        });
        $data = [];
        $oldunitkerja = null;
        return view('superadmin.bandingkan.index', compact('uk', 'data', 'oldunitkerja'));
    }

    public function bandingkanData()
    {
        $id = array();
        foreach (request()->get('unitkerja_id') as $key => $item) {
            array_push($id, (int)$item);
        }

        $oldunitkerja = collect($id);


        $jenjang = request()->get('jenjang_jabatan');
        $jabatan = request()->get('jabatan');

        $unitkerja = UnitKerja::whereIn('id', $id)->get();

        $data = $unitkerja->map(function ($item) use ($jenjang, $jabatan) {
            $item->jumlah = M_pegawai::where('unitkerja_id', $item->id)->where('jenjang_jabatan', $jenjang)->where('jabatan', 'LIKE', '%' . $jabatan . '%')->count();
            $item->totalpegawai = $item->pegawai->count();
            return $item;
        });

        $uk = UnitKerja::get();

        request()->flash();

        //dd($data);
        return view('superadmin.bandingkan.index', compact('data', 'uk', 'oldunitkerja'));
    }

    public function pegawai()
    {
        $data = M_pegawai::paginate(10);

        return view('superadmin.pegawai.index', compact('data'));
    }
    public function syncPegawai()
    {
        $response = Http::get('https://tpp.banjarmasinkota.go.id/api/pegawai/skpd/1.02.01.');
        $data = $response->getBody()->getContents();
        $data = json_decode($data)->data;

        foreach ($data as $key => $item) {
            $check = M_pegawai::where('nip', $item->nip)->first();
            if ($check == null) {
                $n = new M_pegawai;
                $n->nip = $item->nip;
                $n->nama = $item->nama;
                $n->save();
            } else {
                if ($item->nama_puskesmas == null) {
                } else {
                    $update = $check;
                    $update->unitkerja_id = UnitKerja::where('nama', $item->nama_puskesmas->nama)->first()->id;
                    $update->save();
                }
            }
        }

        Session::flash('success', 'berhasil di sinkron');
        return redirect('/superadmin/data/pegawai');
    }
    public function resetPassPegawai($id)
    {
        $pegawai = M_pegawai::find($id)->user->update(['password' => bcrypt('bjm123')]);
        Session::flash('success', 'berhasil di reset, password : bjm123');
        return redirect('/superadmin/data/pegawai');
    }
    public function addPegawai()
    {
        return view('superadmin.pegawai.create');
    }
    public function storePegawai(Request $req)
    {
        $check = M_pegawai::where('nip', $req->nip)->first();
        if ($check == null) {
            M_pegawai::create($req->all());
            Session::flash('success', 'berhasil disimpan');
            return redirect('/superadmin/data/pegawai');
        } else {
            Session::flash('error', 'NIP sudah ada');
            return back();
        }
    }
    public function editPegawai($id)
    {
        $data = M_pegawai::find($id);
        return view('superadmin.pegawai.edit', compact('data'));
    }
    public function updatePegawai(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
            'nip' => 'required|unique:m_pegawai,nip,' . $id,
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'NIP sudah ada');
            return back();
        }
        M_pegawai::find($id)->update([
            'nip' => $req->nip,
            'nama' => $req->nama
        ]);

        Session::flash('success', 'Berhasil Di update');
        return back();
    }
    public function deletePegawai($id)
    {
        M_pegawai::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }
    public function pelanggan()
    {
        $data = User::where('is_petugas', null)->where('username', '!=', 'superadmin')->paginate(10);

        return view('superadmin.pelanggan.index', compact('data'));
    }

    public function nomor()
    {
        $data = Nomor::first();

        return view('superadmin.nomor.edit', compact('data'));
    }
    public function updateNomor(Request $req)
    {
        $data = Nomor::first();
        if ($data == null) {
            $n = new Nomor;
            $n->nomor = $req->nomor;
            $n->save();
            Session::flash('success', 'Berhasil Disimpan');
            return back();
        } else {
            $data->update([
                'nomor' => $req->nomor,
            ]);

            Session::flash('success', 'Berhasil Diupdate');
            return back();
        }
    }
    public function profilPegawai($id)
    {
        $data = M_pegawai::find($id);
        return view('superadmin.pegawai.profile', compact('data'));
    }

    public function akunPegawai()
    {
        $data = M_pegawai::get();
        $role = Role::where('name', 'pegawai')->first();

        foreach ($data as $key => $item) {

            $check = User::where('username', $item->nip)->first();
            if ($check == null) {
                //create akun
                $n = new User;
                $n->name = $item->nama;
                $n->username = $item->nip;
                $n->password = bcrypt($item->nip);
                $n->pegawai_id = $item->id;
                $n->save();
                $n->roles()->attach($role);
            }
        }

        Session::flash('success', 'Akun Login berhasil dibuat, username : nip, password :nip');
        return back();
    }

    public function cuti()
    {
        $data = Cuti::paginate(20);
        return view('superadmin.cuti.index', compact('data'));
    }
    public function verifikasiCuti($id)
    {
        Cuti::find($id)->update([
            'umpeg' => 'disetujui',
        ]);
        Session::flash('success', 'Berhasil di validasi');
        return back();
    }
    public function cutiDelete($id)
    {
        $data = Cuti::find($id)->delete();
        Session::flash('success', 'Berhasil di hapus');
        return back();
    }
    public function cutiPdf()
    {
        $data = Cuti::paginate(20);
        return view('superadmin.cuti.index', compact('data'));
    }
}
