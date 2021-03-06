 

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
        <li class="nav-item"><a class="nav-link text-uppercase active" data-toggle="tab" href="#tab1" role="tab">Home</a></li>
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
                        Menu Penjual
                    </h2>
                    <a class="btn btn-dark btn-sm text-sm-center text-white float-right active" data-toggle="modal" data-target=".tambah-data">
                    Tambah
                    </a>
                </div>
            </div>
	      	<div class="card-body">
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="penjual" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
                                <td width="70%">KTP</td>
		            			<td width="70%">Nama</td>
                                <td width="70%">Telepon</td>
                                <td>Action</td>
		            		</tr>
                            <?php echo e(csrf_field()); ?>

		            	</thead>
		            	<tbody>
		            		<?php $__currentLoopData = $penjual; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		            		<tr class="item<?php echo e($b->id); ?>">
		            			<td class="col1"><?php echo e($key+1); ?></td>
		            			<td><?php echo e($b->ktp); ?></td>
                                <td width="70%"><?php echo e($b->nama); ?></td>
                                <td><?php echo e($b->tlp); ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                      <button class="btn btn-sm btn-outline-dark edit-modal" 
                                                data-id="<?php echo e($b->id); ?>"
                                                data-ktp="<?php echo e($b->ktp); ?>"
                                                data-nama="<?php echo e($b->nama); ?>"
                                                data-alamat="<?php echo e($b->alamat); ?>"
                                                data-tlp="<?php echo e($b->tlp); ?>"
                                                data-email="<?php echo e($b->email); ?>">
                                        Ubah
                                      </button>
                                      <button class="btn btn-sm btn-outline-dark delete-modal"
                                                data-id="<?php echo e($b->id); ?>"
                                                data-ktp="<?php echo e($b->ktp); ?>">
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
	
	
	<?php echo $__env->make('pages.penjual.popup.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <?php echo $__env->make('pages.penjual.popup.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <?php echo $__env->make('pages.penjual.popup.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#penjual').DataTable();
} );
</script>
<script>
    $(window).on('load', function(){
        $('#penjual').removeAttr('style');
    })
