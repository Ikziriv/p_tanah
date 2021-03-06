
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
          {{ method_field('PUT') }}
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="hidden" class="form-control" id="edit_id" disabled>
            <input type="text" class="form-control error_nama" id="edit_nama" autofocus>
            <div class="invalid-nama">
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kode / Slug</label>
            <input type="text" class="form-control error_slug" id="edit_slug" autofocus>
            <small id="emailHelp" class="form-text text-muted">Inisial kode daerah sekitar.</small>
            <div class="invalid-slug">
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