<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengangkatanCpnsFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PengangkatanCpnsFileController extends Controller
{
    public function upload(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'file'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus scan PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->pegawai->nip . '/permohonan_cpns';

        $file = $req->file('file');
        $extension = $req->file->getClientOriginalExtension();
        $filename = str_replace(' ', '_', $req->nama) . uniqid() . '.' . $extension;
        $file->move($path, $filename);

        $new = new PengangkatanCpnsFile;
        $new->nama = $req->nama;
        $new->file = $filename;
        $new->permohonan_cpns_id = $req->permohonan_cpns_id;
        $new->save();

        Session::flash('success', 'Berhasil disimpan');
        return back();
    }
}
