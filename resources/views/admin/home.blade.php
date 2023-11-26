@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
DASHBOARD ADMIN
@endsection
@section('content')
<div class="row">
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI PNS</span>
        <span class="info-box-number">{{$pns}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai PNS
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-green-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI PPPK</span>
        <span class="info-box-number">{{$pkkk}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai PPPK
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-red-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI NON ASN</span>
        <span class="info-box-number">{{$nonasn}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai NON ASN
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-black-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI PENSIUN</span>
        <span class="info-box-number">0</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai PENSIUN
            </span>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-yellow-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI JABATAN ADMINISTRATOR</span>
        <span class="info-box-number">{{$pj_struktural}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai Jabatan Administrator
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-teal-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI JABATAN FUNGSIONAL</span>
        <span class="info-box-number">{{$jf}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai Jabatan Fungsional 
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-blue-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI BELUM ISI STATUS KEPEGAWAIAN</span>
        <span class="info-box-number">{{$tidakisi}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai Belum Isi Status Kepegawaian
            </span>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-red-gradient">
      <span class="info-box-icon"><i class="fa fa-users"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">JUMLAH PEGAWAI</span>
        <span class="info-box-number">{{$jumlahpegawai}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai 
            </span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Yang Naik Pangkat Tahun Ini</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Tanggal</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($naikpangkat as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nip}}<br/>{{$item->nama}}</td>
              <td>{{\Carbon\Carbon::parse($item->tanggal_pangkat)->addYear(3)->format('d-m-Y')}}</td>
            </tr>
        @endforeach
        
        </tbody>
      </table>
    </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Naik Gaji Berkala Tahun ini</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Tanggal</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($naikberkala as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nip}}<br/>{{$item->nama}}</td>
              <td>{{\Carbon\Carbon::parse($item->tanggal_berkala)->addYear(2)->format('d-m-Y')}}</td>
            </tr>
        @endforeach
        
        
        </tbody>
      </table>
    </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Pensiun Tahun ini</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
      <tbody>
      <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
        <th class="text-center">No</th>
        <th>NIP/Nama</th>
        <th>Tanggal Pensiun / Usia</th>
      </tr>
      @php
          $no=1;
      @endphp
      @foreach ($pensiun as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nip}}<br/>{{$item->nama}}</td>
        <td>{{\Carbon\Carbon::parse($item->tanggal_lahir)->addYear($item->age)->format('d-m-Y')}} <br/>
          {{$item->age}} Tahun </td>
      </tr>
      @endforeach
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> STR Kadaluarsa tahun ini</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Tanggal</th>
        </tr>
        
      @php
      $no=1;
      @endphp
      @foreach ($str as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nip}}<br/>{{$item->nama}}</td>
        <td>{{\Carbon\Carbon::parse($item->tanggal_str)->addYear(5)->format('d-m-Y')}}</td>
      </tr>
      @endforeach
        
        </tbody>
      </table>
    </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> SIP Kadaluarsa tahun ini</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Tanggal</th>
        </tr>
        @php
      $no=1;
      @endphp
      @foreach ($sip as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nip}}<br/>{{$item->nama}}</td>
        <td>{{\Carbon\Carbon::parse($item->tanggal_sip)->addYear(5)->format('d-m-Y')}}</td>
      </tr>
      @endforeach
        
        </tbody>
      </table>
    </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Nama-nama belum isi status pegawai ({{$belumisi->total()}})</h3>

      <div class="box-tools">
        
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #a90911, #a90766, #a2b14d, #def671); color:#fff">
          <th class="text-center">No</th>
          <th>Nama</th>
          <th>Unit Kerja</th>
        </tr>

        @foreach ($belumisi as $key => $item)
        <tr>
          <td>{{$belumisi->firstItem() + $key}}</td>
          <td><a href="/admin/detail/{{$item->nip}}"><span class="text-blue">{{$item->nama}}</span></a></td>
          <td>{{$item->unitkerja == null ? '-': $item->unitkerja->nama}}</td>
        </tr>
        @endforeach
        
        </tbody>
      </table>
      {{$belumisi->withQueryString()->links()}}
    </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> PNS Yang belum selesai isi Data ({{$pnsbelumisi->total()}})</h3>

      <div class="box-tools">
        <a href="/admin/belumisi/asn" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-refresh"></i> Check</a>
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #a90911, #a90766, #a2b14d, #def671); color:#fff">
          <th class="text-center">No</th>
          <th>Nama</th>
          <th>Unit Kerja</th>
        </tr>

        @foreach ($pnsbelumisi as $key => $item)
        <tr>
          <td>{{$pnsbelumisi->firstItem() + $key}}</td>
          <td><a href="/admin/detail/{{$item->nip}}"><span class="text-blue">{{$item->nama}}</span></a></td>
          <td>{{$item->unitkerja}}</td>
        </tr>
        @endforeach
        
        </tbody>
      </table>
      {{$pnsbelumisi->withQueryString()->links()}}
    </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> PPPK Yang belum selesai isi Data ({{$pppkbelumisi->total()}})</h3>

      <div class="box-tools">
        <a href="/admin/belumisi/pppk" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-refresh"></i> Check</a>
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #a90911, #a90766, #a2b14d, #def671); color:#fff">
          <th class="text-center">No</th>
          <th>Nama</th>
          <th>Unit Kerja</th>
        </tr>

        @foreach ($pppkbelumisi as $key => $item)
        <tr>
          <td>{{$pppkbelumisi->firstItem() + $key}}</td>
          <td><a href="/admin/detail/{{$item->nip}}"><span class="text-blue">{{$item->nama}}</span></a></td>
          <td>{{$item->unitkerja}}</td>
        </tr>
        @endforeach
        
        </tbody>
      </table>
      {{$pppkbelumisi->withQueryString()->links()}}
    </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> NON ASN Yang belum selesai isi Data ({{$nonasnbelumisi->total()}})</h3>

      <div class="box-tools">
        <a href="/admin/belumisi/nonasn" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-refresh"></i> Check</a>
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #a90911, #a90766, #a2b14d, #def671); color:#fff">
          <th class="text-center">No</th>
          <th>Nama</th>
          <th>Unit Kerja</th>
        </tr>

        @foreach ($nonasnbelumisi as $key => $item)
        <tr>
          <td>{{$nonasnbelumisi->firstItem() + $key}}</td>
          <td><a href="/admin/detail/{{$item->nip}}"><span class="text-blue">{{$item->nama}}</span></a></td>
          <td>{{$item->unitkerja}}</td>
        </tr>
        @endforeach
        
        </tbody>
      </table>
      {{$nonasnbelumisi->withQueryString()->links()}}
    </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Pendidikan</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body">
      <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Golongan PNS</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body">
      <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Golongan PPPK</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body">
      <div id="chartContainer5" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Jenis Kelamin</h3>

      <div class="box-tools">
        {{-- <a href="/admin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body">
      <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Status Kepegawaian</h3>

      <div class="box-tools">
      </div>
    </div>
    <div class="box-body">
      <div id="chartContainer4" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Jenis Jabatan</h3>

      <div class="box-tools">
      </div>
    </div>
    <div class="box-body">
      <div id="chartContainer6" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>

<script>
  window.onload = function() {
  
  grafikpendidikan = {!!json_encode($grafik1)!!}
  console.log(grafikpendidikan)
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
      indexLabel: "{label} {y}",
      dataPoints: grafikpendidikan
    }]
  });

  grafikpns = {!!json_encode($grafik2)!!}
  var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: grafikpns
    }]
  });

  grafikjkel = {!!json_encode($grafik4)!!}
  var chart3 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: grafikjkel
    }]
  });

  grafikstatus = {!!json_encode($grafik5)!!}
  var chart4 = new CanvasJS.Chart("chartContainer4", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: grafikstatus
    }]
  });

  grafikpppk = {!!json_encode($grafik3)!!}
  console.log(grafikpppk)
  var chart5 = new CanvasJS.Chart("chartContainer5", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: grafikpppk
    }]
  });
  grafikjabatan = {!!json_encode($grafik6)!!}
  console.log(grafikjabatan)
  var chart5 = new CanvasJS.Chart("chartContainer6", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: grafikjabatan
    }]
  });


  chart.render();
  chart2.render();
  chart3.render(); 
  chart4.render();  
  chart5.render();  
  chart6.render(); 
  }
</script>
@endpush
