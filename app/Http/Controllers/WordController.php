<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\KenaikanPangkat;
use PhpOffice\PhpWord\TemplateProcessor;

class WordController extends Controller
{
    public function pangkat_pengantar($id)
    {
        $data = KenaikanPangkat::find($id);

        $word = new TemplateProcessor(public_path() . '/word/pangkat_pengantar.docx');
        $word->setValues([
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),

            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
        ]);

        $file = 'surat_pengantar_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }
    public function pangkat_hukuman($id)
    {
        $data = KenaikanPangkat::find($id);

        $word = new TemplateProcessor(public_path() . '/word/pangkat_hukuman.docx');
        $word->setValues([
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),

            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
        ]);

        $file = 'surat_tidak_kena_hukuman_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }
    public function pangkat_mutasi($id)
    {
        $data = KenaikanPangkat::find($id);

        $word = new TemplateProcessor(public_path() . '/word/pangkat_mutasi.docx');
        $word->setValues([
            'tanggal' => Carbon::parse($data->tanggal)->translatedFormat('d F Y'),

            'namakadis' => $data->namakadis,
            'pangkatkadis' => $data->pangkatkadis,
            'nipkadis' => $data->nipkadis,
        ]);

        $file = 'surat_mutasi_' . $data->nip . '_' . $data->nama . '.docx';
        $word->saveAs(public_path() . '/export/' . $file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile(public_path() . '/export/' . $file);
    }
}
