@extends('superadmin.layouts.app')
@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
@endpush
@section('content-header')
BERKALA PEGAWAI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/berkala" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Tambah Berkala</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal" action="/superadmin/berkala/add" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Surat</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nomor Surat</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nomor" placeholder="nomor">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Kenaikan Gaji Berkalan an.</label>

            <div class="col-sm-10">
                <select name="pegawai_id" class="form-control select2" required>
                  <option value="">-pilih-</option>
                  @foreach ($pegawai as $item)
                  <option value="{{$item->id}}">{{$item->nip}} - {{$item->nama}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Gaji Pokok Lama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="gajilama" placeholder="1.000.000">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"></label>

            <div class="col-sm-10">
              (Atas dasar surat keputusan terakhir tentang gaji / pangkat yang ditetapkan)
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Oleh Pejabat </label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="olehpejabat" value="Kepala Dinas Kesehatan Kota Banjarmasin">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggallama" required value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Mulai Berlaku</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggalmulaiberlaku" required value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Masa Kerja Golongan </label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="mkglama" required placeholder="22 Tahun 00 Bulan" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"> </label>

            <div class="col-sm-10">
              Diberikan Kenaikan Gaji Berkala hingga  memperoleh :
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Gaji Pokok Baru</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="gajibaru" placeholder="2.000.000">
            </div>
          </div> 
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Berdasarkan masa kerja</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="mkgbaru" placeholder="22 Tahun 00 bulan">
            </div>
          </div> 
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Dalam Golongan</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="golongan" placeholder="Pembina I">
            </div>
          </div> 
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Mulai tanggal </label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggalbaru" required value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Untuk kenaikan gaji yad </label>

            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggalyad" required value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kepala Dinas :</label>

            <div class="col-sm-10">
              
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">NIP </label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nipkadis" value="{{$kadis->nip}}" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama </label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="namakadis" value="{{$kadis->nama}}" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pangkat </label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="pangkatkadis" value="{{$kadis->pangkat}}" readonly>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn bg-purple btn-block">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
      
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
