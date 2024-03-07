@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
SURAT PERMOHONAN
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/usulan1" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah Data</a><br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Permohonan BUP 58/60 Th</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive table-bordered table-condensed">
        <table class="table table-hover">
          <tbody>
            
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
