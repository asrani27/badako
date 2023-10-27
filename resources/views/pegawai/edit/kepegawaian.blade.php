@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>EDIT DATA</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#kependudukan" data-toggle="tab">Kepegawaian</a></li>
        </ul>
        <div class="tab-content">
            
          <div class="active tab-pane" id="kependudukan">
            
          @if (Auth::user()->pegawai->status_pegawai == 'NON ASN')
              
          <form class="form-horizontal" action="/pegawai/biodata/edit/kepegawaian" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="col-sm-3 control-label">Status Pegawai </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK NON ASN (Jika Ada)</label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor SK</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_nonasn" value="{{$data->nomor_nonasn}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal SK</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_nonasn" value="{{$data->tanggal_nonasn}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_nonasn">
              </div>
            </div>
            
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Surat Tanda Registrasi (Jika Ada) </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File STR (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Surat Izin Praktek (Jika Ada) </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SIP (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"></label>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-block bg-purple"><i class="fa fa-save"></i> SIMPAN</button>
                <a href="/pegawai/beranda" class="btn btn-block btn-danger"><i class="fa fa-arrow-left"></i> KEMBALI</a>
              </div>
            </div>
          </form>
          @elseif (Auth::user()->pegawai->status_pegawai == 'PPPK')

          <form class="form-horizontal" action="/pegawai/biodata/edit/kepegawaian/pppk" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="col-sm-3 control-label">Status Pegawai </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK Pengangkatan </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_cpns" value="{{$data->nomor_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_cpns" value="{{$data->tanggal_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK PPPK (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_cpns">
              </div>
            </div>
            <hr>
            
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Surat Perjanjian Kerja </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File Surat Perjanjian Kerja (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SPMT </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SPMT (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Surat Tanda Registrasi (Jika Ada) </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File STR (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Surat Izin Praktek (Jika Ada) </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SIP (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"></label>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-block bg-purple"><i class="fa fa-save"></i> SIMPAN</button>
                <a href="/pegawai/beranda" class="btn btn-block btn-danger"><i class="fa fa-arrow-left"></i> KEMBALI</a>
              </div>
            </div>
          </form>
          @else
          <form class="form-horizontal" action="/pegawai/biodata/edit/kepegawaian" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="col-sm-3 control-label">Status Pegawai </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK CPNS </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_cpns" value="{{$data->nomor_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_cpns" value="{{$data->tanggal_cpns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK CPNS (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_cpns">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SPMT </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SPMT (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK PNS </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_pns" value="{{$data->nomor_pns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_pns" value="{{$data->tanggal_pns}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK PNS (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_pns">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK Pangkat Terakhir</label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_pangkat" value="{{$data->nomor_pangkat}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_pangkat" value="{{$data->tanggal_pangkat}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK Pangkat Terakhir (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_pangkat">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">SK Jafung Terakhir</label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_jafung" value="{{$data->nomor_jafung}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_jafung" value="{{$data->tanggal_jafung}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SK Jafung (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_jafung" value="{{$data->file_jafung}}">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor Karis/karsu </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_kariskarsu" value="{{$data->nomor_kariskarsu}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File Karis/karsu (PDF, Maks 2MB)</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_kariskarsu" value="{{$data->file_kariskarsu}}">
              </div>
            </div>

            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor Karpeg </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_karpeg" value="{{$data->nomor_karpeg}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File Karpeg (PDF, Maks 2MB)</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_karpeg" value="{{$data->file_karpeg}}">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Surat Tanda Registrasi (Jika Ada) </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File STR (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">Surat Izin Praktek (Jika Ada) </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_spmt" value="{{$data->nomor_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_spmt" value="{{$data->tanggal_spmt}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File SIP (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_spmt">
              </div>
            </div>
            <hr>

            <div class="form-group">
              <label class="col-sm-3 control-label">SK Berkala </label>
              <div class="col-sm-9">
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor_berkala" value="{{$data->nomor_berkala}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_berkala" value="{{$data->tanggal_berkala}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">File Berkala (PDF, Maks 2MB) </label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="file_berkala">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"></label>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-block bg-purple"><i class="fa fa-save"></i> SIMPAN</button>
                <a href="/pegawai/beranda" class="btn btn-block btn-danger"><i class="fa fa-arrow-left"></i> KEMBALI</a>
              </div>
            </div>
          </form>
          @endif 

          </div>
          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
</section>


@endsection
@push('js')

@endpush
