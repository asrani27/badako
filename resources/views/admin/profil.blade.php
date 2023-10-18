@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
PROFIL UNIT KERJA
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    {{-- <a href="/admin/data/pegawai" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/> --}}
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Profil Unit Kerja</h3>

        <div class="box-tools">
          {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal" action="/admin/profil" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Unit Kerja</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="nama" value="{{$data->nama}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Alamat Unit Kerja</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="alamat" value="{{$data->alamat}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="telp" value="{{$data->telp}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Penduduk</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="jumlah_penduduk" value="{{$data->jumlah_penduduk}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Kelurahan</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="jumlah_kelurahan" value="{{$data->jumlah_kelurahan}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah RT</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="jumlah_rt" value="{{$data->jumlah_rt}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah KK</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="jumlah_kk" value="{{$data->jumlah_kk}}">
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn bg-purple btn-block">Update</button>
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
