@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
SK Berkala
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/berkala/add" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah</a>
    
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Berkala</h3>

        <div class="box-tools">
          <form method="get" action="/superadmin/berkala/search">
            @csrf
            <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
              <input type="text" name="search" class="form-control pull-right" value="{{old('search')}}" placeholder="Cari NIP/Nama">
  
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive table-bordered table-condensed">
        <table class="table table-hover">
          <tbody>
          <tr style="background-color: #a8c4f1">
            <th class="text-center">No</th>
            <th>Tanggal</th>
            <th>Kepada</th>
            <th>Gaji Lama</th>
            <th>Gaji Baru</th>
            <th>Aksi</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$data->firstItem() + $key}}</td>
              <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>

              <td>
              Nama : {{$item->nama}}<br/>
              NIP :{{$item->nip}}<br/>
              Pangkat :{{$item->pangkat}}<br/>
              Unitkerja : {{$item->unitkerja}} <br/>
             </td>
              <td>  
                Gaji Lama : {{$item->gajilama}}<br/>
                Oleh : Kepala Dinas Kesehatan Kota Banjarmasin<br/>
                Tanggal/Nomor :{{$item->tanggallama}} / 822.4/{{$item->nomor}}-Sekr/Diskes<br/>
                MKG : {{$item->mkglama}} <br/>
              </td>
              <td>  
                Gaji Lama : {{$item->gajibaru}}<br/>
                MKG : {{$item->mkgbaru}} <br/>
                Dalam Golongan : {{$item->golongan}}<br/>
                Mulai Tanggal :{{\Carbon\Carbon::parse($item->tanggalbaru)->translatedFormat('d F Y')}}<br/>
                Untuk kenaikan gaji yad:{{\Carbon\Carbon::parse($item->tanggalyad)->translatedFormat('d F Y')}}
              </td>
              
              
              <td>                  
                <a href="/superadmin/berkala/word/{{$item->id}}" class="btn btn-xs btn-flat  btn-primary"><i class="fa fa-file-word-o"></i> Unduh</a>
                  <a href="/superadmin/berkala/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                  <a href="/superadmin/berkala/delete/{{$item->id}}"
                      onclick="return confirm('Yakin ingin di hapus');"
                      class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    {{$data->links()}}
  </div>
</div>
@endsection
@push('js')


@endpush
