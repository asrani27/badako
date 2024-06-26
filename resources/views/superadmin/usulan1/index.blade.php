@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
SURAT PERMOHONAN
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/usulan1" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah Data</a><br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Pengangkatan CPNS jadi PNS</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
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
                   <li> <a href="/storage/{{$item->nip}}/permohonan_cpns/{{$item2->file}}" target="_blank" style="color: blue">{{$item2->nama}}</a></li>
                @endforeach        
                </ul>
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
              

              @if ($item->verifikasi_dinkes_isi == null)
            
              <a href="/superadmin/usulan1/setuju/{{$item->id}}"
                class="btn btn-xs btn-success" data-id="{{$item->id}}">Setujui</a>
              <a href="/superadmin/usulan1/tolak/{{$item->id}}"
                onclick="return confirm('Yakin ingin di tolak');"
                class="btn btn-xs  btn-danger">Tolak</a>
                  
              @endif
              <a href="/superadmin/usulan1/delete/{{$item->id}}"
                onclick="return confirm('Yakin ingin di hapus');"
                class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a>
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
</div>
@endsection
@push('js')

@endpush
