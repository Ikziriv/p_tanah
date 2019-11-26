
<div class="modal fade edit-data" id="edit_data">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Edit Penjual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form role="form" method="PUT">
          {{ method_field('PUT') }}
          <div class="row">
            <div class="form-group col-md-6 col-xs-12">
              <label for="exampleInputPassword1">KTP</label>
              <input type="hidden" class="form-control" id="edit_id" disabled>
              <input type="text" class="form-control error_ktp" name="ktp" id="edit_ktp" required>
              <div class="invalid-ktp">
              </div>
            </div>
            <div class="form-group col-md-6 col-xs-12">
              <label for="exampleInputPassword1">Nama</label>
              <input type="text" class="form-control error_nama" name="nama" id="edit_nama" required>
              <div class="invalid-nama">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <textarea class="form-control error_alamat" name="alamat" id="edit_alamat" required></textarea>
            <div class="invalid-alamat">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Telepon</label>
            <input type="text" class="form-control error_tlp" name="tlp" id="edit_tlp" required>
            <div class="invalid-tlp">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control error_email" name="email" id="edit_email" required>
            <div class="invalid-email">
            </div>
          </div>
          <div class="btn-group" role="group">
              <button type="button" class="btn btn-sm btn-outline-warning edit">Edit</button>
              <button type="button" class="btn btn-sm btn-outline-warning" data-dismiss="modal">Batal</button>
          </div>
    		</form>
      </div>
    </div>
  </div>
</div>