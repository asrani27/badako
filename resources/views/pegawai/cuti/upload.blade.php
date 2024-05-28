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
        <h3 class="box-title">Upload Bukti Dukung</h3>
      </div>
      <div class="box-body">
        <form class="form-horizontal" action="/pegawai/cuti/buktidukung/{{$data->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Upload</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="file">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right"></label>
            <div class="col-sm-10">
              <button type="submit" class='btn btn-primary btn-block'><i class="fa fa-send"></i> Upload</button>
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
