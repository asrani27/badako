@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>EDIT DATA</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#bpjs" data-toggle="tab">Pendidikan</a></li>
        </ul>
        <div class="tab-content">
            
          <div class="active tab-pane" id="kependudukan">
            <form class="form-horizontal" method="post" action="/pegawai/biodata/edit/pendidikan">
                @csrf
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenjang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenjang" required value="{{$data->jenjang}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Gelar</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gelar" required value="{{$data->gelar}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Prodi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="prodi" required value="{{$data->prodi}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Pendidikan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_pendidikan" required value="{{$data->tempat_pendidikan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tahun Lulus</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tahun_lulus" required value="{{$data->tahun_lulus}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">File Ijazah</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_ijazah" required >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">File Transkrip</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_transkrip" >
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

@endpush
