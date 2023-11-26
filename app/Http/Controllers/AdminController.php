<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Pangkat;
use App\Models\BelumIsi;
use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function detail($nip)
    {
        $data = M_pegawai::where('nip', $nip)->first();

        if ($data->status_pegawai == null) {
            return view('admin.detail', compact('data'));
        }
        if ($data->status_pegawai == 'PNS') {
            return view('admin.detailpns', compact('data'));
        }
        if ($data->status_pegawai == 'PPPK') {
            return view('admin.detailpppk', compact('data'));
        }
        if ($data->status_pegawai == 'NON ASN') {
            return view('admin.detailnonasn', compact('data'));
        }
    }
    public function storebelum($i)
    {
        if (BelumIsi::where('nip', $i->nip)->first() == null) {
            $n = new BelumIsi;
            $n->nip = $i->nip;
            $n->nama = $i->nama;
            $n->unitkerja = Auth::user()->unitkerja->nama;
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
            $n->unitkerja = Auth::user()->unitkerja->nama;
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
            $n->unitkerja = Auth::user()->unitkerja->nama;
            $n->status_pegawai = 'PPPK';
            $n->save();
        } else {
        }
    }

    public function asnbelumisi()
    {

        BelumIsi::where('status_pegawai', 'PNS')->where('unitkerja', Auth::user()->unitkerja->nama)->get()->map->delete();
        $pns = M_pegawai::where('status_pegawai', 'PNS')->where('unitkerja_id', Auth::user()->unitkerja->id)->get();
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

        BelumIsi::where('status_pegawai', 'PPPK')->where('unitkerja', Auth::user()->unitkerja->nama)->get()->map->delete();
        $pns = M_pegawai::where('status_pegawai', 'PPPK')->where('unitkerja_id', Auth::user()->unitkerja->id)->get();


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
        BelumIsi::where('status_pegawai', 'NON ASN')->where('unitkerja', Auth::user()->unitkerja->nama)->get()->map->delete();
        $pns = M_pegawai::where('status_pegawai', 'NON ASN')->where('unitkerja_id', Auth::user()->unitkerja->id)->get();

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
    public function beranda()
    {
        $pns = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->count();
        $pkkk = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pppk')->count();
        $nonasn = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'non asn')->count();
        $tidakisi = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', null)->count();
        $pj_struktural = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenis_jabatan', 'JPT')->count() + M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'JA')->count();
        $jf = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenis_jabatan', 'JF')->count();


        $jumlahpegawai = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->count();

        $tigatahun = Carbon::now()->subyear(3)->format('Y');
        $duatahun = Carbon::now()->subyear(2)->format('Y');
        $limatahun = Carbon::now()->subyear(5)->format('Y');

        $naikpangkat = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_pangkat', $tigatahun)->get();
        $naikberkala = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_berkala', $duatahun)->get();
        $str = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_str', $limatahun)->get();
        $sip = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_sip', $limatahun)->get();

        $belumisi = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', null)->paginate(10);


        $pnsbelumisi = BelumIsi::where('status_pegawai', 'PNS')->where('unitkerja', Auth::user()->unitkerja->nama)->paginate(10);
        $pppkbelumisi = BelumIsi::where('status_pegawai', 'PPPK')->where('unitkerja', Auth::user()->unitkerja->nama)->paginate(10);
        $nonasnbelumisi = BelumIsi::where('status_pegawai', 'NON ASN')->where('unitkerja', Auth::user()->unitkerja->nama)->paginate(10);

        $pensiun = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->get()->map(function ($item) {
            if ($item->tanggal_lahir == null) {
                $item->age = 0;
            } else {
                $now = Carbon::now(); // Tanggal sekarang
                $b_day = Carbon::parse($item->tanggal_lahir);
                $item->age = $b_day->diffInYears($now);
            }

            // if ($item->jenis_jabatan == 'JPT' && $item->age == 60) {
            //     $item->pensiun = 'Y';
            // } elseif ($item->jenis_jabatan == 'JFT' || $item->jenjang_jabatan == 'AHLI MADYA' || $item->age == 60) {
            //     $item->pensiun = 'Y';
            // } elseif ($item->age == 58) {
            //     $item->pensiun = 'Y';
            // } else {
            //     $item->pensiun = 'T';
            // }
            return $item;
        })->where('age', 58);


        $sd = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'SD')->count();
        $smp = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'SMP')->count();
        $sma = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'SMA')->count();
        $d1 = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'DI')->count();
        $d2 = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'DII')->count();
        $d3 = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'DIII')->count();
        $d4 = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'DIV')->count();
        $s1 = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'SI')->count();
        $s2 = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'SII')->count();
        $s3 = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenjang_pendidikan', 'SIII')->count();
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
            $data['y'] = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('pangkat_id', $item['id'])->count();
            return $data;
        })->toArray();
        $grafik3 = [
            [
                'label' => 'VII',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('golongan', 'VII')->count(),
            ],
            [
                'label' => 'IX',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('golongan', 'IX')->count(),
            ],
            [
                'label' => 'X',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('golongan', 'X')->count(),
            ],
        ];
        $grafik4 = [
            [
                'label' => 'Laki-Laki',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jkel', 'L')->count(),
            ],
            [
                'label' => 'Perempuan',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jkel', 'P')->count(),
            ],
        ];
        $grafik5 = [
            [
                'label' => 'PNS',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'PNS')->count(),
            ],
            [
                'label' => 'PPPK',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'PPPK')->count(),
            ],
            [
                'label' => 'NON ASN',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'NON ASN')->count(),
            ],
        ];
        $grafik6 = [
            [
                'label' => 'JPT',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenis_jabatan', 'JPT')->count(),
            ],
            [
                'label' => 'JA',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'JA')->count(),
            ],
            [
                'label' => 'JF',
                'x' => 0,
                'y' => M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'JF')->count(),
            ],
        ];
        return view('admin.home', compact('grafik1', 'grafik2', 'grafik3', 'grafik4', 'grafik5',  'grafik6', 'jumlahpegawai', 'pns', 'pkkk', 'nonasn', 'naikpangkat', 'tidakisi', 'naikberkala', 'pensiun', 'str', 'sip', 'belumisi', 'pj_struktural', 'jf', 'pnsbelumisi', 'pppkbelumisi', 'nonasnbelumisi'));
    }

    public function profil()
    {
        $data = Auth::user()->unitkerja;
        return view('admin.profil', compact('data'));
    }
    public function updateProfil(Request $req)
    {
        $data = Auth::user()->unitkerja->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'telp' => $req->telp,
            'jumlah_penduduk' => $req->jumlah_penduduk,
            'jumlah_kelurahan' => $req->jumlah_kelurahan,
            'jumlah_rt' => $req->jumlah_rt,
            'jumlah_kk' => $req->jumlah_kk,
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function pegawai()
    {

        $data = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->paginate(10);

        return view('admin.pegawai.index', compact('data'));
    }

    public function resetPassPegawai($id)
    {
        $password = M_pegawai::find($id)->nip;
        M_pegawai::find($id)->user->update(['password' => bcrypt($password)]);
        Session::flash('success', 'berhasil di reset, password : ' . $password);
        return redirect('/admin/data/pegawai');
    }

    public function addPegawai()
    {
        return view('admin.pegawai.create');
    }
    public function storePegawai(Request $req)
    {

        $check = M_pegawai::where('nip', $req->nip)->first();
        if ($check == null) {
            $param = $req->all();
            $param['unitkerja_id'] = Auth::user()->unitkerja_id;
            M_pegawai::create($param);
            Session::flash('success', 'berhasil disimpan');
            return redirect('/admin/data/pegawai');
        } else {
            $check->update([
                'unitkerja_id' => Auth::user()->unitkerja_id,
            ]);
            Session::flash('success', 'berhasil disimpan');
            return redirect('/admin/data/pegawai');
        }
    }
    public function editPegawai($id)
    {
        $data = M_pegawai::find($id);
        return view('admin.pegawai.edit', compact('data'));
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
        M_pegawai::find($id)->update(['unitkerja_id' => null]);
        Session::flash('success', 'Berhasil Di hapus ');
        return back();
    }
    public function profilPegawai($id)
    {
        $data = M_pegawai::find($id);
        return view('admin.pegawai.profile', compact('data'));
    }
    public function akunPegawai()
    {
        $data = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->get();
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

    public function cariPegawai()
    {
        $keyword = request()->get('search');
        $data = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('nama', 'LIKE', '%' . $keyword . '%')
            ->orWhere(
                function ($query) use ($keyword) {
                    $query->where('unitkerja_id', Auth::user()->unitkerja_id)->where('nip', 'LIKE', '%' . $keyword . '%');
                }
            )
            ->paginate(10);
        request()->flash();
        return view('admin.pegawai.index', compact('data'));
    }
}
