<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>UNITKERJA</th>
            <th>JENIS CUTI</th>
            <th>TGL CUTI</th>
            <th>LAMA</th>
        </tr>
        @foreach ($data as $key=> $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>'{{$item->nip}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->unit_kerja}}</td>
                <td>{{$item->jenis_cuti == null ? '' : $item->jenis_cuti->nama}}</td>
                
                <td>{{$item->mulai}} s/d {{$item->sampai}} </td>
                <td>{{$item->lama}} hari</td>
            </tr>
        @endforeach
    </table>
</body>
</html>