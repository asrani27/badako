@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
PEGAWAI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/penugasan/add" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah</a>
    
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Penugasan</h3>

        <div class="box-tools">
          
          <form method="get" action="/superadmin/penugasan/search">
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
            <th>NOMOR SURAT</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>UNIT KERJA</th>
            <th>SEBAGAI</th>
            <th>PADA TANGGAL</th>
            <th>TEMPAT TUGAS</th>
            <th>Aksi</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$data->firstItem() + $key}}</td>
              <td>{{$item->nomor}}</td>
              <td>{{$item->nip}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->unitkerja}}</td>
              <td>{{$item->sebagai}}</td>
              <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</td>
              <td>{{$item->tempat}}</td>
              <td>                  
                <a href="/superadmin/penugasan/word/{{$item->id}}" class="btn btn-xs btn-flat  btn-primary"><i class="fa fa-file-word-o"></i> Unduh</a>
                  <a href="/superadmin/penugasan/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                  <a href="/superadmin/penugasan/delete/{{$item->id}}"
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
