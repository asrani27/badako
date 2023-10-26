
<form class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-3 control-label">Status Pegawai </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">SK NON ASN (Jika Ada) </label>
      <div class="col-sm-9">
        {{-- <input type="text" class="form-control" readonly> --}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor SK </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal SK </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">File SK </label>
      <div class="col-sm-9">
        <a href="/storage/{{Auth::user()->pegawai->nip}}/kepegawaian/{{Auth::user()->pegawai->file_nonasn}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download SK</a>
      </div>
    </div>
</form>