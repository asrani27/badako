@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="/assets/signature/css/jquery.signature.css">

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
@endpush
@section('content')
<section class="content-header">
    <h1>TTD Cuti</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Tanda Tangan</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" action="/pegawai/cuti/setujuiatasan/{{$data->id}}" method="post">
            @csrf
            <div class="form-group">
              <div class="col-sm-12">
                <div class="wrapper-pad">
                  <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                  <input type="hidden" id="signed" name="signed">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2 text-center">
                <button type="button" id="clear" class="btn btn-danger btn-block">Clear Signature</button>
                <button type="submit" class='btn btn-primary btn-block' onclick="return confirm('Yakin data anda sudah benar?');"><i class="fa fa-send"></i> SIMPAN</button>
                <a href="/pegawai/cuti/verifikasi" class='btn btn-primary btn-block'><i class="fa fa-arrow-left"></i> KEMBALI</a>
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
<script type="text/javascript" src="/assets/signature/js/jquery.signature.js"></script>
<script>
  $(document).on('click', '.modal-verifikasi', function() {
    $('#cuti_id').val($(this).data('id'));
     $("#modal-verifikasi").modal();
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
