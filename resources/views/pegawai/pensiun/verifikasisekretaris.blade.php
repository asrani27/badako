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
  <h1>PERMOHONAN CPNS JADI PNS</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      
    <a href="/pegawai/beranda" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a> <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Verifikasi CPNS</h3>

        <div class="box-tools">
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive table-bordered table-condensed">
        <table class="table table-hover">
          <tbody>
          <tr style="background-color: #a8c4f1">
            <th class="text-center">NO</th>
            <th>NIP/NAMA</th>
            <th>TGL DI AJUKAN</th>
            <th>FILE UPLOAD</th>
            <th>VERIFIKASI</th>
            <th>AKSI</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
            <td style="text-align: center">{{$key + 1}}</td>
            <td>{{checkPegawai($item->nip)}}<br/>{{$item->nip}}<br/>{{$item->pangkat->nama}} / {{$item->pangkat->golongan}}<br/>{{$item->jabatan}}<br/>{{$item->unitkerja->nama}}</td>
          
            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-M-Y')}}</td>
            <td>File</td>
            <td>
              <table>
                @if ($item->verifikasi_unitkerja == '170032' || $item->verifikasi_unitkerja == '170031' || $item->verifikasi_unitkerja == '170030' || $item->verifikasi_unitkerja == '170029')
                      
                  @else
                    @if ($item->verifikasi_unitkerja_isi == 'setuju')
                      <tr style="color: green">
                    @else    
                      <tr>
                    @endif
                      <td><i class="fa fa-circle"></i> &nbsp;&nbsp;</td>
                      <td>Puskesmas&nbsp;&nbsp;
                      </td>
                      <td>: Admin {{$item->unitkerja->nama}}</td>
                    </tr>
                @endif

                @if ($item->verifikasi_atasan_isi == 'setuju')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i> &nbsp;&nbsp;</td>
                  <td>Atasan Langsung&nbsp;&nbsp;
                  </td>
                  <td>: {{checkPegawai($item->verifikasi_atasan)}}</td>
                </tr>

                @if ($item->verifikasi_dinkes_isi == 'setuju')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Superadmin</td>
                  <td>: Dinas Kesehatan</td>
                </tr>

                @if ($item->verifikasi_sekretaris_isi == 'setuju')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Sekretaris </td>
                  <td>: {{checkPegawai($item->verifikasi_sekretaris)}}</td>
                </tr>
                @if ($item->verifikasi_kadis_isi == 'setuju')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Kadis </td>
                  <td>: {{checkPegawai($item->verifikasi_kadis)}}</td>
                </tr>
              </table>
            </td>
            
            <td>
              @if ($item->verifikasi_sekretaris_isi == null)
              <a href="/pegawai/cpns/sekretaris/setuju/{{$item->id}}"
                onclick="return confirm('Yakin ingin di hapus');"
                class="btn btn-xs  btn-success">SETUJU</a>

              <a href="/pegawai/cpns/sekretaris/tolak/{{$item->id}}"
                onclick="return confirm('Yakin ingin di hapus');"
                class="btn btn-xs  btn-danger">TIDAK SETUJU</a>
              @endif
              
            </td>
            
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
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
