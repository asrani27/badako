<?php

use App\Models\Cuti;
use App\Models\Kadis;
use App\Models\Uraian;
use App\Models\Pensiun;
use App\Models\JenisRfk;
use App\Models\JenisCuti;
use App\Models\M_pegawai;
use App\Models\T_capaian;
use App\Models\Sekretaris;
use App\Models\M_indikator;
use App\Models\KenaikanPangkat;
use Illuminate\Support\Facades\Auth;

function kadis_aktif($nip)
{
    $check = Kadis::where('nip', $nip)->first();
    if ($check == null) {
        $result = false;
    } else {
        $result =  $check->is_aktif == 1 ? true : false;
    }
    return $result;
}

function jenis_cuti()
{
    return JenisCuti::get();
}

function sekretaris_aktif($nip)
{
    $check = Sekretaris::where('nip', $nip)->first();
    if ($check == null) {
        $result = false;
    } else {
        $result =  $check->is_aktif == 1 ? true : false;
    }
    return $result;
}

function cuti_sebagai_atasan()
{
    $result = Cuti::where('atasan_langsung', Auth::user()->username)->where('verifikasi_atasan', '=', null)->count();
    return $result;
}
function cuti_sebagai_sekre()
{
    $result = Cuti::where('sekretaris', Auth::user()->username)->where('umpeg', '=', 'disetujui')->where('verifikasi_sekretaris', '=', null)->count();
    return $result;
}
function cuti_sebagai_kadis()
{
    $result = Cuti::where('kepala_dinas', Auth::user()->username)->where('verifikasi_kadis', '=', null)->count();
    return $result;
}
function pensiun_sebagai_atasan()
{
    $result = Pensiun::where('verifikasi_unitkerja', 'disetujui')->where('atasan_langsung', Auth::user()->username)->where('verifikasi_atasan', '=', null)->count();
    return $result;
}
function pensiun_sebagai_sekre()
{
    $result = Pensiun::where('sekretaris', Auth::user()->username)->where('verifikasi_umpeg', '=', 'disetujui')->where('verifikasi_sekretaris', '=', null)->count();
    return $result;
}
function pensiun_sebagai_kadis()
{
    $result = Pensiun::where('verifikasi_sekretaris', 'disetujui')->where('kadis', Auth::user()->username)->where('verifikasi_kadis', '=', null)->count();
    return $result;
}

function pangkat_sebagai_atasan()
{
    $result = KenaikanPangkat::where('verifikasi_unitkerja', 'disetujui')->where('atasan_langsung', Auth::user()->username)->where('verifikasi_atasan', '=', null)->count();
    return $result;
}
function pangkat_sebagai_sekre()
{
    $result = KenaikanPangkat::where('sekretaris', Auth::user()->username)->where('verifikasi_umpeg', '=', 'disetujui')->where('verifikasi_sekretaris', '=', null)->count();
    return $result;
}
function pangkat_sebagai_kadis()
{
    $result = KenaikanPangkat::where('verifikasi_sekretaris', 'disetujui')->where('kadis', Auth::user()->username)->where('verifikasi_kadis', '=', null)->count();
    return $result;
}

function checkPegawai($nip)
{
    if (M_pegawai::where('nip', $nip)->first() == null) {
        $check = null;
    } else {
        $check = M_pegawai::where('nip', $nip)->first()->nama;
    }
    return $check;
}
function dataPegawai($nip)
{
    $check = M_pegawai::where('nip', $nip)->first();
    return $check;
}
