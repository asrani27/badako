<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiburNasional;

class LiburNasionalController extends Controller
{
    public function index()
    {
        $data = LiburNasional::paginate(20);
        return view('superadmin.liburnasional.index', compact('data'));
    }
    public function create()
    {
    }
    public function store()
    {
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
