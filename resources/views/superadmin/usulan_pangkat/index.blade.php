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
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Permohonan Kenaikan Pangkat</h3>

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
              <td style="text-align: left">{{$item->jenis}} <br /> Tanggal Pengajuan : {{\Carbon\Carbon::parse($item->tanggal)->format('d-M-Y')}}</td>
              <td>{{checkPegawai($item->nip)}}<br />{{$item->nip}}<br />{{$item->pangkat}} / {{$item->golongan}}<br />{{$item->jabatan}}<br />{{$item->unit_kerja}}</td>

              <td>
                <ul>
                  <li><a href="#" class="text-blue" target="_blank">Surat Pengantar Dinkes Yg bersangkutan</a></li>
                  <li><a href="#" class="text-blue" target="_blank">Surat Pernyataan Tidak Kena Hukuman</a></li>
                  <li><a href="#" class="text-blue" target="_blank">Daftar Usul Mutasi Kenaikan Pangkat</a></li>
                </ul>
              </td>
              <td>
                <a href="/pangkat/surat/{{$item->id}}/pengantar" target="_blank" style="color: black"> <i class="fa fa-file-word-o"></i></a><br/>
                <a href="/pangkat/surat/{{$item->id}}/hukuman" target="_blank" style="color: black"> <i class="fa fa-file-word-o"></i></a><br/>
                <a href="/pangkat/surat/{{$item->id}}/mutasi" target="_blank" style="color: black"> <i class="fa fa-file-word-o"></i></a><br/>
              </td>
              <td>
                <table>
                  @if ($item->kode_unitkerja == '170032' || $item->kode_unitkerja == '170031' || $item->kode_unitkerja == '170030' || $item->kode_unitkerja == '170029')

                  @else
                  @if ($item->verifikasi_unitkerja == 'disetujui')
                  <tr style="color: green">
                    @elseif($item->verifikasi_unitkerja == 'ditolak')
                  <tr style="color: red">
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
                    @elseif($item->verifikasi_atasan == 'ditolak')
                  <tr style="color: red">
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
                    @elseif($item->verifikasi_umpeg == 'ditolak')
                    <tr style="color: red">
                      @else
                    <tr>
                    @endif
                    <td><i class="fa fa-circle"></i></td>
                    <td>Superadmin</td>
                    <td>: Dinas Kesehatan</td>
                  </tr>

                  @if ($item->verifikasi_sekretaris == 'disetujui')
                  <tr style="color: green">
                    @elseif($item->verifikasi_sekretaris == 'ditolak')
                  <tr style="color: red">
                    @else
                  <tr>
                    @endif
                    <td><i class="fa fa-circle"></i></td>
                    <td>Sekretaris </td>
                    <td>: {{checkPegawai($item->sekretaris)}}</td>
                  </tr>
                  @if ($item->verifikasi_kadis == 'disetujui')
                  <tr style="color: green">
                    @elseif($item->verifikasi_kadis == 'ditolak')
                  <tr style="color: red">
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

                @if ($item->verifikasi_umpeg == null)

                <a href="/superadmin/pangkat/tolak/{{$item->id}}" onclick="return confirm('Yakin di tolak?');" class="btn btn-xs  btn-danger">tolak</a>
                <a href="/superadmin/pangkat/teruskan/{{$item->id}}" onclick="return confirm('validasi Data');" class="btn btn-xs  btn-success">verifikasi</a>
                @else
                @endif

                @if ($item->verifikasi_kadis_isi != null)

                <a href="/pegawai/pangkat/surat1/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 1. Surat Pengantar</a><br />
                <a href="/pegawai/pangkat/surat2/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 2. Surat Ujikes</a><br />
                <a href="/pegawai/pangkat/surat3/{{$item->id}}" class="btn btn-xs  btn-primary" target="_blank"><i class="fa fa-file"></i> 3. Nota Usul</a><br />
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
</div>
@endsection
@push('js')

@endpush
