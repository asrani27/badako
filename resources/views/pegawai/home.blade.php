@extends('layouts.app')
@push('css')
<style>
  .btn-floating {
      position: fixed;
      right: 25px;
      overflow: hidden;
      width: 100px;
      height: 50px;
      border-radius: 100px;
      border: 0;
      z-index: 9999;
      color: white;
      transition: .2s;
  }
  
  .btn-floating:hover {
      width: auto;
      padding: 0 20px;
      cursor: pointer;
  }
  
  .btn-floating span {
      font-size: 16px;
      margin-left: 5px;
      transition: .2s;
      line-height: 0px;
      display: none;
  }
  
  .btn-floating:hover span {
      display: inline-block;
  }
  
  .btn-floating:hover img {
      margin-bottom: -3px;
  }
  
  .btn-floating.whatsapp {
      bottom: 25px;
      background-color: #34af23;
      border: 2px solid #fff;
  }
  
  .btn-floating.whatsapp:hover {
      background-color: #1f7a12;
  }
      </style>
@endpush
@section('content')
<section class="content-header">
  <h1>BIODATA</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile text-center">
          @if (Auth::user()->pegawai->foto == null)
              
          <img class="profile-user-img img-responsive img-circle" src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" alt="User profile picture">
          @else
          <img class="profile-user-img img-responsive img-circle" src="/storage/{{Auth::user()->pegawai->nip}}/foto/compress/{{Auth::user()->pegawai->foto}}" alt="User profile picture">
          @endif

          <h3 class="profile-username text-center">{{$data->nama}}</h3>

          <p class="text-muted text-center">NIP. {{$data->nip}}</p>
          <a href="#" class="btn btn-sm bg-blue-gradient ubahfoto">Ubah Gambar</a>

        </div>
        <!-- /.box-body -->
      </div>

      <a href="/pegawai/cuti" class="btn btn-block btn-primary text-bold"><i class="fa fa-file"></i>  PENGAJUAN CUTI</a><br/>
      <a href="/pegawai/cuti/verifikasi" class="btn btn-block btn-primary text-bold"><i class="fa fa-file"></i>  VERIFIKASI CUTI SBG ATASAN</a><br/>
      <!-- /.box -->
      
    </div>
    <!-- /.col -->
    <div class="col-md-9">


      <!-- Profile Diri -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Status Pegawai</h3>

          <div class="box-tools pull-right">
            <a href="/pegawai/biodata/edit/status" class="btn btn-xs bg-red-gradient"><i class="fa fa-edit"></i> Edit Status</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Status Pegawai</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
              </div>
            </div>
        </form>
        </div>
      </div>

      @if (Auth::user()->pegawai->status_pegawai == 'PNS')
      @include('pegawai.jenis.pns')
      @endif

      @if (Auth::user()->pegawai->status_pegawai == 'PPPK')
      @include('pegawai.jenis.pppk')
      @endif

      @if (Auth::user()->pegawai->status_pegawai == 'NON ASN')
      @include('pegawai.jenis.nonasn')
      @endif
      

    </div>
    <!-- /.col -->
</div>
</section>

<div class="modal fade" id="modal-ubahfoto">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/pegawai/ubahfoto" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Profil Foto</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="form-control" name="foto" required>
                  </div>
                  
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i>Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>

<a href="https://api.whatsapp.com/send?phone={{$aduan == null ? '0000': $aduan->nomor}}" target="_blank">
  <button class="btn-floating whatsapp">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/WhatsApp_icon.png/598px-WhatsApp_icon.png" width="30px" alt="whatsApp">ADUAN
      <span>{{$aduan == null ? '0000': $aduan->nomor}}</span>
  </button>
</a>
@endsection
@push('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function(){
  
  data = {!!json_encode($data)!!}
  
  axios({
    method: 'get',
    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.provinsi){
        $("#provinsi").val(JSON.parse(response.data)[i].name);
      }
    }
  });

  axios({
    method: 'get',
    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/'+data.provinsi+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kota){
        $("#kota").val(JSON.parse(response.data)[i].name);
      }
    }
  });

  axios({
    method: 'get',
    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/'+data.kota+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kecamatan){
        $("#kecamatan").val(JSON.parse(response.data)[i].name);
      }
    }
  });

  axios({
    method: 'get',
    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/villages/'+data.kecamatan+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kelurahan){
        $("#kelurahan").val(JSON.parse(response.data)[i].name);
      }
    }
  });
})
</script>

<script>
  $(document).on('click', '.ubahfoto', function() {
    //$('#step1').val($(this).data('id'));
     $("#modal-ubahfoto").modal();
  });
</script>
@endpush
