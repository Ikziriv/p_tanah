
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
		    <label for="exampleInputEmail1">Nama</label>
		    <input type="text" class="form-control error_nama" name="nama" id="tambah_nama" required>
		    <div class="invalid-nama">
	        </div>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Kode / Slug</label>
		    <input type="text" class="form-control error_slug" name="slug" id="tambah_slug" required>
		    <small id="emailHelp" class="form-text text-muted">Inisial kode daerah sekitar.</small>
		    <div class="invalid-slug">
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