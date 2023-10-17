<?php

namespace App\Http\Controllers;

use App\Models\M_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function beranda()
    {
        return view('admin.home');
    }

    public function pegawai()
    {

        $data = M_pegawai::where('unitkerja_id', Auth::user()->unitkerja_id)->paginate(10);

        return view('admin.pegawai.index', compact('data'));
    }
}
