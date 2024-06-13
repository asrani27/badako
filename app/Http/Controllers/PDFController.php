<?php

namespace App\Http\Controllers;

use App\Models\Kadis;
use App\Models\Pensiun;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function pensiun_permohonan($id)
    {
        $url = env('APP_URL') . '/check/verifikasi/digital/pensiun/' . $id;
        $qrcode = base64_encode(QrCode::format('svg')->size(600)->errorCorrection('H')->generate($url));
        $customPaper = array(0, 0, 610, 860);
        $data = Pensiun::find($id);
        $kadis = Kadis::where('nip', $data->kadis)->first();

        $pdf = PDF::loadView('pegawai.pensiun.pdf_permohonan', compact('data', 'qrcode', 'kadis'))->setPaper($customPaper);
        return $pdf->stream(Auth::user()->pegawai->nama . '_surat_permohonan.pdf');
    }
    // public function pensiun_pidana($id)
    // {
    // }
    // public function pensiun_hukuman($id)
    // {
    // }
    // public function pensiun_skpd($id)
    // {
    // }
}
