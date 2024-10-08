@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>PERMOHONAN KENAIKAN PANGKAT</h1>
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
            <th>WORD</th>
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
                <li><a href="#" class="text-blue" target="_blank">Surat Pengantar Dinkes Yg bersangkutan</a></li>
                <li><a href="#" class="text-blue" target="_blank">Surat Pernyataan Tidak Kena Hukuman</a></li>
                <li><a href="#" class="text-blue" target="_blank">Daftar Usul Mutasi Kenaikan Pangkat</a></li>
              </ul>
            </td>
            <td>
              <a href="/pegawai/pangkat/surat/{{$item->id}}/pengantar" target="_blank" style="color: black"> <i class="fa fa-file-word-o"></i></a><br/>
              <a href="/pegawai/pangkat/surat/{{$item->id}}/hukuman" target="_blank" style="color: black"> <i class="fa fa-file-word-o"></i></a><br/>
              <a href="/pegawai/pangkat/surat/{{$item->id}}/mutasi" target="_blank" style="color: black"> <i class="fa fa-file-word-o"></i></a><br/>
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

                @if ($item->verifikasi_dinkes == 'disetujui')
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
              
              @if ($item->verifikasi_unitkerja == null)
              
              <a href="/admin/pangkat/teruskan/{{$item->id}}"
                onclick="return confirm('validasi Data');"
                class="btn btn-xs btn-flat  btn-success">verifikasi</a>
              @else    
              @endif

				    @if ($item->verifikasi_kadis_isi != null)
        
              <a href="/pegawai/pangkat/surat1/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 1. Surat Pengantar</a><br/>
              <a href="/pegawai/pangkat/surat2/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 2. Surat Ujikes</a><br/>
              <a href="/pegawai/pangkat/surat3/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 3. Nota Usul</a><br/>
              <a href="/pegawai/pangkat/surat4/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 4. Surat Pernyataan</a>
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