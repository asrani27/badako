<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function step1(Request $req)
    {
        dd($req->all());
    }
}
