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
                        Menu Harga
                    </h2>
                    <a href="<?php echo e(route('harga-create')); ?>" class="btn btn-dark btn-sm text-sm-center text-white float-right active">
                    Tambah
                    </a>
                </div>
            </div>
	      	<div class="card-body">
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="harga" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
                                <td>Status</td>
		            			<td>Harga</td>
                                <td width="70%">Keterangan</td>
		            			<td>Option</td>
		            		</tr>
                            <?php echo e(csrf_field()); ?>

		            	</thead>
		            	<tbody>
		            		<?php $__currentLoopData = $harga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		            		<tr class="item<?php echo e($h->id); ?>">
		            			<td class="col1"><?php echo e($key+1); ?></td>
                                <td>
                                <?php if($h->status == 1): ?>
                                <span class="badge badge-success">
                                Aktif</span>
                                <?php else: ?>
                                <span class="badge badge-danger">
                                Non Aktif</span>
                                <?php endif; ?>
                                </td>
		            			<td><?php echo e($h->harga); ?></td>
                                <td><?php echo e($h->keterangan); ?></td>
		            			<td>
		            				<div class="btn-group" role="group">
                                    <a href="<?php echo e(route('harga-edit', $h->id)); ?>" class="btn btn-sm btn-outline-dark edit-modal">
                                    	Ubah
                                    </a>
                                    <form id="delete-form-<?php echo e($h['id']); ?>" 
                                        method="post" 
                                        action="<?php echo e(route('hapus-harga', $h['id'])); ?>"
                                        style="display: none;">
                                      <?php echo e(csrf_field()); ?>

                                      <?php echo e(method_field('DELETE')); ?>

                                    </form>
                                    <a href="" class="btn btn-sm btn-outline-dark" onclick="
                                      if(confirm('Are You Sure?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-<?php echo e($h['id']); ?>').submit();
                                      } else {
                                        event.preventDefault();
                                      }
                                    ">
                                      Hapus
                                    </a>
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
	
	
	<?php echo $__env->make('pages.harga.popup.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#harga').DataTable();
} );
</script>
<script>
    $(window).on('load', function(){
        $('#harga').removeAttr('style');
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>