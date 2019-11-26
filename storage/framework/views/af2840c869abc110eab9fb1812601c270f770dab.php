<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css">
<style type="text/css">
  .current-picture {
    display: block;
    width: 20%;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
        <li class="nav-item pull-right">
          <a class="nav-link text-uppercase active" href="<?php echo e(route('tanah-edit-doc', $data->id)); ?>">
            Kembali
          </a>
        </li>
    </ul>
    <div class="tab-content py-3">
    
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row">
      <div class="col-12">
        <div class="card-body">
          <?php if($data): ?>
          <div class="panel">
            <div class="panel-heading">
              <label class="btn">
                 <b><?php echo e($data->nama); ?></b>
              </label>
            </div>

            <div class="panel-body">
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <td>Berkas Foto</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                           <a data-fancybox="berkas" href="<?php echo e($image->image_path); ?>" alt="Berkas"><?php echo e($image->image_path); ?></a> 
                        </td>
                        <td>
                          <div class="dropdown show">
                            <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-gear"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="/tanah/edit/foto_berkas/<?php echo e($image->id); ?>">Ubah</a>
                              <a class="dropdown-item delete-modal" href="#"
                                  data-id="<?php echo e($image->id); ?>" 
                                    data-image_path="<?php echo e($image->image_path); ?>">
                                    Hapus
                              </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>

              <div class="col-md-12">
                <form action="<?php echo e(route('image-berkas-tanah', $data->id)); ?>" method="POST" 
                      class="dropzone"
                      id="my-awesome-dropzone-<?php echo e($data->id); ?>"
                      enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>      
                </form>
              </div>
              
            </div>
          </div>
          <?php else: ?>
          <div class="col-md-5 col-sm-offset-3">
            <div class="panel-body">
                <h6>Tidak ada berkas <b>:(</b></h6>
              </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
        <hr>
      </div>
      </div>
    </div>
    </div>
  
</div>
<?php echo $__env->make('pages.tanah.popup.delete-foto-berkas', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.js"></script>

<script type="text/javascript">
    // Hapus Data
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Form Hapus Foto Berkas');
        $('#del_id').val($(this).data('id'));
        $('#del_image_path').val($(this).data('image_path'));
        $('#delete_data').modal('show');
        id = $('#del_id').val();
    });
    $('.btn-group').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'berkashapus/' + id,
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
                window.location.reload();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>