<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KarisKarsuController extends Controller
{
    public function index()
    {
        Session::flash('info', 'dalam pengembangan');
        return back();
    }
}
