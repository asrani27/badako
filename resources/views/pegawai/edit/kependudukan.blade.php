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
          <li class="active"><a href="#kependudukan" data-toggle="tab">Kependudukan</a></li>
        </ul>
        <div class="tab-content">
            
          <div class="active tab-pane" id="kependudukan">
            <form class="form-horizontal" method="post" action="/pegawai/biodata/edit/kependudukan">
                @csrf
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nik" required value="{{$data->nik}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="agama" required value="{{$data->agama}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kewarganegaraan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kewarganegaraan" required value="{{$data->kewarganegaraan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload KTP</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_ktp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload KK</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_kk">
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
