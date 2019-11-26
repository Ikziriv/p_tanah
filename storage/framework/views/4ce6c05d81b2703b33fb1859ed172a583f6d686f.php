 

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/timeline.css')); ?>">
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
                        Menu Master Berkas
                    </h2>
                    <a href="<?php echo e(route('master-berkas-create')); ?>" class="btn btn-dark btn-sm text-sm-center text-white float-right active">
                    Tambah
                    </a>
                </div>
            </div>
	      	<div class="card-body">
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="berkas" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
                      <td>Tanggal Ubah</td>
		            			<td>Kode</td>
                      <td>Nomor</td>
                      <td width="20%">Nama</td>
		            			<td>Action</td>
		            		</tr>
                    <?php echo e(csrf_field()); ?>

		            	</thead>
		            	<tbody>
		            		<?php $__currentLoopData = $berkas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		            		<tr class="item<?php echo e($b->id); ?>">
		            			<td class="col1"><?php echo e($key+1); ?></td>
                      <td><?php echo e(Carbon\Carbon::parse($b->tgl_ubah)->format('d-m-Y')); ?></td>
		            			<td><a href="<?php echo e(route('master-berkas-show', $b->id)); ?>"><?php echo e($b->kode); ?></a></td>
                      <td><?php echo e($b->nomor); ?></td>
                      <td><?php echo e($b->nama); ?></td>
                      <td>
                          <div class="btn-group" role="group">
                            <a href="<?php echo e(route('master-berkas-edit', $b->id)); ?>" class="btn btn-sm btn-outline-dark">
                              Ubah
                            </a>
                            <form id="delete-form-<?php echo e($b['id']); ?>" 
                                method="post" 
                                action="<?php echo e(route('hapus-master-berkas', $b['id'])); ?>"
                                style="display: none;">
                              <?php echo e(csrf_field()); ?>

                              <?php echo e(method_field('DELETE')); ?>

                            </form>
                            <a href="" class="btn btn-sm btn-outline-dark" onclick="
                              if(confirm('Are You Sure?')) {
                                event.preventDefault();
                                document.getElementById('delete-form-<?php echo e($b['id']); ?>').submit();
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


      <div class="col-12">
          <div class="card border-light mb-3">
            <div class="card-body">
              <h6>History Berkas</h6>
              <ul class="timeline">
                <?php $__currentLoopData = $h_berkas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <a target="_blank" href="https://www.totoprayogo.com/#"><?php echo e($v->nomor_berkas); ?></a>
                  <a href="#" class="float-right"><?php echo e(Carbon\Carbon::parse($v->created_at)->format('d-m-Y')); ?></a>
                  <p><?php echo e($v->user->nama); ?> : <?php echo e($v->deskripsi); ?> <br>
                     <small class="text-danger"><?php echo e(ucfirst($v->user->role)); ?></small></p>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <div class="row">
                  <div class="col-12">
                      <a href="<?php echo e(route('ruang-diskusi-index')); ?>" class="btn btn-sm btn-primary btn-block"> Ruang Diskusi</a>
                  </div>
              </div>
            </div>
          </div>
      </div>
      	
      </div>
      </div>
    </div>
	  
    
    <?php echo $__env->make('pages.masterberkas.popup.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#berkas').DataTable();
} );
</script>
<script>
    $(window).on('load', function(){
        $('#berkas').removeAttr('style');
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>