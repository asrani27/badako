@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>PERMOHONAN PENSIUN</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      
    {{-- <a href="/pegawai/beranda" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a> 
    <a href="/pegawai/pensiun/add" class="btn btn-sm bg-purple"><i class="fa fa-plus"></i> Tambah</a> <br/><br/> --}}
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data</h3>

        <div class="box-tools">
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive table-bordered table-condensed">
        <table class="table table-hover">
          <tbody>
          <tr style="background-color: #a8c4f1">
            <th class="text-center">NO</th>
            <th>JENIS</th>
            <th>NIP/NAMA</th>
            <th>SURAT-SURAT</th>
            <th>VERIFIKASI</th>
            <th>AKSI</th>
          </tr>
          @foreach ($data as $key => $item)

          <tr>
            <td style="text-align: center">{{$key + 1}}</td>
            <td style="text-align: left">{{$item->jenis}} <br/> Tanggal Pengajuan : {{\Carbon\Carbon::parse($item->tanggal)->format('d-M-Y')}}</td>
            <td>{{checkPegawai($item->nip)}}<br/>{{$item->nip}}<br/>{{$item->pangkat}} / {{$item->golongan}}<br/>{{$item->jabatan}}<br/>{{$item->unit_kerja}}</td>
          
            <td>
              <ul>
                <li><a href="/pensiun/surat/{{$item->id}}/permohonan" class="text-blue" target="_blank">Surat Pemohonan Yg bersangkutan</a></li>
                <li><a href="/pensiun/surat/{{$item->id}}/pidana" class="text-blue" target="_blank">Surat Pernyataan Tidak Pidana</a></li>
                <li><a href="/pensiun/surat/{{$item->id}}/hukuman" class="text-blue" target="_blank">Surat Pernyataan Tidak Kena Hukuman</a></li>
                <li><a href="/pensiun/surat/{{$item->id}}/skpd" class="text-blue" target="_blank">Surat Pemohonan SKPD</a></li>
              </ul>
            </td>
            <td>
              <table>
                @if ($item->verifikasi_unitkerja == '170032' || $item->verifikasi_unitkerja == '170031' || $item->verifikasi_unitkerja == '170030' || $item->verifikasi_unitkerja == '170029')
                      
                  @else
                    @if ($item->verifikasi_unitkerja == 'disetujui')
                      <tr style="color: green">
                    @else    
                      <tr>
                    @endif
                      <td><i class="fa fa-circle"></i> &nbsp;&nbsp;</td>
                      <td>Puskesmas&nbsp;&nbsp;
                      </td>
                      <td>: Admin {{$item->unit_kerja}}</td>
                    </tr>
                @endif

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

                @if ($item->verifikasi_umpeg == 'disetujui')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Superadmin</td>
                  <td>: Dinas Kesehatan</td>
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
                  <td>: {{checkPegawai($item->kadis)}}</td>
                </tr>
              </table>
            </td>
            
            <td>
              @if ($item->verifikasi_sekretaris == null)
              <a href="/pegawai/pensiun/verifikasi_sekretaris/{{$item->id}}"
                onclick="return confirm('validasi Data');"
                class="btn btn-xs btn-flat  btn-success">verifikasi</a>
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

<div class="modal fade" id="modal-file">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/pegawai/pensiun/upload" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Upload File</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" class="form-control" name="nama" required>
                      <input type="hidden" class="form-control" id="permohonan_cpns_id" name="permohonan_cpns_id" required>
                  </div>
                  <div class="form-group">
                      <label>File</label>
                      <input type="file" class="form-control" name="file" required>
                  </div>
                  
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-upload"></i>Upload</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
@push('js')
<script>
  $(document).on('click', '.modal-file', function() {
    $('#permohonan_cpns_id').val($(this).data('id'));
     $("#modal-file").modal();
  });
</script>
@endpush