<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengangkatanController extends Controller
{
    public function index()
    {
        Session::flash('info', 'dalam pengembangan');
        return back();
    }
}
