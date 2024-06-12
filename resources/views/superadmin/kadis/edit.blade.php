@extends('superadmin.layouts.app')
@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
    
@endpush
@section('content-header')
KADIS
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/kadis" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Edit Data</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal" action="/superadmin/kadis/edit/{{$data->id}}" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">NIP</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nip" value="{{$data->nip}}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pangkat</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="pangkat" value="{{$data->pangkat}}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>

            <div class="col-sm-10">
              <select name="jenis" class="form-control" required>
                <option value=""></option>
                <option value="definitif" {{$data->jenis == 'definitif' ? 'selected':''}}>DEFINITIF</option>
                <option value="plt" {{$data->jenis == 'plt' ? 'selected':''}}>PLT</option>
                <option value="plh" {{$data->jenis == 'plh' ? 'selected':''}}>PLH</option>
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
