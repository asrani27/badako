<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Pangkat;
use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function beranda()
    {
        $pns = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->count();
        $pkkk = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pkkk')->count();
        $nonasn = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'non asn')->count();
        $tidakisi = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', null)->count();
        $pj_struktural = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenis_jabatan', 'JPT')->count() + M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'JA')->count();
        $jf = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('jenis_jabatan', 'JF')->count();

        $tigatahun = Carbon::now()->subyear(3)->format('Y');
        $duatahun = Carbon::now()->subyear(2)->format('Y');
        $limatahun = Carbon::now()->subyear(5)->format('Y');

        $naikpangkat = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_pangkat', $tigatahun)->get();
        $naikberkala = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_berkala', $duatahun)->get();
        $str = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_str', $limatahun)->get();
        $sip = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('status_pegawai', 'pns')->whereYear('tanggal_sip', $limatahun)->get();

        $belumisi = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->where('unit_kerja', null)->paginate(10);
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

        return view('admin.home', compact('grafik1', 'grafik2', 'grafik3', 'pns', 'pkkk', 'nonasn', 'naikpangkat', 'tidakisi', 'naikberkala', 'pensiun', 'str', 'sip', 'belumisi', 'pj_struktural', 'jf'));
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
