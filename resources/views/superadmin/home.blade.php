@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
DASHBOARD
@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-1 control-label">UNIT KERJA</label>

          <form method="get" action="/superadmin/beranda/filter">
            @csrf
          <div class="col-sm-9">
              <select class="form-control" name="unitkerja">
                <option value="">-TAMPIL SEMUA-</option>
                @foreach ($unitkerja as $item)
                <option value="{{$item->id}}" {{$item->id == old('unitkerja') ? 'selected':''}}>{{$item->nama}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> FILTER DATA</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
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
        <span class="info-box-number">{{$jfu}}</span>
  
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
</div>

<div class="row">
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Yang Naik Pangkat Tahun Ini</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Unit kerja</th>
          <th>Tanggal</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($naikpangkat as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nip}}<br/>{{$item->nama}}</td>
              <td>{{$item->unitkerja == null ? '-': $item->unitkerja->nama}}</td>
              <td>{{\Carbon\Carbon::parse($item->tanggal_pangkat)->addYear(3)->format('d-m-Y')}}</td>
            </tr>
        @endforeach
        
        </tbody>
      </table>
      {{$naikpangkat->links()}}
    </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Naik Gaji Berkala Tahun ini</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Unit Kerja</th>
          <th>Tanggal</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($naikberkala as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nip}}<br/>{{$item->nama}}</td>
              <td>{{$item->unitkerja == null ? '-': $item->unitkerja->nama}}</td>
              <td>{{\Carbon\Carbon::parse($item->tanggal_berkala)->addYear(2)->format('d-m-Y')}}</td>
            </tr>
        @endforeach
        
        
        </tbody>
      </table>
      {{$naikberkala->links()}}
    </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Pensiun Tahun ini</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
      <tbody>
      <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
        <th class="text-center">No</th>
        <th>NIP/Nama</th>
        <th>Unit Kerja</th>
        <th>Tanggal Pensiun / Usia</th>
      </tr>
      @php
          $no=1;
      @endphp
      @foreach ($pensiun as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nip}}<br/>{{$item->nama}}</td>
        <td>{{$item->unitkerja == null ? '-': $item->unitkerja->nama}}</td>
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
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Unit Kerja</th>
          <th>Tanggal</th>
        </tr>
        
      @php
      $no=1;
      @endphp
      @foreach ($str as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nip}}<br/>{{$item->nama}}</td>
        <td>{{$item->unitkerja == null ? '-': $item->unitkerja->nama}}</td>
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
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr style="background-color:#2969b0 !important;background-image:linear-gradient(to right , #0954a9, #0785a9, #4db1a5, #2ba79f); color:#fff">
          <th class="text-center">No</th>
          <th>NIP/Nama</th>
          <th>Unit Kerja</th>
          <th>Tanggal</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($sip as $item)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$item->nip}}<br/>{{$item->nama}}</td>
          <td>{{$item->unitkerja == null ? '-': $item->unitkerja->nama}}</td>
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
      <h3 class="box-title"><i class="fa fa-users"></i> Nama-nama belum selesai mengisi data</h3>

      <div class="box-tools">
        {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
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
          <td>{{$item->nama}}</td>
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
      <h3 class="box-title"><i class="fa fa-users"></i> Pegawai Berdasarkan Status Kepegawaian</h3>

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
