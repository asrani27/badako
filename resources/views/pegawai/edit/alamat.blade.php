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
          <li class="active"><a href="#bpjs" data-toggle="tab">ALAMAT</a></li>
        </ul>
        <div class="tab-content">
            
          <div class="active tab-pane" id="kependudukan">
            <form class="form-horizontal" method="post" action="/pegawai/biodata/edit/alamat">
                @csrf
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <h4 class="text-bold">ALAMAT TINGGAL SEKARANG </h4>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Sesuai KTP?</label>
                  <div class="col-sm-10">
                    <select name="sesuai_ktp" required class="form-control">
                      <option value="">-pilih-</option>
                      <option value="Y">Ya</option>
                      <option value="T">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" required value="{{$data->alamat}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">RT</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="rt" required value="{{$data->rt}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">RW</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="rw" required value="{{$data->rw}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kelurahan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kelurahan" required value="{{$data->kelurahan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kecamatan" required value="{{$data->kecamatan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kota" required value="{{$data->kota}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="provinsi" required value="{{$data->provinsi}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kode POS</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kodepos" required value="{{$data->kodepos}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="telp" required value="{{$data->telp}}">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
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
