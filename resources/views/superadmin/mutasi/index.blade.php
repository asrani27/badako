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

      <form class="form-horizontal" action="/superadmin/bandingkandata" method="post">
        @csrf
      <div class="box-body">
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
            <div class="col-sm-10">
                <select class="form-control">
                    <option value="">-pilih-</option>
                    <option value="BIDAN">BIDAN</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jenjang Jabatan</label>
            <div class="col-sm-10">
                <select class="form-control">
                    <option value="PEMULA" >PEMULA</option>
                    <option value="TERAMPIL">TERAMPIL</option>
                    <option value="MAHIR" >MAHIR</option>
                    <option value="PENYELIA" >PENYELIA</option>
                    <option value="PELAKSANA">PELAKSANA</option>
                    <option value="PELAKSANA LANJUTAN">PELAKSANA LANJUTAN</option>
                    <option value="AHLI PERTAMA">AHLI PERTAMA</option>
                    <option value="AHLI MUDA">AHLI MUDA</option>
                    <option value="AHLI MADYA">AHLI MADYA</option>
                    <option value="AHLI UTAMA">AHLI UTAMA</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-sm btn-primary">TAMPILKAN</button>
            </div>
        </div>
      </div>
      </form>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    
  </div>
</div>
@endsection
@push('js')

@endpush
