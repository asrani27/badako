@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
DASHBOARD ADMIN
@endsection
@section('content')
<div class="row">
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-blue-gradient">
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
    <div class="info-box bg-blue-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI PKKK</span>
        <span class="info-box-number">{{$pkkk}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai PKKK
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-blue-gradient">
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
    <div class="info-box bg-blue-gradient">
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
    <div class="info-box bg-blue-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI JABATAN STRUKTURAL</span>
        <span class="info-box-number">0</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai Jabatan Struktural
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-blue-gradient">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PEGAWAI JABATAN FUNGSIONAL</span>
        <span class="info-box-number">0</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Pegawai Jabatan Fungsional
            </span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Yang Naik Pangkat Bulan Ini</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
        <tr style="background-color:#a8c4f1">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Tanggal</th>
        </tr>
        <tr>
            <td class="text-center">1</td>
            <td>1997288381217123 <br/> Asrani</td>
            <td>31 Desember 2023</td>
        </tr>
        
        </tbody>
      </table>
    </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Naik Gaji Berkala Bulan ini</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
        <tr style="background-color:#a8c4f1">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Tanggal</th>
        </tr>
        <tr>
            <td class="text-center">1</td>
            <td>1997288381217123 <br/> Asrani</td>
            <td>31 Desember 2023</td>
        </tr>
        
        </tbody>
      </table>
    </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Pensiun Bulan ini</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
      <tbody>
      <tr style="background-color:#a8c4f1">
        <th class="text-center">No</th>
        <th>NIP/Nama</th>
        <th>Tanggal</th>
      </tr>
      <tr>
          <td class="text-center">1</td>
          <td>1997288381217123 <br/> Asrani</td>
          <td>31 Desember 2063</td>
      </tr>
      
      </tbody>
    </table>
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
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
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
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Golongan</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
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
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Jenis Kelamin</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
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
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Jenis ASN</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body">
      <div id="chartContainer4" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>

<script>
  window.onload = function() {
  
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
      yValueFormatString: "##0.00\"%\"",
      indexLabel: "{label} {y}",
      dataPoints: [
        {y: 79.45, label: "SMA"},
        {y: 7.31, label: "D3"},
        {y: 7.06, label: "S1"},
        {y: 4.91, label: "S2"},
        {y: 1.26, label: "S3"}
      ]
    }]
  });

  var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: [
        {y: 7.45, label: "Gol. I"},
        {y: 7.31, label: "Gol. II"},
        {y: 70.06, label: "Gol. III"},
        {y: 40.91, label: "Gol. V"},
        {y: 10.26, label: "Gol. V"}
      ]
    }]
  });
  var chart3 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: [
        {y: 2134, label: "Laki-Laki"},
        {y: 1567, label: "Perempuan"},
      ]
    }]
  });
  var chart4 = new CanvasJS.Chart("chartContainer4", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: [
        {y: 2134, label: "PNS"},
        {y: 1567, label: "PKKK"},
        {y: 2602, label: "NON ASN"},
      ]
    }]
  });
  chart.render();
  chart2.render();
  chart3.render(); 
  chart4.render();  
  }
</script>
@endpush
