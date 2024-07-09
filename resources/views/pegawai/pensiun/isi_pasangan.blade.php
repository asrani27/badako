@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
  

<style>
  .wrapper-pad {
  position: relative;
  width: 300px;
  height: 200px;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.signature-pad {
  position: absolute;
  left: 0;
  top: 0;
  width:300px;
  height:200px;
  background-color: white;
  border: 2px solid black;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
@endpush
@section('content')
<section class="content-header">
  <h1>Data Pasangan Dan Anak</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Isi Data Pasangan</h3>
      </div>
      <div class="box-body">
        <form class="form-horizontal" action="/pegawai/pensiun/surat/{{$id}}/isipasangan" method="post" enctype="multipart/form-data">
          @csrf
          
          
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Nama Pasangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" value="{{$data == null ? '': $data->nama}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Tempat Lahir</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tempat_lahir" value="{{$data == null ? '': $data->tempat_lahir}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Tanggal Lahir</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal_lahir" value="{{$data == null ? '': $data->tanggal_lahir}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Tanggal Kawin</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal_kawin" value="{{$data == null ? '': $data->tanggal_kawin}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="keterangan" value="{{$data == null ? '': $data->keterangan}}">
            </div>
          </div>
          
          
          
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label text-right"></label>
            <div class="col-sm-10">
              <button type="submit" class='btn btn-primary btn-block' onclick="return confirm('Yakin data anda sudah benar?');"><i class="fa fa-save"></i> SIMPAN</button>
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>

    <div class="col-md-12">
        <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Isi Data Anak</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" action="/pegawai/pensiun/surat/{{$id}}/anak1" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label text-right">Anak Ke 1</label>
                <div class="col-sm-10">
                    
                </div>
              </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Nama Anak</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tempat_lahir">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="tempat_lahir">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Jenis</label>
              <div class="col-sm-10">
                <select name="jenis" class="form-control" required>
                    <option value="">-</option>
                    <option value="AK">AK</option>
                    <option value="AT">AT</option>
                    <option value="AA">AA</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Nama Ortu</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_ortu">
              </div>
            </div>
            
            
            
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right"></label>
              <div class="col-sm-10">
                <button type="submit" class='btn btn-primary btn-block' onclick="return confirm('Yakin data anda sudah benar?');"><i class="fa fa-save"></i> SIMPAN</button>
              </div>
            </div>
          </form>
        </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Isi Data Anak</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="/pegawai/pensiun/surat/{{$id}}/anak2" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label text-right">Anak Ke 2</label>
                    <div class="col-sm-10">
                        
                    </div>
                  </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Nama Anak</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_lahir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tempat_lahir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Jenis</label>
                  <div class="col-sm-10">
                    <select name="jenis" class="form-control" required>
                        <option value="">-</option>
                        <option value="AK">AK</option>
                        <option value="AT">AT</option>
                        <option value="AA">AA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Nama Ortu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_ortu">
                  </div>
                </div>
                
                
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right"></label>
                  <div class="col-sm-10">
                    <button type="submit" class='btn btn-primary btn-block' onclick="return confirm('Yakin data anda sudah benar?');"><i class="fa fa-save"></i> SIMPAN</button>
                  </div>
                </div>
              </form>
        </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Isi Data Anak</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="/pegawai/pensiun/surat/{{$id}}/anak3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label text-right">Anak Ke 3</label>
                    <div class="col-sm-10">
                        
                    </div>
                  </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Nama Anak</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_lahir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tempat_lahir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Jenis</label>
                  <div class="col-sm-10">
                    <select name="jenis" class="form-control" required>
                        <option value="">-</option>
                        <option value="AK">AK</option>
                        <option value="AT">AT</option>
                        <option value="AA">AA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Nama Ortu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_ortu">
                  </div>
                </div>
                
                
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right"></label>
                  <div class="col-sm-10">
                    <button type="submit" class='btn btn-primary btn-block' onclick="return confirm('Yakin data anda sudah benar?');"><i class="fa fa-save"></i> SIMPAN</button>
                  </div>
                </div>
              </form>
        </div>
        </div>
    </div>
    <!-- /.col -->
  </div>
</section>


@endsection
@push('js')
 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   });
</script>



@endpush
