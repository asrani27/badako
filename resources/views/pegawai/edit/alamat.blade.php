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
                      <option value="Y" {{$data->sesuai_ktp == 'Y' ? 'selected':''}}>Ya</option>
                      <option value="T" {{$data->sesuai_ktp == 'T' ? 'selected':''}}>Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-10">
                    <select id="provinsi" class="form-control form-control-sm" name="provinsi">
                      <option value=""> Pilih Provinsi</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kota</label>
                  <div class="col-sm-10">
                    <select id="kota" class="form-control form-control-sm" name="kota">
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <select id="kecamatan" class="form-control form-control-sm" name="kecamatan">
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kelurahan</label>
                  <div class="col-sm-10">
                    <select id="kelurahan" class="form-control form-control-sm" name="kelurahan">
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
                  <label class="col-sm-2 control-label">Kode POS</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kodepos" required value="{{$data->kodepos}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No WhatsApp Aktif</label>
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

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function(){
  
  data = {!!json_encode($data)!!}
  
  axios({
    method: 'get',
    url: 'http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.provinsi){
        $("#provinsi").append('<option value="' + JSON.parse(response.data)[i].id + '" selected>' + JSON.parse(response.data)[i].name + '</option>');
      }else{
        $("#provinsi").append('<option value="' + JSON.parse(response.data)[i].id + '">' + JSON.parse(response.data)[i].name + '</option>');
      }
    }
  });

  //kota
  axios({
    method: 'get',
    url: 'http://www.emsifa.com/api-wilayah-indonesia/api/regencies/'+data.provinsi+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kota){
        $("#kota").append('<option value="' + JSON.parse(response.data)[i].id + '" selected>' + JSON.parse(response.data)[i].name + '</option>');
      }else{
        $("#kota").append('<option value="' + JSON.parse(response.data)[i].id + '">' + JSON.parse(response.data)[i].name + '</option>');
      }
    }
  });
  //kecamatan
  axios({
    method: 'get',
    url: 'http://www.emsifa.com/api-wilayah-indonesia/api/districts/'+data.kota+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kecamatan){
        $("#kecamatan").append('<option value="' + JSON.parse(response.data)[i].id + '" selected>' + JSON.parse(response.data)[i].name + '</option>');
      }else{
        $("#kecamatan").append('<option value="' + JSON.parse(response.data)[i].id + '">' + JSON.parse(response.data)[i].name + '</option>');
      }
    }
  });

  //kelurahan
  axios({
    method: 'get',
    url: 'http://www.emsifa.com/api-wilayah-indonesia/api/villages/'+data.kecamatan+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kelurahan){
        $("#kelurahan").append('<option value="' + JSON.parse(response.data)[i].id + '" selected>' + JSON.parse(response.data)[i].name + '</option>');
      }else{
        $("#kelurahan").append('<option value="' + JSON.parse(response.data)[i].id + '">' + JSON.parse(response.data)[i].name + '</option>');
      }
    }
  });
  //change provinsi
  $("#provinsi").change(function(){
  var id_prov = $("#provinsi").val(); 
  console.log(id_prov)
  axios({
    method: 'get',
    url: 'http://www.emsifa.com/api-wilayah-indonesia/api/regencies/'+id_prov+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    $("#kota").html('');
    $("#kecamatan").html('');
    $("#kelurahan").html('');
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      $("#kota").append('<option value="' + JSON.parse(response.data)[i].id + '">' + JSON.parse(response.data)[i].name + '</option>');
    }
  });
  })

  //change kota
  $("#kota").change(function(){
  var id_kota = $("#kota").val(); 
  console.log(id_kota)
  axios({
    method: 'get',
    url: 'http://www.emsifa.com/api-wilayah-indonesia/api/districts/'+id_kota+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    $("#kecamatan").html('');
    $("#kelurahan").html('');
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      $("#kecamatan").append('<option value="' + JSON.parse(response.data)[i].id + '">' + JSON.parse(response.data)[i].name + '</option>');
    }
  });
  })


  //change kota
  $("#kecamatan").change(function(){
  var id_kecamatan = $("#kecamatan").val(); 
  console.log(id_kecamatan)
  axios({
    method: 'get',
    url: 'http://www.emsifa.com/api-wilayah-indonesia/api/villages/'+id_kecamatan+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    $("#kelurahan").html('');
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      $("#kelurahan").append('<option value="' + JSON.parse(response.data)[i].id + '">' + JSON.parse(response.data)[i].name + '</option>');
    }
  });
  })
})
</script>
@endpush
