<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
        <li class="nav-item">
        	<a class="nav-link text-uppercase active" data-toggle="tab" href="#tab1" role="tab">Home</a>
        </li>
    </ul>
    <div class="tab-content py-3">
    
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row">
      <div class="col-12">
	      <div class="card border-light mb-3">
            <div class="card-header">
                <div class="clearfix">
                    <h2 class="text-muted lead float-left">
                        Menu Desa
                    </h2>
                    <a class="btn btn-dark btn-sm text-sm-center text-white float-right active add-modal">
                    Tambah
                    </a>
                </div>
            </div>
	      	<div class="card-body">
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="desa" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
		            			<td width="70%">Name</td>
		            			<td>Option</td>
		            		</tr>
                            <?php echo e(csrf_field()); ?>

		            	</thead>
		            	<tbody>
		            		<?php $__currentLoopData = $desa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		            		<tr class="item<?php echo e($d->id); ?>">
		            			<td class="col1"><?php echo e($key+1); ?></td>
		            			<td><?php echo e($d->nama); ?></td>
		            			<td>
		            				<div class="btn-group" role="group">
									  <button class="btn btn-sm btn-outline-dark edit-modal" 
									  			data-id="<?php echo e($d->id); ?>"
									  			data-nama="<?php echo e($d->nama); ?>"
									  			data-slug="<?php echo e($d->slug); ?>">
									  	Ubah
									  </button>
									  <button class="btn btn-sm btn-outline-dark delete-modal"
									  			data-id="<?php echo e($d->id); ?>"
									  			data-nama="<?php echo e($d->nama); ?>"
									  			data-slug="<?php echo e($d->slug); ?>">
									  	Hapus
									  </button>
									</div>
		            			</td>
		            		</tr>
		            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            	</tbody>
		            </table>
		      	</div>
	          	
	        </div>
	      </div>
      </div>
      	
      </div>
      </div>
    </div>
	
	
	<?php echo $__env->make('pages.desa.popup.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<?php echo $__env->make('pages.desa.popup.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<?php echo $__env->make('pages.desa.popup.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#desa').DataTable();
} );
</script>
<script>
    $(window).on('load', function(){
        $('#desa').removeAttr('style');
    })
</script>
<script type="text/javascript">
    // Tambah Data
    $(document).on('click', '.add-modal', function() {
        $('.modal-title').text('Form Tambah Desa');
        $('#tambah_data').modal('show');
    });
    $('.btn-group').on('click', '.simpan', function() {
        $.ajax({
            type: 'POST',
            url: 'desa/simpan',
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'nama': $('#tambah_nama').val(),
                'slug': $('#tambah_slug').val()
            },
            success: function(data) {
                $('.invalid-nama').addClass('hidden');
                $('.invalid-slug').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        // $('#tambah_data').modal('show');
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.nama) {
                        $('.error_nama').addClass('is-invalid');
                        $('.invalid-nama').addClass('invalid-feedback');
                        $('.invalid-nama').removeClass('hidden');
                        $('.invalid-nama').text(data.errors.nama);
                    } 
                    if (data.errors.slug) {
                        $('.error_slug').addClass('is-invalid');
                        $('.invalid-slug').addClass('invalid-feedback');
                        $('.invalid-slug').removeClass('hidden');
                        $('.invalid-slug').text(data.errors.slug);
                    } 
                } else {
                    toastr.success('Tambah Data Berhasil!', 'Success', {timeOut: 5000});
                    var data_desa = '<tr class="item'+data.id+'">'
	                    			   +'<td class="col1">'+data.id+'</td>'
	                    			   +'<td>'+data.nama+'</td>'
	                    			   +'<td>'+data.slug+'</td>'
	                    			   +'<td>'
	                    			   	+'<div class="btn-group" role="group">'
	                    			   		+'<button class="btn btn-outline-dark edit-modal" data-id="'+data.id+'" data-nama="'+data.nama+'" data-slug="'+data.slug+'">Ubah</button>'
	                    			   		+'<button class="btn btn-outline-dark delete-modal" data-id="'+data.id+'" data-nama="'+data.nama+'" data-slug="'+data.slug+'">Hapus</button>'
	                    			   	+'</div>'
	                    			   +'</td'
                    			   +'</tr>';
                    $('#desa').prepend(data_desa);
        			window.location.reload();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            },
        });
    });
</script>
<script type="text/javascript">
	// Edit Data
    $(document).on('click', '.edit-modal', function() {
        $('.modal-title').text('Form Edit Data');
        $('#edit_id').val($(this).data('id'));
        $('#edit_nama').val($(this).data('nama'));
        $('#edit_slug').val($(this).data('slug'));
        id = $('#edit_id').val();
        $('#edit_data').modal('show');
    });
    $('.btn-group').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: 'desa/update/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#edit_id").val(),
                'nama': $('#edit_nama').val(),
                'slug': $('#edit_slug').val()
            },
            success: function(data) {
                $('.invalid-nama').addClass('hidden');
                $('.invalid-slug').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.nama) {
                        $('.error_nama').addClass('is-invalid');
                        $('.invalid-nama').addClass('invalid-feedback');
                        $('.invalid-nama').removeClass('hidden');
                        $('.invalid-nama').text(data.errors.nama);
                    } 
                    if (data.errors.slug) {
                        $('.error_slug').addClass('is-invalid');
                        $('.invalid-slug').addClass('invalid-feedback');
                        $('.invalid-slug').removeClass('hidden');
                        $('.invalid-slug').text(data.errors.slug);
                    } 
                } else {
                    toastr.success('Edit Data Berhasil!', 'Success', {timeOut: 5000});
                    var data_desa = '<tr class="item'+data.id+'">'
	                    			   +'<td class="col1">'+data.id+'</td>'
	                    			   +'<td>'+data.nama+'</td>'
	                    			   +'<td>'+data.slug+'</td>'
	                    			   +'<td>'
	                    			   	+'<div class="btn-group" role="group">'
	                    			   		+'<button class="btn btn-outline-dark edit-modal" data-id="'+data.id+'" data-nama="'+data.nama+'" data-slug="'+data.slug+'">Ubah</button>'
	                    			   		+'<button class="btn btn-outline-dark delete-modal" data-id="'+data.id+'" data-nama="'+data.nama+'" data-slug="'+data.slug+'">Hapus</button>'
	                    			   	+'</div>'
	                    			   +'</td'
                    			   +'</tr>';
                    $('.item' + data.id).replaceWith(data_desa);
        			window.location.reload();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            }
        });
    });
</script>
<script type="text/javascript">
	// Hapus Data
	$(document).on('click', '.delete-modal', function() {
	    $('.modal-title').text('Form Hapus Data');
	    $('#del_id').val($(this).data('id'));
	    $('#del_nama').val($(this).data('nama'));
	    $('#delete_data').modal('show');
	    id = $('#del_id').val();
	});
	$('.btn-group').on('click', '.delete', function() {
	    $.ajax({
	        type: 'DELETE',
	        url: 'desa/hapus/' + id,
	        data: {
	            '_token': $('input[name=_token]').val(),
	        },
	        success: function(data) {
	            toastr.success('Penghapusan Data Berhasil!', 'Success Alert', {timeOut: 5000});
                $('.item' + data['id']).remove();
                $('.col1').each(function (index) {
                    $(this).html(index+1);
                });
	    		$('#delete_data').modal('hide');
	        }
	    });
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>