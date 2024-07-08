<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page { margin-top: 10px;margin-left: 25px; }
        body { margin-top: 10px; }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="20%">

            </td>
            <td style="text-align: center">
                <strong style="font-size: 16px">
                    <img src="http://i.pinimg.com/originals/ce/fc/fd/cefcfd06b26c3d9e73d647823ae75a30.png"
                            height="60px" width="60px"></strong><br/>
                <strong style="font-size: 18px">B A D A N  &nbsp;&nbsp;   K E P E G A W A I A N    &nbsp;&nbsp;   N E G A R A</strong><br/><br/>
            </td>
            <td width="20%"></td>
        </tr>
        <tr>
        </tr>
    </table>
<table style="font-size: 14px">
    <tr>
        <td>INSTANSI INDUK</td>
        <td>:</td>
        <td>PEMERINTAH KOTA BANJARMASIN</td>
    </tr>
    <tr>
        <td>PROPINSI</td>
        <td>:</td>
        <td>KALIMANTAN SELATAN</td>
    </tr>
    <tr>
        <td>KOTA</td>
        <td>:</td>
        <td>BANJARMASIN</td>
    </tr>
    <tr>
        <td>UNIT KERJA</td>
        <td>:</td>
        <td>DINAS KESEHATAN KOTA BANJARMASIN</td>
    </tr>
    <tr>
        <td>PEMBAYARAN</td>
        <td>:</td>
        <td>PT.TASPEN (PERSERO) CABANG BANJARMASIN</td>
    </tr>
    <tr>
        <td>BUP</td>
        <td>:</td>
        <td>AKHIR BULAN</td>
    </tr>
</table>

<table style="font-size: 14px; font-weight:bold" width="100%">
<tr>
    <td align="center">DATA PERORANGAN CALON PENERIMA PENSIUN (DPCP) PEGAWAI NEGERI SIPIL MENCAPAI BATAS USIA PENSIUN</td>
</tr>
</table>
<br/>
<table width="100%" style="font-size: 14px;">
<tr>
    <td width="50%">
        <table>
            <tr>
                <td>1. KETERANGAN PRIBADI</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;A. NAMA</td>
                <td>: {{$data->nama}}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;B. NIP</td>
                <td>:  {{$data->nip}}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;C. TEMPAT/TGL.LAHIR</td>
                <td>: {{\Carbon\Carbon::parse($data->tgl_lahir)->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;D. JABATAN/PEKERJAAN</td>
                <td>: {{$data->jabatan}}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;E. PANGKAT/GOL.RUANG / TMT</td>
                <td>: {{$data->pangkat}}/{{$data->golongan}}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;F. GAJI POKOK TERAKHIR</td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;G. MASA KERJA GOLONGAN</td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;H. MASA KERJA PENSIUN</td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;I. MASA KERJA SEBELUM <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIANGKAT SEBAGAI PNS</td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;J. PENDIDIKAN SEBAGAI DASAR</td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;K. PENGANGKATAN PERTAMA</td>
                <td>: </td>
            </tr>
            <br/>
            <br/>
            <tr>
                <td>2.KETERANGAN KELUARGA</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;A. NAMA ISTRI / SUAMI</td>
                <td>: </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border=1 cellspacing=0 cellpadding=5>
                        <tr>
                            <td>NO</td>
                            <td>NAMA</td>
                            <td>TEMPAT, TANGGAL LAHIR</td>
                            <td>TANGGAL PERKAWINAN</td>
                            <td>KETERANGAN</td>
                        </tr>
                        <tr>
                            <td>1<br/><br/><br/><br/><br/><br/></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
    <td width="50%">
        <table>
            <tr>
                <td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;B. NAMA ANAK-ANAK</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border=1 cellspacing=0 cellpadding=5>
                        <tr>
                            <td>NO</td>
                            <td>NAMA</td>
                            <td>TEMPAT, TANGGAL LAHIR</td>
                            <td>AK</td>
                            <td>AT</td>
                            <td>AA</td>
                            <td>NAMA AYAH/IBU</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <br/><br/>
            <tr>
                <td>3. ALAMAT</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;A. ALAMAT SEKARANG </td>
                <td>: {{$data->alamat_sekarang}}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KECAMATAN </td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KOTA </td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROPINSI </td>
                <td>: KALIMANTAN SELATAN</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;B. ALAMAT SESUDAH PENSIUN </td>
                <td>:  {{$data->alamat_pensiun}}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KECAMATAN </td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KOTA </td>
                <td>: </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROPINSI </td>
                <td>: KALIMANTAN SELATAN</td>
            </tr>

            <tr>
                <td colspan="2">4. DENGAN INI SAYA MENYATAKAN TELAH MENGEMBALIKAN SELURUH BARANG INVENTARIS MILIK NEGARA SETELAH BERHENTI DENGAN HORMAT SEBAGAI  PNS  DAN  APABILA  SAYA  TIDAK  MEMATUHINYA SAYA  BERSEDIA DIAMBIL TINDAKAN SESUAI PERATURAN PERUNDANG-UNDANGAN YANG BERLAKU.</td>
               
            </tr>
            <br/>
            <tr>
                <td colspan="2">5. MOHON DAPAT DIBERIKAN KENAIKAN PANGKAT PENGABDIAN SETINGKAT LEBIH TINGGI MENJADI </td>
               
            </tr>
        </table>
    </td>
</tr>
</table>

<br/>

    <table width="100%">
        <tr>
            <td width="30%">
                Keterangan: <br/>
                AT = Anak Tiri <br/>
                AA = Anak Angkat<br/><br/><br/><br/><br/><br/>
            </td>
            <td width="30%">Mengetahui,<br/>Kepala Dinas,<br/>
                <br/><br/><br/>
                {{$kadis->nama}}.<br/>
                {{$kadis->pangkat}}<br/>
                NIP. {{$kadis->nip}}
            </td>
            <td width="40%">
                BANJARMASIN,<BR/>
                PEGAWAI NEGERI SIPIL YANG BERSANGKUTAN<BR/><BR/><BR/><BR/>
                {{$data->nama}}<br/>
                NIP. {{$data->nip}}
            </td>

        </tr>
    </table>
</body>
</html>