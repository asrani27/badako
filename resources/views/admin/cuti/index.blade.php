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
      
    <a href="/superadmin/beranda" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a> <br/><br/>
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
              {{-- <a href="/superadmin/cuti/pdf/{{$item->id}}" class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-file"></i> PDF</a> --}}
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
</section>


@endsection
@push('js')

@endpush
