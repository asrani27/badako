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
          <li class="active"><a href="#profile" data-toggle="tab">Status Pegawai</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="profile">
            <form class="form-horizontal" method="post" action="/pegawai/biodata/edit/status">
                @csrf
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Status Pegawai</label>
                  <div class="col-sm-10">
                    <select name="status_pegawai" class="form-control" required>
                      <option value="">-pilih-</option>
                      <option value="PNS" {{$data->status_pegawai == 'PNS' ? 'selected':''}}>PNS</option>
                      <option value="PPPK" {{$data->status_pegawai == 'PPPK' ? 'selected':''}}>PPPK</option>
                      <option value="NON ASN" {{$data->status_pegawai == 'NON ASN' ? 'selected':''}}>NON ASN</option>
                    </select>
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
