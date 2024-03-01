@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

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
  <h1>PENGAJUAN CUTI</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      
    <a href="/pegawai/beranda" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a> <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Cuti</h3>

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
            <th>MULAI CUTI </th>
            <th>LAMA</th>
            <th>VERIFIKASI</th>
            <th>AKSI</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
            <td>{{$key + 1}}</td>
            <td>{{checkPegawai($item->nip)}}<br/>{{$item->nip}}</td>
            <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M Y H:i:s')}}</td>
            <td>{{\Carbon\Carbon::parse($item->mulai)->format('d M Y')}}
              s/d
              {{\Carbon\Carbon::parse($item->sampai)->format('d M Y')}}
            </td>
            <td>{{$item->lama}} Hari</td>
            <td>
              <table border="0">
                @if ($item->verifikasi_atasan == 'disetujui')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i> &nbsp;&nbsp;</td>
                  <td>Atasan Langsung&nbsp;&nbsp;
                  </td>
                  <td>: {{checkPegawai($item->atasan_langsung)}}</td>
                </tr>

                @if ($item->umpeg == 'disetujui')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Umpeg </td>
                  <td>: Administrator</td>
                </tr>

                @if ($item->verifikasi_sekretaris == 'disetujui')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Sekretaris </td>
                  <td>: {{checkPegawai($item->sekretaris)}}</td>
                </tr>
                @if ($item->verifikasi_kadis == 'disetujui')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Kadis </td>
                  <td>: {{checkPegawai($item->kepala_dinas)}}</td>
                </tr>
              </table>
            </td>
            <td>
              @if ($item->verifikasi_atasan != null && $item->umpeg != null && $item->verifikasi_sekretaris == null)
              
              <a href="/pegawai/cuti/teruskan/{{$item->id}}"
                onclick="return confirm('validasi Data');"
                class="btn btn-xs btn-flat  btn-success">verifikasi</a>
              @endif  

              @if ($item->verifikasi_atasan == null)
                  
              <a href="#"
                class="btn btn-xs btn-flat btn-success modal-verifikasi" data-id="{{$item->id}}">Setujui</a>
        <a href="/pegawai/cuti/tolak/{{$item->id}}"
                onclick="return confirm('Yakin ingin di tolak');"
                class="btn btn-xs btn-flat  btn-danger">Tolak</a>
              @else
                  
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

<div class="modal fade" id="modal-verifikasi">
  <div class="modal-dialog">
      <div class="modal-content">
          <form method="post" action="/pegawai/cuti/verifikasi/atasanlangsungsetuju" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tanda Tangan</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group text-center">
                    
                    <div id="sig"></div>
                    <br/>
                    <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                    <textarea id="signature64" class="kbw-signature" name="signed" style="display: none"></textarea>
                  </div>
                  
                      <input type="hidden" class="form-control" name="cuti_id" id="cuti_id"/>
                 
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i>
                      Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
@push('js')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script>
  $(document).on('click', '.modal-verifikasi', function() {
    $('#cuti_id').val($(this).data('id'));
     $("#modal-verifikasi").modal();
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
