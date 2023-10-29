@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
PEGAWAI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/admin/data/pegawai/add" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah</a>
    <a href="/admin/data/pegawai/akun" class="btn btn-sm bg-purple"><i class="fa fa-key"></i> Buat Akun Pegawai</a> <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Pegawai</h3>

        <div class="box-tools">
          <form method="get" action="/admin/data/pegawai/search">
          @csrf
          <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
            <input type="text" name="search" class="form-control pull-right" value="{{old('search')}}" placeholder="Cari NIP/NIK/Nama" required>

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
            <th class="text-center">NO</th>
            <th>NIP/NIK</th>
            <th>NAMA</th>
            <th>STATUS PEGAWAI</th>
            <th>AKSI</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$data->firstItem() + $key}}</td>
              <td>{{$item->nip}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->status_pegawai}}</td>
              <td>                  
                  <a href="/admin/data/pegawai/profile/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-user"></i> profile </a>
                  <a href="/admin/data/pegawai/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                  <a href="/admin/data/pegawai/delete/{{$item->id}}"
                      onclick="return confirm('Yakin ingin di hapus');"
                      class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
                      @if ($item->user != null)
                          
    <a href="/admin/data/pegawai/resetpass/{{$item->id}}" class="btn btn-xs bg-purple"><i class="fa fa-lock"></i> Reset Password</a>
                      @endif
              </td>
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    {{$data->withQueryString()->links()}}
  </div>
</div>
@endsection
@push('js')

@endpush
