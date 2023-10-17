@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
PEGAWAI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/data/pegawai" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Edit Pegawai</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal" action="/superadmin/data/pegawai/edit/{{$data->id}}" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">NIP</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="nip" value="{{$data->nip}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
            </div>
          </div>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn bg-purple btn-block">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
      
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    
  </div>
</div>
@endsection
@push('js')

@endpush
