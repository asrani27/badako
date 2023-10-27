@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>EDIT DATA</h1>
</section>
<section class="content">
  <div class="row">
    <!-- /.col -->
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#profile" data-toggle="tab">Profile Diri</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="profile">
            <form class="form-horizontal" method="post" action="/pegawai/biodata/edit/profile" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nip" readonly value="{{$data->nip}}">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Unit Kerja</label>
                  <div class="col-sm-10">
                    <select name="unitkerja_id" class="form-control" required>
                        <option value="">-pilih-</option>
                        @foreach ($unitkerja as $item)
                        <option value="{{$item->id}}" {{$data->unitkerja_id == $item->id ? 'selected':''}}>{{$item->nama}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pekerjaan/Profesi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jabatan" required value="{{$data->jabatan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Masa Kerja</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mkg" required value="{{$data->mkg}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select name="jkel" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="L" {{$data->jkel == 'L' ? 'selected':''}}>Laki-laki</option>
                        <option value="P" {{$data->jkel == 'P' ? 'selected':''}}>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_lahir" value="{{$data->tempat_lahir}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Rekening Bank Kalsel</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="rekening" value="{{$data->rekening}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload Foto Buku rek Bank Kalsel</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_rekening">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-block bg-purple"><i class="fa fa-save"></i> SIMPAN</button>
                    <a href="/pegawai/beranda" class="btn btn-block btn-danger"><i class="fa fa-arrow-left"></i> KEMBALI</a>
                  </div>
                </div>
            </form>
          </div>
          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
</section>


@endsection
@push('js')
<script>
  $(document).ready(function() {
    jenisJabatan = {!!json_encode($data->jenis_jabatan)!!}
    if(jenisJabatan != 'JFT'){
      $('#jenjang_jabatan').attr('disabled', 'disabled');
    }else{
      $('#jenjang_jabatan').removeAttr('disabled');
    }
});


  $('.jenisjabatan').change(function(){ 
    var valJenis = $('#jenis_jabatan').find(":selected").val();
    if(valJenis != 'JFT'){
      $('#jenjang_jabatan').attr('disabled', 'disabled');
    }else{
      $('#jenjang_jabatan').removeAttr('disabled');
    }
    console.log(valJenis);
  });
  </script>
@endpush
