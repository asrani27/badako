@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
DETAIL PEGAWAI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/beranda" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Detail Pegawai</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label {{$data->status_pegawai == null ? 'text-red':''}}">Status Pegawai</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nip" value="{{$data->status_pegawai}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label {{$data->nip == null ? 'text-red':''}}">NIP</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nip" value="{{$data->nip}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->nama == null ? 'text-red':''}}">Nama</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->unitkerja_id == null ? 'text-red':''}}">Unit Kerja</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->unitkerja_id}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->jkel == null ? 'text-red':''}}">Jkel</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->jkel}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->tempat_lahir == null ? 'text-red':''}}">tempat_lahir</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->tempat_lahir}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->tanggal_lahir == null ? 'text-red':''}}">tanggal_lahir</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->tanggal_lahir}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->email == null ? 'text-red':''}}">email</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->email}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->jabatan == null ? 'text-red':''}}">jabatan</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->jabatan}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->mkg == null ? 'text-red':''}}">mkg</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->mkg}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->rekening == null ? 'text-red':''}}">rekening</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->rekening}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->file_rekening == null ? 'text-red':''}}">file_rekening</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->file_rekening}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->nik == null ? 'text-red':''}}">nik</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->nik}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->agama == null ? 'text-red':''}}">agama</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->agama}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->kewarganegaraan == null ? 'text-red':''}}">kewarganegaraan</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->kewarganegaraan}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->file_ktp == null ? 'text-red':''}}">file_ktp</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->file_ktp}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->file_kk == null ? 'text-red':''}}">file_kk</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->file_kk}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->no_bpjs == null ? 'text-red':''}}">no_bpjs</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->no_bpjs}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->kelas_bpjs == null ? 'text-red':''}}">kelas_bpjs</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->kelas_bpjs}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->file_bpjs == null ? 'text-red':''}}">file_bpjs</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->file_bpjs}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->jenjang_pendidikan == null ? 'text-red':''}}">jenjang_pendidikan</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->jenjang_pendidikan}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->gelar == null ? 'text-red':''}}">gelar</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->gelar}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->prodi == null ? 'text-red':''}}">prodi</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->prodi}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->tempat_pendidikan == null ? 'text-red':''}}">tempat_pendidikan</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->tempat_pendidikan}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->tahun_lulus == null ? 'text-red':''}}">tahun_lulus</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->tahun_lulus}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->file_ijazah == null ? 'text-red':''}}">file_ijazah</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->file_ijazah}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->file_transkrip == null ? 'text-red':''}}">file_transkrip</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->file_transkrip}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->provinsi == null ? 'text-red':''}}">provinsi</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->provinsi}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->kota == null ? 'text-red':''}}">kota</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->kota}}">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->kecamatan == null ? 'text-red':''}}">kecamatan</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->kecamatan}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->kelurahan == null ? 'text-red':''}}">kelurahan</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->kelurahan}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->rt == null ? 'text-red':''}}">rt</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->rt}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->rw == null ? 'text-red':''}}">rw</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->rw}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->alamat == null ? 'text-red':''}}">alamat</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->alamat}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->kodepos == null ? 'text-red':''}}">kodepos</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->kodepos}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->telp == null ? 'text-red':''}}">telp</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->telp}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->no_npwp == null ? 'text-red':''}}">no_npwp</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->no_npwp}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label {{$data->file_npwp == null ? 'text-red':''}}">file_npwp</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data->file_npwp}}">
            </div>
          </div>
        </div>
        
        
      </form>
      
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    
  </div>
</div>
@endsection
@push('js')

@endpush
