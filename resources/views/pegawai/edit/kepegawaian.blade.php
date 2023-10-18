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
          <li class="active"><a href="#kependudukan" data-toggle="tab">Kepegawaian</a></li>
        </ul>
        <div class="tab-content">
            
          <div class="active tab-pane" id="kependudukan">
            
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
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_sk_cpns" value="{{$data->nomor_sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_sk_cpns" value="{{$data->tanggal_sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK CPNS </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_sk_cpns">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SPMT </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SPMT </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmts">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK PNS </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_sk_pns" value="{{$data->sk_pns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_sk_pns" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK PNS </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_sk_pns">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK Pangkat Terakhir</label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_sk_pangkat" value="{{$data->nomor_sk_pangkat}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_sk_pangkat" value="{{$data->tanggal_sk_pangkat}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK Pangkat Terakhir </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_sk_pangkat">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK Jafung Terakhir</label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK Jafung </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->sk_cpns}}">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor Karis/karsu </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->sk_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File Karis/karsu </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->sk_cpns}}">
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
