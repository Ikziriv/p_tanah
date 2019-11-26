
<div class="modal fade tambah-data" id="tambah_data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form role="form">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Harga</label>
		    <input type="text" class="form-control error_harga" name="harga" id="tambah_harga" required>
		    <div class="invalid-harga">
	        </div>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Keterangan</label>
		    <input type="text" class="form-control error_keterangan" name="keterangan" id="tambah_keterangan" required>
		    <div class="invalid-keterangan">
	        </div>
		  </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value="1" id="tambah_status">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Aktif</span>
            </label>
            </div>
            
            <div class="form-group col-md-6">
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value="0" id="tambah_status">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Non Aktif</span>
            </label>
            </div>
          </div>
		  <div class="btn-group" role="group">
	        <button type="button" class="btn btn-sm btn-outline-primary simpan">Simpan</button>
	        <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Batal</button>
		  </div>
		</form>
      </div>
    </div>
  </div>
</div>