<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="20%"></td>
            <td style="text-align: center">
                <strong style="font-size: 16px">PEMERINTAH KOTA BANJARMASIN</strong><br/>
                <strong style="font-size: 24px">DINAS KESEHATAN</strong><br/>
                Jl.Pramuka Komp.Tirta Dharma Telp.(0511) 4281348<br/>
                BANJARMASIN
            </td>
            <td width="20%">Kode Pos 70249</td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>
    </table>

    <table width="100%" border=0>
        <tr>
            <td align="center">SURAT PERNYATAAN<br/>
                <u>TIDAK PERNAH DIJATUHI HUKUMAN DISIPLIN TINGKAT SEDANG/BERAT</u><br/>
                
                NOMOR : 800/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -Sekr/Diskes.
            </td>
        </tr>
    </table>
<br/>
<br/>
    <table width="100%" border=0>
        <tr>
            <td width="15%"></td>
            <td colspan="2">
                Yang bertanda Tangan di bawah ini : <br/>
            </td>
            
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; Nama</td>
            <td>: {{$kadis->nama}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; NIP</td>
            <td>: {{$kadis->nip}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; Pangkat/Golongan</td>
            <td>: {{$kadis->pangkat}} / {{$kadis->golongan}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; Jabatan</td>
            <td>: Kepala Dinas Kesehatan</td>
        </tr>
        
        <br/>
        <tr>
            <td></td>
            <td colspan="2">Dengan ini menyatakan dengan sesungguhnya bahwa Pegawai Negeri Sipil    :<br/></td>
            
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; Nama</td>
            <td>: {{$data->nama}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; NIP</td>
            <td>: {{$data->nip}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; Pangkat/Golongan</td>
            <td>: {{$data->pangkat}} / {{$data->golongan}} </td>
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; Jabatan</td>
            <td>: {{$data->jabatan}}</td>
        </tr>
        <tr>
            <td></td>
            <td width="30%"> &nbsp;&nbsp;&nbsp; Instansi</td>
            <td>: {{$data->unit_kerja}}</td>
        </tr>
        <br/>
        <br/>
        <tr>
            <td></td>
            <td colspan="2">
                dalam satu tahun tidak pernah dijatuhi hukuman disiplin tingkat sedang / berat.<br/><br/>

Demikian surat pernyataan ini saya buat dengan sesungguhnya dengan mengingat sumpah jabatan dan apabila di kemudian hari ternyata isi surat pernyataan ini tidak benar yang mengakibatkan kerugian bagi negara, maka saya bersedia menanggung kerugian tersebut
<br/><br/>
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