@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
  
<link rel="stylesheet" type="text/css" href="/assets/signature/css/jquery.signature.css">

<style>
    .kbw-signature { width: 200px; height: 120px;}
    #sig canvas{
        width: 100% !important;
        height: auto;
    }
</style>
@endpush
@section('content')
<section class="content-header">
  <h1>Pengajuan Cuti</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Formulir Pengajuan Cuti</h3>
      </div>
      <div class="box-body">
        <form class="form-horizontal" action="/pegawai/cuti/add" method="post">
          @csrf
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">ATASAN LANGSUNG</label>
            <div class="col-sm-10">
              <select class="form-control select2" name="atasan_langsung" required>
                <option value="">-</option>
                @foreach ($pegawai as $item)
                    <option value="{{$item->nip}}">{{$item->nip}} - {{$item->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">NIP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly="" value="{{Auth::user()->pegawai->nip}}" name="nip">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">NAMA</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly="" value="{{Auth::user()->pegawai->nama}}" name="nama">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">TANGGAL MULAI</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="mulai">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">TANGGAL SELESAI</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="sampai">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">JENIS CUTI</label>
            <div class="col-sm-10">
              <select class="form-control" name="jenis_id" required>
                <option value="">-</option>
                @foreach ($jenis as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">ALASAN CUTI</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="alasan" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">ALAMAT SELAMA CUTI</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="alamat" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">TELP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telp" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Tanda Tangan</label>
            <div class="col-sm-10">
              
              <div id="sig" ></div>
              <br/>
              <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
              <textarea id="signature64" class="kbw-signature" name="signed" style="display: none"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right"></label>
            <div class="col-sm-10">
              <button type="submit" class='btn btn-primary btn-block' onclick="return confirm('Yakin data anda sudah benar?');"><i class="fa fa-send"></i> AJUKAN</button>
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>
    <!-- /.col -->
</div>
</section>


@endsection
@push('js')
 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/signature/js/jquery.signature.js"></script>
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   });
</script>

<script type="text/javascript">
  var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
  $('#clear').click(function(e) {
      e.preventDefault();
      sig.signature('clear');
      $("#signature64").val('');
  });
</script>
@endpush
