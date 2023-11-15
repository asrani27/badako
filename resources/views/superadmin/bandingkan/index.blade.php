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
      <form method="post" action="/superadmin/bandingkan/data">
        @csrf
        <label>Kelurahan</label>
        <select class="form-control select2" name="unitkerja_id[]" multiple="multiple" data-placeholder="Select a State"
                style="width: 100%;">
                @foreach ($uk as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
        </select>
        <br/>
        <br/>
        <button type="submit" class="btn btn-md btn-primary btn-block">TAMPILKAN</button>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">

    @foreach ($data as $key => $item)
    <div class="col-md-4">
  
    <div class="box">
    <div class="box-body">
      <table class="table table-hover">
        <tbody>
          <tr>
            <td>NAMA</td>
            <td>: {{$item->nama}}</td>
          </tr>
          <tr>
            <td>JUMLAH PENDUDUK</td>
            <td>: {{$item->jumlah_penduduk}}</td>
          </tr>
          <tr>
            <td>JUMLAH KELURAHAN</td>
            <td>: {{$item->jumlah_kelurahan}}</td>
          </tr>
          <tr>
            <td>JUMLAH RT</td>
            <td>: {{$item->jumlah_rt}}</td>
          </tr>
          <tr>
            <td>JUMLAH KK</td>
            <td>: {{$item->jumlah_kk}}</td>
          </tr>
          <tr>
            <td>JUMLAH PEGAWAI</td>
            <td>: {{$item->jumlah_pegawai}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
    </div>
    @endforeach
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Bandingkan data</h3>

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
            <th>JUMLAH PENDUDUK</th>
            <th>JUMLAH KELURAHAN</th>
            <th>JUMLAH RT</th>
            <th>JUMLAH KK</th>
            <th>TOTAL PEGAWAI</th>
            <th>PNS</th>
            <th>PPPK</th>
            <th>NON ASN</th>
          </tr>
          @foreach ($uk as $key => $item)
          <tr>
              <td class="text-center">{{$key+1}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->jumlah_penduduk}}</td>
              <td>{{$item->jumlah_kelurahan}}</td>
              <td>{{$item->jumlah_rt}}</td>
              <td>{{$item->jumlah_kk}}</td>
              <td>{{$item->totalpegawai}}</td>
              <td>{{$item->pns}}</td>
              <td>{{$item->pppk}}</td>
              <td>{{$item->nonasn}}</td>
              
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
