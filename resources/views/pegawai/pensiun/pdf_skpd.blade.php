<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page { margin-top: 10px; }
        body { margin-top: 10px; }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="20%">

                <img src="http://4.bp.blogspot.com/-VzfWlC-3IYQ/T6u3HQL6i4I/AAAAAAAABWc/JW8NDkz4D4k/s1600/LOGO_BANJARMASIN.JPG"
						height="100px" width="80px">
            </td>
            <td style="text-align: center">
                <strong style="font-size: 16px">PEMERINTAH KOTA BANJARMASIN</strong><br/>
                <strong style="font-size: 24px">DINAS KESEHATAN</strong><br/>
                Jl.Pramuka Komp.Tirta Dharma Telp.(0511) 4281348<br/>
                BANJARMASIN
            </td>
            <td width="20%"></td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>
    </table>

    <table width="100%" border=0>
        <tr>
            <td width="65%">
                <table>
                    <tr>
                        <td>Nomor</td>
                        <td>: 882/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -Sekr/Diskes.</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>: 1 (satu) berkas</td>
                    </tr>
                    <tr>
                        <td valign="top">Perihal</td>
                        <td>: Permohonan {{$data->jenis}}<br/>
                            An . {{$data->nama}}<br/>
                            TMT {{\Carbon\Carbon::parse($data->tmt_pensiun)->format('d-m-Y')}}
                        </td>
                    </tr>
                </table>
            </td>
            <td rowspan="3" valign="top">
                Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}} <br/> <br/>
                Kepada Yth.<br/> <br/>
                Walikota Banjarmasin<br/>
                cq.Kepala Badan Kepegawaian<br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daerah & Diklat Kota<br/>
	            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banjarmasin<br/>
                di  -<br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banjarmasin

            </td>
        </tr>
        {{-- <tr>
            <td>Lampiran</td>
            <td>: 1 (satu) berkas</td>
        </tr>
        <tr>
            <td valign="top">Perihal</td>
            <td>: Permohonan {{$data->jenis}}<br/>
                An . {{$data->nama}}<br/>
                TMT {{\Carbon\Carbon::parse($data->tmt_pensiun)->format('d-m-Y')}}
            </td>
        </tr> --}}
    </table>

    <table width="100%" border=0>
        <tr>
            <td width="15%"></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bersama ini kami sampaikan dengan hormat permohonan pensiun dengan hak pensiun terhitung mulai tanggal …………..dengan usia 58 tahun, masa kerja pensiun … tahun ….. bulan dengan masa kerja golongan ………tahun ……..bulan atas nama :  : <br/><br/></td>
        </tr>
        <tr>
            <td></td>
            <td width="15%">Nama/NIP</td>
            <td>: {{$data->nama}} / {{$data->nip}} </td>
        </tr>
        <tr>
            <td></td>
            <td>Pank/Gol</td>
            <td>: {{$data->pangkat}} / {{$data->golongan}}  </td>
        </tr>
        <tr>
            <td></td>
            <td>Jabatan</td>
            <td>: {{$data->jabatan}}</td>
        </tr>
        <tr>
            <td></td>
            <td valign="top">Tempat Kerja</td>
            <td>: {{$data->unit_kerja}} <br/>
            </td>
        </tr>
        <br/>
        <tr>
            <td></td>
            <td colspan="2">Sebagai bahan kelengkapan bersama ini saya lampirkan  :<br/><br/></td>
            
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                1.  Surat Permohonan PNS yang bersangkutan & pengantar unit kerja<br/>
                2.  Data Perorangan  Calon Penerima Pensiun (DPCP)<br/>
                3.  Fotocopy Sah SK CPNS dan SK PNS;<br/>
                4.  Fotocopy Sah Pangkat Terakhir <br/>
                5.  Fotocopy Sah SK Jabatan Terakhir;<br/>
                6.  Daftar Susunan Keluarga dari Lurah;<br/>
                7.  Fotocopy Sah Surat Nikah;<br/>
                8.  Fotocopy Sah KTP Isteri/Suami<br/>
                9.  SKP Tahun terakhir;<br/>
                10.Surat Pernyataan tidak pernah dijatuhi Hukuman Disiplin tingkat sedang /berat;<br/>
                12.Surat  Pernyataan tidak sedang menjalani proses pidana atau pernah dipidana penjara berdasarkan putusan pengadilan yang telah berkekuatan hukum tetap;<br/>
                13.Pasfoto Berwarna ukuran 3 x 4 sebanyak 3 (tiga) lembar.<br/>
            </td>
            
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                Demikian disampaikan untuk pertimbangan dan proses selanjutnya<br/><br/>
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td></td>
            <td width="50%"></td>
            <td>Kepala Dinas,<br/>
                
				@if ($data->verifikasi_kadis == null)
                <br/><br/><br/><br/>
                @endif
				@if ($data->verifikasi_kadis != null)
				<img src="data:image/png;base64, {!! $qrcode !!}" width="80" height="80">
				@endif
                {{$kadis->nama}}.<br/>
                {{$kadis->pangkat}}<br/>
                NIP. {{$kadis->nip}}

            </td>

        </tr>
    </table>
</body>
</html>