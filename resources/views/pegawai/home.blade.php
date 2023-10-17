@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>BIODATA</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile text-center">
          <img class="profile-user-img img-responsive img-circle" src="/assets/dist/img/user4-128x128.jpg" alt="User profile picture">

          <h3 class="profile-username text-center">{{$data->nama}}</h3>

          <p class="text-muted text-center">NIP. {{$data->nip}}</p>
          <a href="" class="btn btn-sm bg-purple">Ubah Gambar</a>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      
    </div>
    <!-- /.col -->
    <div class="col-md-9">


      <!-- Profile Diri -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Status Pegawai</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/status" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit Status</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Status Pegawai</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
              </div>
            </div>
        </form>
        </div>
      </div>

      <!-- Profile Diri -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Profil Diri</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/profile" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit Profil</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->nama}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">NIP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->nip}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Unit Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->unitkerja == null ? '': $data->unitkerja->nama}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->jkel}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->tempat_lahir}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->tanggal_lahir}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->email}}">
              </div>
            </div>  
        </form>
        </div>
      </div>

      <!-- Kependudukan -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Kependudukan</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/kependudukan" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit Kependudukan</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">NIK</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->nik}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Agama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->agama}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kewarganegaraan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->kewarganegaraan}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">File KTP dan KK</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->ktp}}">
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- BPJS -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">BPJS</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/bpjs" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit BPJS</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label text-right">No bpjs</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->no_bpjs}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->kelas_bpjs}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">File BPJS </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->file_bpjs}}">
                </div>
              </div>
          </form>
        </div>
      </div>

      <!-- PENDIDIKAN -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">PENDIDIKAN</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/pendidikan" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit Pendidikan</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label text-right">Jenjang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->jenjang}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Gelar</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->gelar}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Prodi </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->prodi}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tempat Pendidikan </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->tempat_pendidikan}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tahun Lulus </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->tahun_lulus}}">
                </div>
              </div>
          </form>
        </div>
      </div>

      <!-- ALAMAT -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">ALAMAT & KONTAK</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/alamat" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit Alamat</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label text-right">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->alamat}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">RT</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->rt}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">RW </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->prodi}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kelurahan </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->kelurahan}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kecamatan </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->kecamatan}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kab/kota </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->kota}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Provinsi </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->provinsi}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode POs </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->kodepos}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telp </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->telp}}">
                </div>
              </div>
          </form>
        </div>
      </div>

      <!-- NPWP -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">NPWP</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/npwp" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit npwp</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">No NPWP </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="no_npwp" readonly value="{{$data->no_npwp}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">File NPWP </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="file_npwp" readonly value="{{$data->file_npwp}}">
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- NPWP -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">KEPEGAWAIAN</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/kepegawaian" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit Kepegawaian</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-3 control-label">Status Pegawai </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK CPNS </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK CPNS - No Dokumen </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK CPNS - Dokumen </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK CPNS - Keterangan </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SPMT </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SPMT - No Dokumen </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SPMT - Dokumen </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SPMT - Keterangan </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK PNS </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK PNS - No Dokumen </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK PNS - Dokumen </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK PNS - Keterangan </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">SK Pangkat </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK Pangkat - No Dokumen </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK Pangkat - Dokumen </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK Pangkat - Keterangan </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.col -->
</div>
</section>


@endsection
@push('js')

@endpush
