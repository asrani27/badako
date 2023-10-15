<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('/superadmin/beranda');
            } elseif (Auth::user()->hasRole('pelanggan')) {
                return redirect('/pelanggan/home');
            } elseif (Auth::user()->hasRole('bidang')) {
                return redirect('/bidang/beranda');
            } elseif (Auth::user()->hasRole('pptk')) {
                return redirect('/pptk/beranda');
            } else {
                return 'role lain';
            }
        }
        return view('home');
    }
}
