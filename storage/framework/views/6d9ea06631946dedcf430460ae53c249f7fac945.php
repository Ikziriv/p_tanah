<?php $__env->startSection('style'); ?>
<style type="text/css">
	.current-picture {
    display: block;
    width: 30%;
    margin: 15px auto;
    border-radius: 0;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link text-uppercase active" data-toggle="tab" href="#tab1" role="tab">Home</a></li>
    </ul>
    <div class="tab-content py-3">
    
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row">
  	  <div class="col-md-12">
	      <h2 class="text-muted lead text-center">
	      	Pengaturan Pengguna
	      </h2>
	      <div class="card border-light mb-3">
	      	<div class="card-body">
			   <button class="btn btn-sm btn-outline-dark" type="button" data-toggle="collapse" data-target="#colaps-gambar" aria-expanded="false" aria-controls="colaps-gambar">
			    <i class="fa fa-bars"></i>
			   </button>
			   <div class="collapse" id="colaps-gambar">
                <img class="current-picture img-thumbnail img-responsive" src="<?php echo e(asset(Auth::user()->profile_picture)); ?>" alt="Profile picture" />
            	</div>
            </div>
          </div>
  	  </div>
      
      <div class="col-6">
	      <div class="card border-light mb-3">
	      	<div class="card-body">
				<div class="col-md-12">
					<form role="form" method="POST" action="<?php echo e(route('profile-update',Auth::user()->id)); ?>" enctype="multipart/form-data">
					   <?php echo e(csrf_field()); ?>

					  <div class="form-group">
					    <label for=""><i class="fa fa-upload" aria-hidden="true"></i> Pilih Gambar</label>
					    <input type="file" class="form-control-file file-input" id="profile_picture" name="profile_picture" placeholder="Select image">
					  </div>
					  <div class="form-group">
					    <label for="">Nama Lengkap</label>
					    <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo e(Auth::user()->full_name); ?>" placeholder="Nama Lengkap">
					  </div>
					  <div class="form-group">
					    <label for="">Alamat</label>
					    <textarea class="form-control" name="address" id="address" rows="3"><?php echo e(Auth::user()->address); ?></textarea>
					  </div>
					  <button type="submit" class="btn btn-block btn-sm btn-outline-primary">Simpan</button>
					</form>
				</div>
	        </div>
	      </div>
      </div>

      <div class="col-6">
	      <div class="card border-light mb-3">
	      	<div class="card-body">
				<div class="col-md-12">
					<form role="form" method="POST" action="<?php echo e(route('setting-update',Auth::user()->id )); ?>" enctype="multipart/form-data">
					   <?php echo e(csrf_field()); ?>

					  <div class="form-group">
					    <label for="">Nama</label>
					    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="<?php echo e(Auth::user()->nama); ?>">
					  </div>
					  <div class="form-group">
					    <label for="">Email</label>
					    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan email" value="<?php echo e(Auth::user()->email); ?>">
					  </div>
					  <div class="form-group">
					    <label for="">Telephon</label>
					    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Masukkan Telephon" value="<?php echo e(Auth::user()->tlp); ?>">
					  </div>
					  <div class="form-check">
					    <label class="form-check-label">
					      <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="0">
					      Nonaktifkan Akun
					    </label>
					  </div>
					  <button type="submit" class="btn btn-block btn-sm btn-outline-primary">Simpan</button>
					</form>
				</div>
	        </div>
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
	$(document).ready(function() {
    $('#users').DataTable();
} );
</script>
<script type="text/javascript">
    // Custom file input box
    $('.file-input').on('change', function(e) {
        var file = '';
        var name = '';
        file = $('input[type=file]').val();
        name = file.split('\\').pop();
        $('#filename').text(name);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>