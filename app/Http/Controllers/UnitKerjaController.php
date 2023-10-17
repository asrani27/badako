<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $data = UnitKerja::paginate(40);
        return view('superadmin.unitkerja.index', compact('data'));
    }
    public function kode()
    {
        $data = UnitKerja::get();
        foreach ($data as $key => $item) {
            $item->kode = '1700' . $item->id;
            $item->save();
        }

        Session::flash('success', 'berhasil digenerate');
        return back();
    }
    public function akun()
    {
        $data = UnitKerja::get();
        $role = Role::where('name', 'admin')->first();
        foreach ($data as $key => $item) {
            $check = User::where('username', $item->kode)->first();
            if ($check == null) {
                //create akun
                $n = new User;
                $n->name = $item->nama;
                $n->username = $item->kode;
                $n->password = bcrypt($item->kode);
                $n->unitkerja_id = $item->id;
                $n->save();
                $n->roles()->attach($role);
            }
        }

        Session::flash('success', 'Akun Login berhasil dibuat, username : kode, password :kode');
        return back();
    }

    public function resetPass($id)
    {
        UnitKerja::find($id)->user->update(['password' => bcrypt('bjm123')]);
        Session::flash('success', 'berhasil di reset, password : bjm123');
        return redirect('/superadmin/data/unitkerja');
    }
}
