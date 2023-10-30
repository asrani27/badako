
<form class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-3 control-label">Status Pegawai </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">SK Pengangkatan </label>
      <div class="col-sm-9">
        {{-- <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}"> --}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->nomor_pengangkatan}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->tanggal_pengangkatan}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SK Pengangkatan </label>
      <div class="col-sm-9">
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_pengangkatan}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download File</a>
      </div>
    </div>

    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">Surat Perjanjian Kerja </label>
      <div class="col-sm-9">
        
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="nomor_spk" readonly value="{{$data->nomor_spk}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="date" class="form-control" name="tanggal_spk" readonly value="{{$data->tanggal_spk}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File Surat Perjanjian Kerja (PDF, Maks 2MB) </label>
      <div class="col-sm-9">
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_spk}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download File</a>
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
        <input type="text" class="form-control" name="nomor_spmt" readonly value="{{$data->nomor_spmt}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="date" class="form-control" name="tanggal_spmt" readonly value="{{$data->tanggal_spmt}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SPMT (PDF, Maks 2MB) </label>
      <div class="col-sm-9">
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_spmt}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download File</a>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">Surat Tanda Registrasi (Jika Ada) </label>
      <div class="col-sm-9">
        
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="nomor_str" readonly value="{{$data->nomor_str}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="date" class="form-control" name="tanggal_str" readonly value="{{$data->tanggal_str}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File STR (PDF, Maks 2MB) </label>
      <div class="col-sm-9">
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_str}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download File</a>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="col-sm-3 control-label">Surat Izin Praktek (Jika Ada) </label>
      <div class="col-sm-9">
        
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="nomor_sip" readonly value="{{$data->nomor_sip}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal </label>
      <div class="col-sm-9">
        <input type="date" class="form-control" name="tanggal_sip" readonly value="{{$data->tanggal_sip}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SIP (PDF, Maks 2MB) </label>
      <div class="col-sm-9">
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_sip}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download File</a>
      </div>
    </div>
</form>