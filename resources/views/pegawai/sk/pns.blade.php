
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
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_cpns}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download SK CPNS</a>
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
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_spmt}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download SPMT</a>
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
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_pns}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download SK PNS</a>
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
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_pangkat}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download Pangkat</a>
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
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_jafung}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download Jafung</a>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor Karis/karsu </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->nomor_kariskarsu}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File Karis/karsu </label>
      <div class="col-sm-9">
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_kariskarsu}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download Karis/Karsu</a>
      </div>
    </div>
  </form>
