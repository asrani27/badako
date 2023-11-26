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
        <input type="text" class="form-control" name="jabatan" value="{{old('jabatan')}}">
        <br/>
        <label>Unit Kerja</label>
        
        <select class="form-control select2" name="unitkerja_id[]" multiple="multiple" data-placeholder="Select a State"
                style="width: 100%;">
                @foreach ($uk as $item)
                    <option value="{{$item->id}}" {{$oldunitkerja->contains($item->id) == true ? 'selected':''}}>{{$item->nama}}</option>
                @endforeach
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
            <th>BANDING DATA</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$key+1}}</td>
              <td>{{$item->nama}}</td>
              <td>
                <table>
                <tr>
                  <td>Jumlah Penduduk</td>
                  <td>: {{$item->jumlah_penduduk}}</td>
                </tr>
                <tr>
                  <td>Jumlah KK</td>
                  <td>: {{$item->jumlah_kk}}</td>
                </tr>
                <tr>
                  <td>Jumlah RT</td>
                  <td>: {{$item->jumlah_rt}}</td>
                </tr>
                <tr>
                  <td>Jumlah RW</td>
                  <td>: {{$item->jumlah_rw}}</td>
                </tr>
                <tr>
                  <td>Jumlah {{old('jabatan')}}</td>
                  <td>: {{$item->jumlah}} Orang</td>
                </tr>
                </table>
              </td>
              
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
