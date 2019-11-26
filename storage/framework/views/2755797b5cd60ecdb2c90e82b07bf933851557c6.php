
<div class="modal fade edit-data" id="edit_data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="PUT">
          <?php echo e(method_field('PUT')); ?>

          <div class="form-group">
            <label for="exampleInputEmail1">Harga</label>
            <input type="hidden" class="form-control" id="edit_id" disabled>
            <input type="text" class="form-control error_harga" id="edit_harga" autofocus>
            <div class="invalid-harga">
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Keterangan</label>
            <input type="text" class="form-control error_keterangan" id="edit_keterangan" autofocus>
            <div class="invalid-keterangan">
              </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value="1" id="edit_status">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Aktif</span>
            </label>
            </div>
            
            <div class="form-group col-md-6">
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value="0" id="edit_status">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Non Aktif</span>
            </label>
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