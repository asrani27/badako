@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>PERMOHONAN CPNS JADI PNS</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      
    <a href="/pegawai/beranda" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a> 
    <a href="/pegawai/pengangkatan/add" class="btn btn-sm bg-purple"><i class="fa fa-plus"></i> Tambah</a> <br/><br/>
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
            <td>   
              <ul>   
              @foreach ($item->file as $key2=> $item2)
                 <li> <a href="/storage/{{$item->nip}}/permohonan_cpns/{{$item2->file}}" target="_blank" style="color: blue">{{$item2->nama}}</a>
                  <a href="/pegawai/pengangkatan/deletefile/{{$item2->id}}" class="btn btn-xs btn-danger"onclick="return confirm('Yakin ingin di hapus');"><i class="fa fa-trash"></i> </a>
                </li>
              @endforeach        
              </ul>
              <button type="button" class="btn btn-xs bg-purple modal-file" data-id="{{$item->id}}">+ Upload</button>
            </td>
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
              @if ($item->verifikasi_atasan_isi == null)
              <a href="/pegawai/pengangkatan/delete/{{$item->id}}"
                onclick="return confirm('Yakin ingin di hapus');"
                class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
              @endif

				    @if ($item->verifikasi_kadis_isi != null)
        
              <a href="/pegawai/pengangkatan/surat1/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 1. Surat Pengantar</a><br/>
              <a href="/pegawai/pengangkatan/surat2/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 2. Surat Ujikes</a><br/>
              <a href="/pegawai/pengangkatan/surat3/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 3. Nota Usul</a><br/>
              <a href="/pegawai/pengangkatan/surat4/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 4. Surat Pernyataan</a>
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
          <form role="form" method="post" action="/pegawai/pengangkatan/upload" enctype="multipart/form-data">
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