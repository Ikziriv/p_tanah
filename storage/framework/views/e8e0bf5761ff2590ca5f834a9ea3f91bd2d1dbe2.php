
<div class="modal fade edit-data" id="edit_data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Edit SPPT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form role="form" method="PUT">
          <?php echo e(method_field('PUT')); ?>

    		  <div class="form-group">
    		    <label for="">Kode</label>
            <input type="hidden" class="form-control" id="edit_id" disabled>
    		    <input type="text" class="form-control error_slug" name="kode" id="edit_kode" required>
    		    <small id="" class="form-text text-muted">Inisial kode ex: 007.</small>
    		    <div class="invalid-kode">
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