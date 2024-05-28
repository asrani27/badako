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
    private $tanggal2;

    public function __construct($kode, String $tanggal, String $tanggal2)
    {
        $this->kode = $kode;
        $this->tanggal = $tanggal;
        $this->tanggal2 = $tanggal2;
    }

    public function view(): View
    {
        if ($this->kode == null) {
            $data = Cuti::where('mulai', '>=', $this->tanggal)->where('sampai', '<=', $this->tanggal2)->orderBy('umpeg', 'ASC')->get();
        } else {
            $data = Cuti::where('kode_unitkerja', $this->kode)->where('mulai', '>=', $this->tanggal)->where('sampai', '<=', $this->tanggal2)->orderBy('umpeg', 'ASC')->get();
        }
        return view('exports.cuti', compact('data'));
    }
}
