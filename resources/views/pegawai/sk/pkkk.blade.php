
<form class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-3 control-label">Status Pegawai </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">SK PKKK </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">SK PKKK - No SK </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">SK PKKK - Tanggal SK </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="{{$data->sk_cpns}}">
      </div>
    </div>
</form>