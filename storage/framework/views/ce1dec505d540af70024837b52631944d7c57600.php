
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
			<?php echo e(csrf_field()); ?>

		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control error_nama" id="name" placeholder="Enter the field" name="name">
			<div class="invalid-name">
			</div>
		  </div>
		  <div class="form-group">
		    <label for="username">Username</label>
		    <input type="text" class="form-control error_username" id="username" placeholder="Enter the field" name="username">
			<div class="invalid-username">
			</div>
		  </div>
		  <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
		    <label for="email">Email</label>
		    <input type="email" class="form-control error_email" id="email" placeholder="Enter the field" name="email">
			<div class="invalid-email">
			</div>
		  </div>
		  <div class="form-group">
		    <label for="tlp">Telephone</label>
		    <input type="number" class="form-control error_tlp" id="tlp" placeholder="Enter the field" name="tlp">
			<div class="invalid-tlp">
			</div>
		  </div>
		  <div class="form-group <?php echo e($errors->has('role') ? ' has-error' : ''); ?>">
		    <label for="role">Jabatan</label>
		    <select class="form-control" id="role" name="role">
		    	<option selected disable>- Pilih Jabatan -</option>
		    	<option value="admin">Admin</option>
		    	<option value="manager">Manager</option>
		    	<option value="staff">Staff</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control error_password" id="password" placeholder="Enter the field" name="password">
			<div class="invalid-password">
			</div>
		  </div>
		  <div class="form-group">
		    <label for="password_confirmation">Confirm Password</label>
		    <input type="password" class="form-control error_password" id="password_confirmation" placeholder="Enter the field" name="password_confirmation">
			<div class="invalid-password">
			</div>
		  </div>
		  <div class="form-group">
		  	<label>Status</label>
		  	<div class="checkbox">
		  		<div class="clearfix">
				  <label class="pull-left">
				  	<input type="checkbox" class="form-control error_is_active" name="is_active" value="1">
				  	<small class="text-success">Aktif</small>
				  </label>
				  <label class="pull-right">
				  	<input type="checkbox" class="form-control error_is_active" name="is_active" value="0">
				  	<small class="text-danger">Non Aktif</small>
				  </label>
		  		</div>
			<div class="invalid-is_active">
			</div>
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