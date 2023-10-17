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
          <a href="#" class="btn btn-sm bg-purple ubahfoto">Ubah Gambar</a>

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
            @if (Auth::user()->pegawai->status_pegawai == 'PNS' || Auth::user()->pegawai->status_pegawai == 'PKKK')
                
            <div class="form-group">
              <label class="col-sm-2 control-label">Pangkat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Golongan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kelas Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Masa Kerja Golongan (Sesuai SK Pangkat Terakhir)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            @else
                
            <div class="form-group">
              <label class="col-sm-2 control-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Masa Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            @endif

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
          <h3 class="box-title">PENDIDIKAN TERAKHIR</h3>

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
          <h3 class="box-title">ALAMAT TINGGAL SEKARANG</h3>

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
                <label class="col-sm-2 control-label">No Whatsapp Aktif </label>
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
          
          @if (Auth::user()->pegawai->status_pegawai == 'PNS')
              @include('pegawai.sk.pns')
          @elseif (Auth::user()->pegawai->status_pegawai == 'PKKK')
              @include('pegawai.sk.pkkk')
          @elseif (Auth::user()->pegawai->status_pegawai == 'NON ASN')
              @include('pegawai.sk.nonasn')
          @else
              
          @endif

        </div>
      </div>
    </div>
    <!-- /.col -->
</div>
</section>

<div class="modal fade" id="modal-ubahfoto">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/pegawai/ubahfoto" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Profil Foto</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="form-control" name="foto" required>
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
  $(document).on('click', '.ubahfoto', function() {
    //$('#step1').val($(this).data('id'));
     $("#modal-ubahfoto").modal();
  });
</script>
@endpush
