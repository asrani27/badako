@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>PENGAJUAN CUTI</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      
    <form method="get" action="/admin/cuti/filter">
      <div class="col-md-2">
        <input type="date" class="form-control" name="tanggal" value="{{old('tanggal')}}" required>
      </div>
      <div class="col-md-2">
        <input type="date" class="form-control" name="tanggal2" value="{{old('tanggal2')}}" required>
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
          <form method="get" action="/admin/cuti/search">
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
            <th>N, N-1, N-2</th>
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
              N = {{$item->n == null ? 0: $item->n}}<br/>
              N-1 = {{$item->n1 == null ? 0: $item->n1}}<br/>
              N-2 = {{$item->n2 == null ? 0: $item->n2}}<br/>

              <a href="#" class="btn btn-xs btn-success modal-nsisa" data-id="{{$item->id}}" data-n="{{$item->n}}" data-n1="{{$item->n1}}" data-n2="{{$item->n2}}"><i class="fa fa-edit"></i></a>
            </td>
            <td>
              <table border="0">

                @if ($item->verifikasi_unitkerja == 'disetujui')
                <tr style="color: green">
                @else    
                <tr>
                @endif
                <td><i class="fa fa-circle"></i> &nbsp;&nbsp;</td>
                <td>Puskesmas&nbsp;&nbsp;
                </td>
                <td>: Admin {{\App\Models\UnitKerja::where('kode', $item->kode_unitkerja)->first()->nama}}</td>
              </tr>
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
                  <td>Umpeg Dinkes </td>
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

              @if ($item->verifikasi_unitkerja == null)
              
              <a href="/admin/cuti/teruskan/{{$item->id}}"
                onclick="return confirm('validasi Data');"
                class="btn btn-xs btn-flat  btn-success">verifikasi</a>
              @else    
              @endif
              
              <a href="/admin/cuti/delete/{{$item->id}}"
                      onclick="return confirm('Yakin ingin di hapus');"
                      class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
              <a href="/admin/cuti/pdf/{{$item->id}}" class="btn btn-xs btn-flat  btn-danger" target="_blank"><i class="fa fa-file"></i> PDF</a>
            </td>
            
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->

      {{$data->links()}}
    </div>
    <!-- /.box -->
    </div>
    <!-- /.col -->
</div>


<div class="modal fade" id="modal-nsisa">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/admin/cuti/nsisa" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sisa N</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                      <label>N</label>
                      <input type="text" class="form-control" id="n" name="n" required onkeypress="return hanyaAngka(event)">
                      <input type="hidden" class="form-control" id="nsisa_id" name="cuti_id" required>
                  </div>
                  <div class="form-group">
                      <label>N-1</label>
                      <input type="text" class="form-control" id="n1" name="n1" required onkeypress="return hanyaAngka(event)">
                  </div>
                  <div class="form-group">
                      <label>N-2</label>
                      <input type="text" class="form-control" id="n2" name="n2" required onkeypress="return hanyaAngka(event)">
                  </div>
                  
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i>Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>
</section>


@endsection
@push('js')
<script>
  $(document).on('click', '.modal-nsisa', function() {
     $('#nsisa_id').val($(this).data('id'));
     $('#n').val($(this).data('n'));
     $('#n1').val($(this).data('n1'));
     $('#n2').val($(this).data('n2'));
     $("#modal-nsisa").modal();
  });
</script>

@endpush
