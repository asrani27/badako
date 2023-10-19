
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
        {{-- <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}"> --}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->nomor_cpns}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->tanggal_cpns}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SK CPNS </label>
      <div class="col-sm-9">
        <a href="/storage/{{$data->nip}}/npwp/{{$data->file_cpns}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download</a>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">SPMT </label>
      <div class="col-sm-9">
        {{-- <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}"> --}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->nomor_spmt}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->tanggal_spmt}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SPMT </label>
      <div class="col-sm-9">
        <a href="/storage/{{$data->nip}}/npwp/{{$data->file_spmt}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download</a>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">SK PNS </label>
      <div class="col-sm-9">
        {{-- <input type="text" class="form-control" readonly value="{{$data->nomor}}"> --}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->nomor_pns}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->tanggal_pns}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SK PNS </label>
      <div class="col-sm-9">
        <a href="/storage/{{$data->nip}}/npwp/{{$data->file_pns}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download</a>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">SK Pangkat Terakhir</label>
      <div class="col-sm-9">
        {{-- <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}"> --}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->nomor_pangkat}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->tanggal_pangkat}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SK Pangkat Terakhir </label>
      <div class="col-sm-9">
        <a href="/storage/{{$data->nip}}/npwp/{{$data->file_pangkat}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download</a>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">SK Jafung Terakhir</label>
      <div class="col-sm-9">
        {{-- <input type="text" class="form-control" readonly value="{{$data->no}}"> --}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->nomor_jafung}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->tanggal_jafung}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SK Jafung </label>
      <div class="col-sm-9">
        <a href="/storage/{{$data->nip}}/npwp/{{$data->file_jafung}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download</a>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">Karis/karsu </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->nomor_kariskarsu}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File Karis/karsu </label>
      <div class="col-sm-9">
        <a href="/storage/{{$data->nip}}/npwp/{{$data->file_kariskarsu}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download</a>
      </div>
    </div>
  </form>
