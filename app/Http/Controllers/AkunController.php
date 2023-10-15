<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AkunController extends Controller
{
    public function index()
    {
        $data = User::where('is_petugas', 'Y')->paginate(15);
        return view('superadmin.akun.index', compact('data'));
    }

    public function create()
    {
        $role = Role::where('name', '!=', 'superadmin')->where('name', '!=', 'pelanggan')->get();
        return view('superadmin.akun.create', compact('role'));
    }
    public function store(Request $req)
    {
        $checkUsername = User::where('username', $req->username)->first();
        if ($checkUsername == null) {
            $role = Role::find($req->role_id);
            $n = new User;
            $n->name = $req->name;
            $n->username = $req->username;
            $n->password = bcrypt($req->password);
            $n->is_petugas = 'Y';
            $n->save();

            $n->roles()->attach($role);

            Session::flash('success', 'Berhasil Di Simpan');
            return redirect('/superadmin/akun');
        } else {
            Session::flash('error', 'Username sudah ada, silahkan gunakan yang lain');
            return back();
        }
    }
    public function edit($id)
    {
        $role = Role::where('name', '!=', 'superadmin')->where('name', '!=', 'pelanggan')->get();
        $data = User::find($id);
        return view('superadmin.akun.edit', compact('role', 'data'));
    }
    public function update(Request $req, $id)
    {
        $role = Role::find($req->role_id);
        $akun = User::find($id);
        if ($req->password == null) {
            $akun->update(['name' => $req->name]);
        } else {
            $akun->update(['name' => $req->name, 'password' => bcrypt($req->password)]);
        }
        $akun->roles()->sync($role);
        Session::flash('success', 'Berhasil Di update');
        return redirect('/superadmin/akun');
    }
    public function delete($id)
    {
        $akun = User::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }
}
