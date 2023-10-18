<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GantiPassController extends Controller
{
    public function index()
    {
        return view('gantipass');
    }
    public function update(Request $req)
    {
        if ($req->password != $req->password2) {
            Session::flash('error', 'Pasword tidak sama');
        } else {
            Auth::user()->update([
                'password' => bcrypt($req->password),
            ]);
            Session::flash('success', 'Berhasil Diupdate');
        }
        return back();
    }
}
