<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiburNasional;

class LiburNasionalController extends Controller
{
    public function index()
    {
        $data = LiburNasional::paginate(10);

        return view('superadmin.liburnasional.index', compact('data'));
    }
    public function create()
    {
        return view('superadmin.liburnasional.create');
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
