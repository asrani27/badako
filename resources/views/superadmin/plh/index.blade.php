@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
PEGAWAI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/plh/add" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah</a>
    
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data PLH</h3>

        <div class="box-tools">
          
          <form method="get" action="/superadmin/plh/search">
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
            <th>Tgl ditetapkan</th>
            <th>Nomor</th>
            <th>Pegawai</th>
            <th>PLH sebagai</th>
            <th>Mulai - Sampai</th>
            <th>Aksi</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$data->firstItem() + $key}}</td>
              <td>{{\Carbon\Carbon::parse($item->ditetapkan)->format('d-m-Y')}}</td>
              <td>{{$item->nomor}}</td>
              <td>{{$item->nama}}<br/>{{$item->nip}}<br/>{{$item->unitkerja}}</td>
              <td>{{$item->sebagai}}<br/> Di {{$item->pada}}</td>
              <td>{{\Carbon\Carbon::parse($item->mulai)->format('d-m-Y')}} - {{\Carbon\Carbon::parse($item->sampai)->format('d-m-Y')}}</td>
              
              
              <td>                  
                <a href="/superadmin/plh/word/{{$item->id}}" class="btn btn-xs btn-flat  btn-primary"><i class="fa fa-file-word-o"></i> Unduh</a>
                  <a href="/superadmin/plh/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                  <a href="/superadmin/plh/delete/{{$item->id}}"
                      onclick="return confirm('Yakin ingin di hapus');"
                      class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
              </td> 
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
