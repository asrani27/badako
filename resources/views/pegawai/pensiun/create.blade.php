@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
  

<style>
  .wrapper-pad {
  position: relative;
  width: 300px;
  height: 200px;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.signature-pad {
  position: absolute;
  left: 0;
  top: 0;
  width:300px;
  height:200px;
  background-color: white;
  border: 2px solid black;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
@endpush
@section('content')
<section class="content-header">
  <h1>Permohonan Pensiun</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Formulir Permohonan Pensiun</h3>
      </div>
      <div class="box-body">
        <form class="form-horizontal" action="/pegawai/pensiun/add" method="post" enctype="multipart/form-data">
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
            <label for="inputName" class="col-sm-2 control-label text-right">TANGGAL AJUKAN</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal" required value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">JENIS PENSIUN</label>
            <div class="col-sm-10">
              <select class="form-control select2" name="jenis" required>
                <option value="">-</option>=
                    <option value="PENSIUN BUP">PENSIUN BUP 58/60 Th</option>
                    <option value="PENSIUN JANDA DUDA">PENSIUN JANDA/DUDA/YATIM</option>
                    <option value="PENSIUN APS MK">PENSIUN APS MK 20, USIA 50TH</option>
                    <option value="PENSIUN APS UZUR">PENSIUN APS UZUR/SAKIT</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">NAMA</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{$data->nama}}" name="nama" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">NIP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{$data->nip}}" name="nip" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">TANGGAL LAHIR</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" value="{{$data->tanggal_lahir}}" name="tgl_lahir" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">JABATAN</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{$data->jabatan}}" name="jabatan">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">PANGKAT / GOL</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="pangkat" value="{{$data->pangkat == null ? "": $data->pangkat->nama}}">
            </div>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="golongan" value="{{$data->pangkat == null ? "": $data->pangkat->golongan}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">UNIT KERJA</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  value="{{$data->unitkerja == null ? "": $data->unitkerja->nama}}" name="unit_kerja">
              <input type="hidden" class="form-control"  value="{{$data->unitkerja == null ? "": $data->unitkerja->kode}}" name="kode_unitkerja">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">TMT PENSIUN</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" name="tmt_pensiun" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">ALAMAT SEKARANG</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{$data->alamat}}" name="alamat_sekarang">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">ALAMAT SETELAH PENSIUN</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{$data->alamat}}" name="alamat_pensiun">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">MENGETAHUI</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="mengetahui" value="Puskesmas ....">
            </div>
          </div>

          {{-- <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Tanda Tangan</label>
            <div class="col-sm-10">
              
              <div class="wrapper-pad">
                <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                <input type="hidden" id="signed" name="signed">
              </div>
              <button type="button" id="clear" class="btn btn-danger">Clear Signature</button>
            </div>
          </div> --}}


          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">NIP KADIS</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nip_kadis" value="{{$kadis->nip}}" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">NAMA KADIS</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_kadis" value="{{$kadis->nama}}" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">PANGKAT KADIS</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="pangkat_kadis" value="{{$kadis->pangkat}}" readonly>
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
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   });
</script>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   });
</script>
<script type="text/javascript">

  $('#clear').click(function(e) {
      const canvas = document.querySelector("canvas");
      const signaturePad = new SignaturePad(canvas);
      signaturePad.clear();
  });
</script>
<script type="text/javascript">
const signed = document.querySelector("#signed");
var canvas = document.getElementById('signature-pad');
function resizeCanvas() {
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
}

window.onresize = resizeCanvas;
resizeCanvas();

var signaturePad = new SignaturePad(canvas, {
  backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
});

signaturePad.addEventListener("endStroke", () => {
  var ttd = signaturePad.toDataURL();
  signed.value = ttd;
  console.log("Signature started");
});
</script>

@endpush
