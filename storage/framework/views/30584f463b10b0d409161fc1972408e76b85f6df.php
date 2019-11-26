 

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/chat.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
<h5 class=" text-right">Ruang Diskusi</h5>
<div class="messaging">
  <div class="inbox_msg">
  <div class="mesgs">
    <div class="msg_history" id="diskusi">
    <?php $__currentLoopData = $diskusi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e(csrf_field()); ?>

      <?php if($v->user_id == Auth::user()->id): ?>
      <div class="outgoing_msg">
        <div class="sent_msg">
        <p><?php echo e($v->text); ?></p>
        <div class="clearfix">
          <span class="time_date float-left"><?php echo e($v->user->nama); ?> | <?php echo e(Carbon\Carbon::parse($v->created_at)->format('Y-m-d')); ?></span> 
          <button class="time_date float-right mr-2 delete-modal" 
          data-id="<?php echo e($v->id); ?>"
          data-text="<?php echo e($v->text); ?>"> <i class="fa fa-times"></i> </button>
          <button class="time_date float-right mr-3 edit-modal "
          data-id="<?php echo e($v->id); ?>"
          data-text="<?php echo e($v->text); ?>"> <i class="fa fa-pencil"></i> </button>
        </div>
        </div>
      </div>
      <?php else: ?>
      <div class="incoming_msg">
        <div class="received_msg">
        <div class="received_withd_msg">
          <p><?php echo e($v->text); ?></p>
          <span class="time_date"><?php echo e($v->user->nama); ?>  | <?php echo e(Carbon\Carbon::parse($v->created_at)->format('Y-m-d')); ?></span></div>
        </div>
      </div>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="type_msg">
    <div class="input_msg_write">
      <form method="POST" action="<?php echo e(route('simpan-diskusi')); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
        <input type="text" name="text" class="write_msg" placeholder="Type a message" />
        <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
      </form>
    </div>
    </div>
  </div>
  </div>
</div>

</div>

<?php echo $__env->make('pages.ruangdiskusi.popup.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('pages.ruangdiskusi.popup.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(window).on('load', function(){
        $('#diskusi').removeAttr('style');
    })
</script>
<script type="text/javascript">
    // Edit Data
    $(document).on('click', '.edit-modal', function() {
        $('.modal-title').text('Edit Chatting');
        $('#edit_id').val($(this).data('id'));
        $('#edit_text').val($(this).data('text'));
        id = $('#edit_id').val();
        $('#edit_data').modal('show');
    });
    $('.btn-group').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: '/ruang/diskusi/update/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#edit_id").val(),
                'text': $('#edit_text').val()
            },
            success: function(data) {
                $('.invalid-text').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.text) {
                        $('.error_text').addClass('is-invalid');
                        $('.invalid-text').addClass('invalid-feedback');
                        $('.invalid-text').removeClass('hidden');
                        $('.invalid-text').text(data.errors.text);
                    } 
                } else {
                    toastr.success('Edit Data Berhasil!', 'Success', {timeOut: 5000});
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 5000);
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
        $('#delete_data').modal('show');
        id = $('#del_id').val();
    });
    $('.btn-group').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: '/ruang/diskusi/hapus/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                toastr.success('Penghapusan Data Berhasil!', 'Success Alert', {timeOut: 5000});
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 5000);
                $('#delete_data').modal('hide');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>