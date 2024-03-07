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
          <li class="active"><a href="#profile" data-toggle="tab">Cuti Pegawai</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="profile">
            <form class="form-horizontal" method="post" action="/pegawai/biodata/edit/cuti">
                @csrf
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Sisa Cuti 2023</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sisacuti_2023" required value="{{$data->sisacuti_2023}}" onkeypress="return hanyaAngka(event)"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">Sisa Cuti 2024</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sisacuti_2024" required value="{{$data->sisacuti_2024}}" onkeypress="return hanyaAngka(event)"/>
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
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
  
      return false;
    return true;
  }
  </script>
@endpush
