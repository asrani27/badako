<?php

namespace App\Exports;

use App\Models\Cuti;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CutiExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $kode;
    private $tanggal;

    public function __construct($kode, String $tanggal)
    {
        $this->kode = $kode;
        $this->tanggal = $tanggal;
    }

    public function view(): View
    {
        if ($this->kode == null) {
            $data = Cuti::where('mulai', '>=', $this->tanggal)->where('sampai', '<=', $this->tanggal)->orderBy('umpeg', 'ASC')->get();
        } else {
            $data = Cuti::where('kode_unitkerja', $this->kode)->where('mulai', '>=', $this->tanggal)->where('sampai', '<=', $this->tanggal)->orderBy('umpeg', 'ASC')->get();
        }
        return view('exports.cuti', compact('data'));
    }
}
