<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/froala/css/froala_editor.pkgd.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link text-uppercase active" href="<?php echo e(route('harga-index')); ?>">
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
        <form role="form" method="POST">
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
            <div class="form-group col-md-12">
              <label for="exampleInputPassword1">Status</label>
              <select class="form-control error_blok" name="status" id="tambah_status">
                <option disabled selected>- Pilihan -</option>
                <option value="0">No Aktif</option>
                <option value="1">Aktif</option>
              </select>
              <div class="invalid-status">
              </div>
            </div>
          </div>
          <hr>
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
            url: '/harga/simpan/',
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'harga': $('#tambah_harga').val(),
                'keterangan': $('#tambah_keterangan').val(),
                'status': $('#tambah_status').val()
            },
            success: function(data) {
                if ((data.errors)) {
                    setTimeout(function () {
                        // $('#edit_data').modal('show');
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.harga) {
                        $('.error_harga').addClass('is-invalid');
                        $('.invalid-harga').addClass('invalid-feedback');
                        $('.invalid-harga').removeClass('hidden');
                        $('.invalid-harga').text(data.errors.harga);
                    }

                    if (data.errors.keterangan) {
                        $('.error_keterangan').addClass('is-invalid');
                        $('.invalid-keterangan').addClass('invalid-feedback');
                        $('.invalid-keterangan').removeClass('hidden');
                        $('.invalid-keterangan').text(data.errors.keterangan);
                    }  

                    if (data.errors.status) {
                        $('.error_status').addClass('is-invalid');
                        $('.invalid-status').addClass('invalid-feedback');
                        $('.invalid-status').removeClass('hidden');
                        $('.invalid-status').text(data.errors.status);
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