<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Nomor;
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

        $belumisi = M_pegawai::where('unit_kerja', null)->paginate(10);


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
        ));
    }
    public function filter()
    {
        $unitkerja_id = request()->get('unitkerja');

        if ($unitkerja_id == null) {
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
                'unitkerja'
            ));
        } else {

            $pns = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pns')->count();
            $pkkk = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'pkkk')->count();
            $nonasn = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'non asn')->count();

            $tidakisi = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', null)->count();
            $pj_struktural = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'JPT')->count() + M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'JA')->count();
            $jfu = M_pegawai::where('unitkerja_id', $unitkerja_id)->where('status_pegawai', 'JF')->count();

            $tigatahun = Carbon::now()->subyear(3)->format('Y');
            $duatahun = Carbon::now()->subyear(2)->format('Y');
            $limatahun = Carbon::now()->subyear(5)->format('Y');

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
                'unitkerja'
            ));
        }
    }

    public function bandingkan()
    {
        return view('superadmin.bandingkan.index');
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
}
