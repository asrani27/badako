@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>PENGAJUAN CUTI</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-1">
        
      <a href="/superadmin/beranda" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>
      <form method="get" action="/superadmin/cuti/filter">
      <div class="col-md-2">
        @csrf
        <select class="form-control" name="kode_unitkerja">
          <option value="">Semua Unit Kerja</option>
          @foreach ($unitkerja as $item)
              <option value="{{$item->kode}}" {{old('kode_unitkerja') == $item->kode ? 'selected':''}}>{{$item->nama}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <input type="date" class="form-control" name="tanggal" value="{{old('tanggal')}}" required>
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-sm btn-primary" value="cari" name="button"><i class="fa fa-search"></i></button>
        <button type="submit" class="btn btn-sm btn-primary" value="cetak" name="button"><i class="fa fa-file-excel-o"></i></button>
      </div>
      </form>
    
    
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Cuti</h3>

        
        <div class="box-tools">
          <form method="get" action="/superadmin/cuti/search">
          @csrf
          <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
            <input type="text" name="search" class="form-control pull-right" value="{{old('search')}}" placeholder="Cari NIP/NIK/Nama" required>

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
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
            <td>{{$data->firstItem() + $key}}</td>
            <td>{{checkPegawai($item->nip)}}<br/>{{$item->nip}}<br/>{{$item->unit_kerja}}</td>
            <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M Y H:i:s')}}</td>
            <td>{{\Carbon\Carbon::parse($item->mulai)->format('d M Y')}}
              s/d
              {{\Carbon\Carbon::parse($item->sampai)->format('d M Y')}}
            </td>
            <td>{{$item->lama}} Hari
              <a href="#" class="btn btn-xs btn-success modal-edit" data-id="{{$item->id}}" data-lama="{{$item->lama}}"><i class="fa fa-edit"></i></a>
            </td>
            <td>
              <table border="0">
                @if ($item->kode_unitkerja == '170032' || $item->kode_unitkerja == '170031' || $item->kode_unitkerja == '170030' || $item->kode_unitkerja == '170029')
                    
                @else
                  @if ($item->verifikasi_unitkerja == 'disetujui')
                  <tr style="color: green">
                  @else    
                  <tr style="color: red">
                  @endif
                    <td><i class="fa fa-circle"></i> &nbsp;&nbsp;</td>
                    <td>Puskesmas&nbsp;&nbsp;
                    </td>
                    <td>: Admin {{\App\Models\UnitKerja::where('kode', $item->kode_unitkerja)->first()->nama}}</td>
                  </tr>
                @endif
                @if ($item->verifikasi_atasan == 'disetujui')
                <tr style="color: green">
                @else    
                <tr style="color: red">
                @endif
                  <td><i class="fa fa-circle"></i> &nbsp;&nbsp;</td>
                  <td>Atasan Langsung&nbsp;&nbsp;
                  </td>
                  <td>: {{checkPegawai($item->atasan_langsung)}}</td>
                </tr>

                @if ($item->umpeg == 'disetujui')
                <tr style="color: green">
                @else    
                <tr style="color: red">
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Umpeg </td>
                  <td>: Administrator</td>
                </tr>

                @if ($item->verifikasi_sekretaris == 'disetujui')
                <tr style="color: green">
                @else    
                <tr style="color: red">
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Sekretaris </td>
                  <td>: {{checkPegawai($item->sekretaris)}}</td>
                </tr>
                @if ($item->verifikasi_kadis == 'disetujui')
                <tr style="color: green">
                @else    
                <tr style="color: red">
                @endif
                  <td><i class="fa fa-circle"></i></td>
                  <td>Kadis </td>
                  <td>: {{checkPegawai($item->kepala_dinas)}}</td>
                </tr>
              </table>
            </td>
            
            <td>

              @if ($item->verifikasi_atasan != null && $item->umpeg == null)
              
              <a href="/superadmin/cuti/teruskan/{{$item->id}}"
                onclick="return confirm('validasi Data');"
                class="btn btn-xs btn-flat  btn-success">verifikasi</a>
              @else    
              @endif
              
              <a href="/superadmin/cuti/delete/{{$item->id}}"
                      onclick="return confirm('Yakin ingin di hapus');"
                      class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
              <a href="/superadmin/cuti/pdf/{{$item->id}}" class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-file"></i> PDF</a>
            </td>
            
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    {{$data->links()}}
    <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
</section>

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/superadmin/cuti/lama" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lama Cuti</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                      <label>Lama</label>
                      <input type="text" class="form-control" id="lama" name="lama" required onkeypress="return hanyaAngka(event)">
                      <input type="hidden" class="form-control" id="cuti_id" name="cuti_id" required>
                  </div>
                  
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i>Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
@push('js')
<script>
  $(document).on('click', '.modal-edit', function() {
     $('#cuti_id').val($(this).data('id'));
     $('#lama').val($(this).data('lama'));
     $("#modal-edit").modal();
  });
</script>

<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>
@endpush
