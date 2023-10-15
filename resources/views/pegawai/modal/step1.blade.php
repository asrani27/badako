<div class="modal fade" id="modal-step1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" action="/pelanggan/timeline/step1" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header" style="background-color:#37517e; color:white">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Permohonan Pengujian Sample</h4>
                </div>
  
                <div class="modal-body">
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="step1" name="timeline_id" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Pelanggan / Instansi</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kegiatan</label>
                        <input type="text" class="form-control" name="jenis" required>
                    </div>
                    <div class="form-group">
                        <label>Personel Penghubung</label>
                        <input type="text" class="form-control" name="personel" required>
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="telp" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <select class="form-control" name="pembayaran" required>
                            <option value="">-pilih-</option>
                            <option value="TUNAI">TUNAI</option>
                            <option value="NON TUNAI">NON TUNAI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tujuan Pengujian Sample</label>
                        <input type="text" class="form-control" name="tujuan" required>
                    </div>
                </div>
  
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i>Kirim</button>
                </div>
            </form>
        </div>
    </div>
  </div>