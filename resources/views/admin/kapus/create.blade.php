@extends('admin.layouts.app')
@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
    
@endpush
@section('content-header')
kapus
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/admin/kapus" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Tambah Data</h3>

        <div class="box-tools">
          {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal" action="/admin/kapus/add" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">NIP</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nip" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pangkat</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="pangkat" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>

            <div class="col-sm-10">
              <select name="jenis" class="form-control" required>
                <option value=""></option>
                <option value="definitif">DEFINITIF</option>
                <option value="plt">PLT</option>
                <option value="plh">PLH</option>
              </select>
            </div>
          </div>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footerc">
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


<!-- Select2 -->
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endpush
