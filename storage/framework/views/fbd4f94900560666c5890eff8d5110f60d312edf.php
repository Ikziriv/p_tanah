<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/froala/css/froala_editor.pkgd.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link text-uppercase active" href="<?php echo e(route('user.index')); ?>">
	    	Kembali
	    </a>
	  </li>
    </ul>
    <div class="tab-content py-3">
    
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <h2 class="text-muted lead text-right">
      	Tambah Data 
      </h2>
      <div class="row">
      <div class="col-12">
    		<div class="card-body">
            <form role="form">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control error_nama" id="tambah_nama" placeholder="Enter the field" name="nama">
              <div class="invalid-name">
              </div>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control error_username" id="tambah_username" placeholder="Enter the field" name="username">
              <div class="invalid-username">
              </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control error_email" id="tambah_email" placeholder="Enter the field" name="email">
              <div class="invalid-email">
              </div>
              </div>
              <div class="form-group">
                <label for="tlp">Telephone</label>
                <input type="number" class="form-control error_tlp" id="tambah_tlp" placeholder="Enter the field" name="tlp">
              <div class="invalid-tlp">
              </div>
              </div>
              <div class="form-group">
                <label for="role">Jabatan</label>
                <select class="form-control" id="tambah_role" name="role">
                  <option selected disable>- Pilih Jabatan -</option>
                  <option value="admin">Admin</option>
                  <option value="manager">Manager</option>
                  <option value="staff">Staff</option>
                </select>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control error_password" id="tambah_password" placeholder="Enter the field" name="password">
              <div class="invalid-password">
              </div>
              </div>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control error_blok" name="is_active" id="tambah_is_active">
                  <option disabled selected>- Pilihan -</option>
                  <option value="0">No Aktif</option>
                  <option value="1">Aktif</option>
                </select>
                <div class="invalid-is_active">
                </div>
              </div>
              <div class="form-row">
                <?php echo e(csrf_field()); ?>

                <div class="form-group col-md-12">
                  <div class="option">
                      <button type="button" class="btn btn-outline-primary btn-sm btn-block simpan">Simpan</button>
                  </div>
                </div>
              </div>
            </form>
    		</div>
      </div>
      	
      </div>
      </div>
    </div>
	
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    // Tambah Data
    $('.option').on('click', '.simpan', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/user/simpan/',
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'nama': $('#tambah_nama').val(),
                'username': $('#tambah_username').val(),
                'role': $('#tambah_role').val(),
                'email': $('#tambah_email').val(),
                'password': $('#tambah_password').val(),
                'tlp': $('#tambah_tlp').val(),
                'is_active': $('#tambah_is_active').val()
            },
            success: function(data) {
                if ((data.errors)) {
                    setTimeout(function () {
                        // $('#edit_data').modal('show');
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.nama) {
                        $('.error_nama').addClass('is-invalid');
                        $('.invalid-nama').addClass('invalid-feedback');
                        $('.invalid-nama').removeClass('hidden');
                        $('.invalid-nama').text(data.errors.nama);
                    }

                    if (data.errors.username) {
                        $('.error_username').addClass('is-invalid');
                        $('.invalid-username').addClass('invalid-feedback');
                        $('.invalid-username').removeClass('hidden');
                        $('.invalid-username').text(data.errors.username);
                    }  

                    if (data.errors.role) {
                        $('.error_role').addClass('is-invalid');
                        $('.invalid-role').addClass('invalid-feedback');
                        $('.invalid-role').removeClass('hidden');
                        $('.invalid-role').text(data.errors.role);
                    }  

                    if (data.errors.email) {
                        $('.error_email').addClass('is-invalid');
                        $('.invalid-email').addClass('invalid-feedback');
                        $('.invalid-email').removeClass('hidden');
                        $('.invalid-email').text(data.errors.email);
                    }  

                    if (data.errors.password) {
                        $('.error_password').addClass('is-invalid');
                        $('.invalid-password').addClass('invalid-feedback');
                        $('.invalid-password').removeClass('hidden');
                        $('.invalid-password').text(data.errors.password);
                    }  

                    if (data.errors.tlp) {
                        $('.error_tlp').addClass('is-invalid');
                        $('.invalid-tlp').addClass('invalid-feedback');
                        $('.invalid-tlp').removeClass('hidden');
                        $('.invalid-tlp').text(data.errors.tlp);
                    }  
                } else {
                    toastr.success('Tambah Data Berhasil!', 'Success', {timeOut: 5000});
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 5000);
                }
            },
        });
    });
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/froala/js/froala_editor.pkgd.min.js')); ?>">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

		var editor = new FroalaEditor('textarea#tambah_notes', {
		iconsTemplate: 'font_awesome_5'
		})
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>