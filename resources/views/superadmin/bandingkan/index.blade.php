@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
Bandingkan Data
@endsection
@section('content')
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

@endpush
