<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table width="100%" border=0>
        <tr>
            <td width="45%"></td>
            <td></td>
            <td rowspan="10" valign="top">
                Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}} <br/> <br/>
                Kepada Yth.<br/> <br/>
                &nbsp;&nbsp;Walikota Banjarmasin<br/>
                &nbsp;&nbsp;cq.Kepala Badan Kepegawaian<br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daerah & Diklat Kota<br/>
	            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banjarmasin<br/>
                di  -<br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banjarmasin

            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <table width="100%" border=0>
        <tr>
            <td width="15%"></td>
            <td colspan="2">
                Dengan Hormat,<br/>
                1. Yang bertanda Tangan di bawah ini : <br/>
            </td>
            
        </tr>
        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. Nama</td>
            <td>: {{$data->nama}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. NIP</td>
            <td>: {{$data->nip}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. Tanggal Lahir</td>
            <td>: {{\Carbon\Carbon::parse($data->tgl_lahir)->format('d M Y')}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. Pangkat/Golongan</td>
            <td>: {{$data->pangkat}} / {{$data->golongan}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. Jabatan</td>
            <td>: {{$data->jabatan}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. Unit Organisasi</td>
            <td>: {{$data->unit_kerja}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. Alamat Rumah Sekarang</td>
            <td>: {{$data->alamat_sekarang}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. Alamat Rumah Setelah Pensiun</td>
            <td>: {{$data->alamat_pensiun}} </td>
        </tr>

        <tr>
            <td></td>
            <td width="40%"> &nbsp;&nbsp;&nbsp; a. Tanggal TMT Pensiun</td>
            <td>: {{\Carbon\Carbon::parse($data->tmt_pensiun)->format('d-m-Y')}} </td>
        </tr>
        <br/>
        <br/>
        <tr>
            <td></td>
            <td colspan="2">2. Sebagai bahan administrasi saya lampirkan  :<br/></td>
            
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; a.	Salinan SK Pangkat Pertama (CPNS) dan PNS<br/>
                &nbsp;&nbsp;&nbsp; b.	Salinan Sah SK Pangkat Terakhir <br/>
                &nbsp;&nbsp;&nbsp; c.	Salinan Sah Kartu Pegawai<br/>
                &nbsp;&nbsp;&nbsp; d.	Salinan Sah SKP<br/>
                &nbsp;&nbsp;&nbsp; e.	Salinan Akta Nikah<br/>
                &nbsp;&nbsp;&nbsp; f.	Salinan Kartu Keluarga<br/>
                &nbsp;&nbsp;&nbsp; g.	07 ( Tujuh)  lembar pas photo ukuran 4 x 6 cm<br/>
                &nbsp;&nbsp;&nbsp; h.	3 (tiga ) lembar pas photo ukuran 3 x 4 cm<br/>
                &nbsp;&nbsp;&nbsp; i.	Surat Pernyataan Tidak Pernah Dijatuhi Hukuman Disiplin Tingkat Sedang/Berat<br/>
                &nbsp;&nbsp;&nbsp; j.	Surat Pernyataan Tidak Sedang Menjalani Proses Pidana atau Pernah Dipidana Penjara Berdasarkan Putusan Pengadilan Yang Telah Berkekuatan Hukum Tetap<br/><br/>

            </td>
            
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                3.	Demikian surat permohonan ini disampaikan  sebagai bahan pertimbangan dan proses selanjutnya, atas bantuan dan pertimbangan Bapak diucapkan terima kasih<br/><br/>
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td></td>
            <td width="50%">Mengetahui,,<br/>{{$data->mengetahui}}
                <br/><br/><br/><br/>
            
            
            </td>
            <td>Hormat Saya,<br/><br/>

                <img src="{{$data->ttd}}" width="80px" height="50px"><br/><br/>
                {{$data->nama}}

            </td>
        </tr>
    </table>
</body>
</html>