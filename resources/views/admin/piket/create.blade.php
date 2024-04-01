@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
PIKET
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/admin/piket" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Tambah Data</h3>

        <div class="box-tools">
          {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal" action="/admin/piket/add" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">NIP/NIK</label>

            <div class="col-sm-10">
              <select class="form-control" name="nip" required>
              <option value="">pilih</option>
              @foreach ($pegawai as $item)
                  <option value="{{$item->nip}}">{{$item->nip}} - {{$item->nama}}</option>
              @endforeach
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">tanggal mulai</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal_mulai"  required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">tanggal selesai</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal_selesai" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Lama Piket</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="lama" required onkeypress="return hanyaAngka(event)">
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

<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>
@endpush
