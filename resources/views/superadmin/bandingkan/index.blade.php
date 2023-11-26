@extends('superadmin.layouts.app')
@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
@endpush
@section('content-header')
Bandingkan Data
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <form method="get" action="/superadmin/bandingkan/data">
        @csrf
        <label>Jenjang Jabatan</label>
        <select name="jenjang_jabatan" class="form-control" required>
          <option value="">-pilih-</option>
          <option value="PEMULA" {{old('jenjang_jabatan') == 'PEMULA' ? 'selected':''}}>PEMULA</option>
          <option value="TERAMPIL" {{old('jenjang_jabatan') == 'TERAMPIL' ? 'selected':''}}>TERAMPIL</option>
          <option value="MAHIR" {{old('jenjang_jabatan') == 'MAHIR' ? 'selected':''}}>MAHIR</option>
          <option value="PENYELIA" {{old('jenjang_jabatan') == 'PENYELIA' ? 'selected':''}}>PENYELIA</option>
          <option value="PELAKSANA" {{old('jenjang_jabatan') == 'PELAKSANA' ? 'selected':''}}>PELAKSANA</option>
          <option value="PELAKSANA LANJUTAN" {{old('jenjang_jabatan') == 'PELAKSANA LANJUTAN' ? 'selected':''}}>PELAKSANA LANJUTAN</option>
          <option value="AHLI PERTAMA" {{old('jenjang_jabatan') == 'AHLI PERTAMA' ? 'selected':''}}>AHLI PERTAMA</option>
          <option value="AHLI MUDA" {{old('jenjang_jabatan') == 'AHLI MUDA' ? 'selected':''}}>AHLI MUDA</option>
          <option value="AHLI MADYA" {{old('jenjang_jabatan') == 'AHLI MADYA' ? 'selected':''}}>AHLI MADYA</option>
          <option value="AHLI UTAMA" {{old('jenjang_jabatan') == 'AHLI UTAMA' ? 'selected':''}}>AHLI UTAMA</option>
        </select>
        <br/>
        <label>Jabatan</label>
        <select name="jabatan" class="form-control" required>
          <option value="">-pilih-</option>
          <option value="perawat" {{old('jabatan') == 'perawat' ? 'selected':''}}>PERAWAT</option>
          <option value="bidan" {{old('jabatan') == 'bidan' ? 'selected':''}}>BIDAN</option>
          <option value="dokter" {{old('jabatan') == 'dokter' ? 'selected':''}}>DOKTER</option>
        </select>
        <br/>
        <br/>
        <button type="submit" class="btn btn-md btn-primary btn-block">SEARCH</button>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Hasil Filter data</h3>

        <div class="box-tools">
            
        </div>
      </div>
      <!-- /.box-header -->

      
      <div class="box-body">


        <table class="table table-hover">
          <tbody>
          <tr style="background-color: #a8c4f1">
            <th class="text-center">No</th>
            <th>UNIT KERJA</th>
            <th>JUMLAH</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$key+1}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->jumlah}}</td>
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    
  </div>
</div>
@endsection
@push('js')

<!-- Select2 -->
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endpush
