@extends('superadmin.layouts.app')
@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
@endpush
@section('content-header')
PLH PEGAWAI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/plh" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Tambah PLH</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal" action="/superadmin/plh/add" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nomor Surat</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nomor" placeholder="nomor">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Surat Dari Kepala</label>
            <div class="col-sm-10">
              <select name="dari" class="form-control select2">
                <option value="">-pilih-</option>
                @foreach ($unitkerja as $item)
                <option value="{{$item->nama}}">{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
            {{-- <div class="col-sm-10">
                <select name="pegawai_id" class="form-control select2">
                  <option value="">-pilih-</option>
                  @foreach ($pegawai as $item)
                  <option value="{{$item->id}}">{{$item->nip}} - {{$item->nama}}</option>
                  @endforeach
                </select>
            </div> --}}
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nomor</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="darinomor" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="daritanggal" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Menunjuk</label>
           
            <div class="col-sm-10">
                <select name="pegawai_id" class="form-control select2">
                  <option value="">-pilih-</option>
                  @foreach ($pegawai as $item)
                  <option value="{{$item->id}}">{{$item->nip}} - {{$item->nama}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Sebagai</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="sebagai">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Mulai</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="mulai" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Sampai</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="sampai" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tempat Di</label>

            <div class="col-sm-10">
              <select name="pada" class="form-control select2">
                <option value="">-pilih-</option>
                @foreach ($unitkerja as $item)
                <option value="{{$item->nama}}">{{$item->nama}}</option>
                @endforeach
              </select>
              
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Ditetapkan Tanggal</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="ditetapkan" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kepala Dinas :</label>

            <div class="col-sm-10">
              
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">NIP </label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nipkadis" value="{{$kadis->nip}}" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama </label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="namakadis" value="{{$kadis->nama}}" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pangkat </label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="pangkatkadis" value="{{$kadis->pangkat}}" readonly>
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

<!-- Select2 -->
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endpush
