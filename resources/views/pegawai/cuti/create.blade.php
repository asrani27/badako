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
        <form class="form-horizontal" action="/pegawai/cuti/add" method="post" enctype="multipart/form-data">
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
            <label for="inputName" class="col-sm-2 control-label text-right">UNIT KERJA</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly="" value="{{Auth::user()->pegawai->unitkerja->nama}}" name="nama">
              <input type="hidden" class="form-control" readonly="" value="{{Auth::user()->pegawai->unitkerja->kode}}" name="kode_unitkerja">
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
            <label for="inputName" class="col-sm-2 control-label text-right">SISA CUTI</label>
            <div class="col-sm-10">
              <select class="form-control" name="sisa_cuti" required>
                <option value="">-</option>
                @foreach ($sisacuti as $key => $item)
                    <option value="{{$key}}">{{$key}}, Sisa : {{$item}}</option>
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

          {{-- <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">BUKTI DUKUNG (optional)</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="file">
            </div>
          </div> --}}

          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Tanda Tangan</label>
            <div class="col-sm-10">
              
              <div class="wrapper-pad">
                <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                <input type="hidden" id="signed" name="signed">
              </div>
              <button type="button" id="clear" class="btn btn-danger">Clear Signature</button>
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
