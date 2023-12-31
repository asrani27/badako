@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
SK MUTASI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/mutasi/add" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah</a>
    
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Mutasi</h3>

        <div class="box-tools">
          <form method="get" action="/superadmin/mutasi/search">
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
            <th>JABATAN LAMA</th>
            <th>JABATAN BARU</th>
            <th>DITETAPKAN TANGGAL</th>
            <th>Aksi</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$data->firstItem() + $key}}</td>
              <td>{{$item->nomor}}</td>
              <td>{{$item->nip}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->jabatan_lama}}, di {{$item->unitkerja_lama}}</td>
              <td>{{$item->jabatan_baru}}, di {{$item->unitkerja_baru}}</td>
              <td>{{\Carbon\Carbon::parse($item->ditetapkan)->format('d-m-Y')}}</td>
              <td>                  
                <a href="/superadmin/mutasi/word/{{$item->id}}" class="btn btn-xs btn-flat  btn-primary"><i class="fa fa-file-word-o"></i> Unduh</a>
                  <a href="/superadmin/mutasi/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                  <a href="/superadmin/mutasi/delete/{{$item->id}}"
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