</script>
<script type="text/javascript">
    // Tambah Data
    $('.btn-group').on('click', '.simpan', function() {
        $.ajax({
            type: 'POST',
            url: 'penjual/simpan',
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'ktp': $('#tambah_ktp').val(),
                'nama': $('#tambah_nama').val(),
                'alamat': $('#tambah_alamat').val(),
                'tlp': $('#tambah_tlp').val(),
                'email': $('#tambah_email').val()
            },
            success: function(data) {
                $('.invalid-ktp').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        // $('#tambah_data').modal('show');
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.ktp) {
                        $('.error_ktp').addClass('is-invalid');
                        $('.invalid-ktp').addClass('invalid-feedback');
                        $('.invalid-ktp').removeClass('hidden');
                        $('.invalid-ktp').text(data.errors.ktp);
                    } 

                    if (data.errors.nama) {
                        $('.error_nama').addClass('is-invalid');
                        $('.invalid-nama').addClass('invalid-feedback');
                        $('.invalid-nama').removeClass('hidden');
                        $('.invalid-nama').text(data.errors.nama);
                    } 

                    if (data.errors.alamat) {
                        $('.error_alamat').addClass('is-invalid');
                        $('.invalid-alamat').addClass('invalid-feedback');
                        $('.invalid-alamat').removeClass('hidden');
                        $('.invalid-alamat').text(data.errors.alamat);
                    } 

                    if (data.errors.tlp) {
                        $('.error_tlp').addClass('is-invalid');
                        $('.invalid-tlp').addClass('invalid-feedback');
                        $('.invalid-tlp').removeClass('hidden');
                        $('.invalid-tlp').text(data.errors.tlp);
                    } 

                    if (data.errors.email) {
                        $('.error_email').addClass('is-invalid');
                        $('.invalid-email').addClass('invalid-feedback');
                        $('.invalid-email').removeClass('hidden');
                        $('.invalid-email').text(data.errors.email);
                    } 
                } else {
                    toastr.success('Tambah Data Berhasil!', 'Success', {timeOut: 5000});
                    var data_penjual = '<tr class="item'+data.id+'">'
	                    			   +'<td class="col">'+data.id+'</td>'
	                    			   +'<td>'+data.ktp+'</td>'
                                       +'<td>'+data.nama+'</td>'
                                       +'<td>'+data.email+'</td>'
	                    			   +'<td>'
	                    			   	+'<div class="btn-group" role="group">'
	                    			   		+'<button class="btn btn-outline-dark edit-modal" data-id="'+data.id+'" data-ktp="'+data.ktp+'">Ubah</button>'
	                    			   		+'<button class="btn btn-outline-dark delete-modal" data-id="'+data.id+'" data-ktp="'+data.ktp+'">Hapus</button>'
	                    			   	+'</div>'
	                    			   +'</td'
                    			   +'</tr>';
                    $('#penjual').prepend(data_penjual);
        			window.location.reload();
                    $('.col').each(function (index) {
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
        $('#edit_ktp').val($(this).data('ktp'));
        $('#edit_nama').val($(this).data('nama'));
        $('#edit_alamat').val($(this).data('alamat'));
        $('#edit_tlp').val($(this).data('tlp'));
        $('#edit_email').val($(this).data('email'));
        id = $('#edit_id').val();
        $('#edit_data').modal('show');
    });
    $('.btn-group').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: 'penjual/update/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#edit_id").val(),
                'ktp': $('#edit_ktp').val(),
                'nama': $('#edit_nama').val(),
                'alamat': $('#edit_alamat').val(),
                'tlp': $('#edit_tlp').val(),
                'email': $('#edit_email').val()
            },
            success: function(data) {
                $('.invalid-ktp').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);


                    if (data.errors.ktp) {
                        $('.error_ktp').addClass('is-invalid');
                        $('.invalid-ktp').addClass('invalid-feedback');
                        $('.invalid-ktp').removeClass('hidden');
                        $('.invalid-ktp').text(data.errors.ktp);
                    } 

                    if (data.errors.nama) {
                        $('.error_nama').addClass('is-invalid');
                        $('.invalid-nama').addClass('invalid-feedback');
                        $('.invalid-nama').removeClass('hidden');
                        $('.invalid-nama').text(data.errors.nama);
                    } 

                    if (data.errors.alamat) {
                        $('.error_alamat').addClass('is-invalid');
                        $('.invalid-alamat').addClass('invalid-feedback');
                        $('.invalid-alamat').removeClass('hidden');
                        $('.invalid-alamat').text(data.errors.alamat);
                    } 

                    if (data.errors.tlp) {
                        $('.error_tlp').addClass('is-invalid');
                        $('.invalid-tlp').addClass('invalid-feedback');
                        $('.invalid-tlp').removeClass('hidden');
                        $('.invalid-tlp').text(data.errors.tlp);
                    } 

                    if (data.errors.email) {
                        $('.error_email').addClass('is-invalid');
                        $('.invalid-email').addClass('invalid-feedback');
                        $('.invalid-email').removeClass('hidden');
                        $('.invalid-email').text(data.errors.email);
                    }
                } else {
                    toastr.success('Edit Data Berhasil!', 'Success', {timeOut: 5000});
                    var data_penjual = '<tr class="item'+data.id+'">'
                                       +'<td class="col">'+data.id+'</td>'
                                       +'<td>'+data.ktp+'</td>'
                                       +'<td>'+data.nama+'</td>'
                                       +'<td>'+data.email+'</td>'
                                       +'<td>'
                                        +'<div class="btn-group" role="group">'
                                            +'<button class="btn btn-outline-dark edit-modal" data-id="'+data.id+'" data-ktp="'+data.ktp+'">Ubah</button>'
                                            +'<button class="btn btn-outline-dark delete-modal" data-id="'+data.id+'" data-ktp="'+data.ktp+'">Hapus</button>'
                                        +'</div>'
                                       +'</td'
                                   +'</tr>';
                    $('.item' + data.id).replaceWith(data_penjual);
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
        $('#del_ktp').val($(this).data('ktp'));
        $('#delete_data').modal('show');
        id = $('#del_id').val();
    });
    $('.btn-group').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'penjual/hapus/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                toastr.success('Penghapusan Data Berhasil!', 'Success Alert', {timeOut: 5000});
                window.location.reload();
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