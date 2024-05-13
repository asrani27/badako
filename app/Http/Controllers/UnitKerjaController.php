<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\M_pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $data = UnitKerja::paginate(40);
        return view('superadmin.unitkerja.index', compact('data'));
    }
    public function kode()
    {
        $data = UnitKerja::get();
        foreach ($data as $key => $item) {
            $item->kode = '1700' . $item->id;
            $item->save();
        }

        Session::flash('success', 'berhasil digenerate');
        return back();
    }
    public function akun()
    {
        $data = UnitKerja::get();
        $role = Role::where('name', 'admin')->first();
        foreach ($data as $key => $item) {
            $check = User::where('username', $item->kode)->first();
            if ($check == null) {
                //create akun
                $n = new User;
                $n->name = $item->nama;
                $n->username = $item->kode;
                $n->password = bcrypt($item->kode);
                $n->unitkerja_id = $item->id;
                $n->save();
                $n->roles()->attach($role);
            }
        }

        Session::flash('success', 'Akun Login berhasil dibuat, username : kode, password :kode');
        return back();
    }

    public function resetPass($id)
    {
        UnitKerja::find($id)->user->update(['password' => bcrypt('bjm123')]);
        Session::flash('success', 'berhasil di reset, password : bjm123');
        return redirect('/superadmin/data/unitkerja');
    }

    public function export($id)
    {
        $data = M_pegawai::where('unitkerja_id', $id)->get();

        $unitkerja = UnitKerja::find($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', "DATA PEGAWAI"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        $sheet->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1

        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "NIP/NIK"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "UNITKERJA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E3', "STATUS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

        // Set height baris ke 1, 2 dan 3
        $sheet->getRowDimension('1')->setRowHeight(20);
        $sheet->getRowDimension('2')->setRowHeight(20);
        $sheet->getRowDimension('3')->setRowHeight(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("A")->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension("B")->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension("C")->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension("D")->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension("E")->setAutoSize(TRUE);
        $no = 1;
        $row = 4;
        foreach ($data as $key => $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, "'" . $item->nip);
            $sheet->setCellValue('C' . $row, $item->nama);
            $sheet->setCellValue('D' . $row, $item->unitkerja == null ? null : $item->unitkerja->nama);
            $sheet->setCellValue('E' . $row, $item->status_pegawai);
            $row++;
            $no++;
        }

        // Set judul file excel nya
        $sheet->setTitle("Laporan Data Pegawai");
        // Proses file excel

        $filename = "Laporan Pegawai " . $unitkerja->nama . '.xlsx';
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=$filename"); // Set nama file excel nya
        header("Cache-Control: max-age=0");
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
