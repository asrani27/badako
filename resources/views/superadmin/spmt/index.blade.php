@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
SK SPMT
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/spmt/add" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah</a>
    
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data SPMT</h3>

        <div class="box-tools">
          
          <form method="get" action="/superadmin/spmt/search">
            @csrf
            <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
              <input type="text" name="search" class="form-control pull-right" value="{{old('search')}}" placeholder="Cari NIP/Nama">
  
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive table-bordered table-condensed">
        <table class="table table-hover">
          <tbody>
          <tr style="background-color: #a8c4f1">
            <th class="text-center">No</th>
            <th>Tanggal</th>
            <th>Nomor</th>
            <th>Yang Bertanda Tangan</th>
            <th>Menyatakan Bahwa</th>
            <th>Surat Keputusan Mutasi</th>
            <th>Ditetapkan Tanggal</th>
            <th>Aksi</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$data->firstItem() + $key}}</td>
              <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
              <td>{{$item->nomor}}</td>
              <td>
              Nama : {{$item->nama1}}<br/>
              NIP :{{$item->nip1}}<br/>
              Pangkat :{{$item->pangkat1}}<br/>
              Jabatan : {{$item->jabatan1}} <br/>
              </td>
              <td>  
                Nama : {{$item->nama2}}<br/>
                NIP :{{$item->nip2}}<br/>
                Pangkat :{{$item->pangkat2}}<br/>
                Jabatan : {{$item->jabatan2}} <br/>
              </td>
              <td>
                
                Pejabat yg menetapkan : {{$item->pejabat}}<br/>
                Nomor : {{$item->nomormutasi}}<br/>
                Tanggal : {{\Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')}}<br/>
                TMT berlakunya : {{\Carbon\Carbon::parse($item->tmt)->translatedFormat('d F Y')}}<br/>
              </td>
              <td>{{\Carbon\Carbon::parse($item->ditetapkan)->translatedFormat('d F Y')}}</td>
              <td>                  
                <a href="/superadmin/spmt/word/{{$item->id}}" class="btn btn-xs btn-flat  btn-primary"><i class="fa fa-file-word-o"></i> Unduh</a>
                  <a href="/superadmin/spmt/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                  <a href="/superadmin/spmt/delete/{{$item->id}}"
                      onclick="return confirm('Yakin ingin di hapus');"
                      class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    {{$data->links()}}
  </div>
</div>
@endsection
@push('js')


@endpush
