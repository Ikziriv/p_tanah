<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
      <li class="nav-item">
        <a class="nav-link text-uppercase active" href="<?php echo e(route('tanah-index')); ?>">
            Kembali
        </a>
      </li>
    </ul>
    <div class="tab-content py-3">
    
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <h2 class="text-muted lead text-center">
      	Ubah Data
      </h2>
      <div class="row">
      <div class="col-12">
		<div class="card-body">
			<form class="container" method="PUT" id="validasi-tanah" novalidate>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4" class="col-form-label">Nama Penjual<span class="text-danger">*</span></label>
                    <select class="form-control error_letak" name="desa_id" id="edit_desa_id">
                      <option disabled selected>- Pilihan -</option>
                      <?php $__currentLoopData = $penjual; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($d->id); ?>" 
                                    <?php if($data->penjual->id == $d->id): ?>
                                        selected
                                    <?php endif; ?>><?php echo e($d->ktp); ?> <?php echo e($d->nama); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4" class="col-form-label">Nama<span class="text-danger">*</span></label>
                  <input type="hidden" name="tgl_pembuatan" id="tgl_pembuatan" value="<?php echo e($data->tgl_pembuatan); ?>" required>
                  <input type="hidden" name="id" id="edit_id" value="<?php echo e($data->id); ?>">
                  <input type="text" class="form-control error_nama" value="<?php echo e($data->nama); ?>" name="nama" id="edit_nama" required>
                  <div class="invalid-nama">
                  </div>
                </div>
              </div>
			  <div class="form-row">
			    <div class="form-group col-md-3">
			      <label for="inputPassword4" class="col-form-label">SPPT</label>
			      <input type="text" class="form-control error_sppt" value="<?php echo e($data->sppt); ?>" name="sppt" id="edit_sppt" required>
			      <small id="emailHelp" class="form-text text-danger">Luas M2</small>
			    	<div class="invalid-sppt">
		        	</div>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputPassword4" class="col-form-label">GPS</label>
			      <input type="text" class="form-control error_gps" value="<?php echo e($data->gps); ?>" name="gps" id="edit_gps" required>
			      <small id="emailHelp" class="form-text text-danger">Luas M2</small>
			    	<div class="invalid-gps">
		        	</div>
			    </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress" class="col-form-label">Rp (Terbayar)</label>
                    <input type="text" class="form-control " name="" id="tambah_" disabled="true">
                    <div class="invalid-luas">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress2" class="col-form-label">Rp (Belum Terbayar)</label>
                    <input type="text" class="form-control " name="" id="tambah_" disabled="true">
                    <div class="invalid-desa_id">
                    </div>
                </div>
			  </div>
			  <div class="form-row">
				  <div class="form-group col-md-6">
				    <label for="inputAddress" class="col-form-label">Luas M2 (Terbayar)</label>
				    <input type="text" class="form-control error_luas_terbayar" value="<?php echo e($data->luas_terbayar); ?>" name="luas_terbayar" id="edit_luas_terbayar" required>
			    	<div class="invalid-luas">
		        	</div>
				  </div>
				  <div class="form-group col-md-6">
				    <label for="inputAddress2" class="col-form-label">Letak OP</label>
					<select class="form-control error_letak" name="desa_id" id="edit_desa_id">
                      <option disabled selected>- Pilihan -</option>
					  <?php $__currentLoopData = $desa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($d->id); ?>" 
                                    <?php if($data->desa->id == $d->id): ?>
                                        selected
                                    <?php endif; ?>><?php echo e($d->nama); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					</select>
			    	<div class="invalid-desa_id">
		        	</div>
				  </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity" class="col-form-label">Blok</label>
					<select class="form-control error_blok" name="blok_id" id="edit_blok_id">
                      <option disabled selected>- Pilihan -</option>
					  <?php $__currentLoopData = $blok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($b->id); ?>" 
                                    <?php if($data->blok->id == $b->id): ?>
                                        selected
                                    <?php endif; ?>><?php echo e($b->kode); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					</select>
			      	<small id="emailHelp" class="form-text text-danger">NOP</small>
			    	<div class="invalid-blok_id">
		        	</div>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputState" class="col-form-label">SPPT</label>
					<select class="form-control error_sppt_id" name="sppt_id" id="edit_sppt_id">
                      <option disabled selected>- Pilihan -</option>
					  <?php $__currentLoopData = $sppt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($s->id); ?>" 
                                    <?php if($data->kodesppt->id == $s->id): ?>
                                        selected
                                    <?php endif; ?>><?php echo e($s->kode); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					</select>
			      	<small id="emailHelp" class="form-text text-danger">SPPT</small>
			    	<div class="invalid-sppt_id">
		        	</div>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="inputCity" class="col-form-label">Nomer</label>
			      <input type="text" class="form-control error_nomer_sph" value="<?php echo e($data->nomer_sph); ?>" name="nomer_sph" id="edit_nomer_sph" required>
			      <small id="emailHelp" class="form-text text-danger">SPH</small>
			    	<div class="invalid-nomer_sph">
		        	</div>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputState" class="col-form-label">Tanggal</label>
			      <input type="date" class="form-control error_tgl_sph" value="<?php echo e($data->tgl_sph); ?>" name="tgl_sph" id="edit_tgl_sph" required>
			      <small id="emailHelp" class="form-text text-danger">SPH</small>
			    	<div class="invalid-tgl_sph">
		        	</div>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputZip" class="col-form-label">Status</label>
					<select class="form-control error_stat_id" name="stat_id" id="edit_stat_id">
                      <option disabled selected>- Pilihan -</option>
					  <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($s->id); ?>" 
                                    <?php if($data->status->id == $s->id): ?>
                                        selected
                                    <?php endif; ?>><?php echo e($s->nama); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					</select>
			    	<div class="invalid-stat_id">
		        	</div>
			    </div>
			  </div>
			  <hr>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity" class="col-form-label">Nomer</label>
			      <input type="text" class="form-control error_nomer_bpn" value="<?php echo e($data->nomer_bpn); ?>" name="nomer_bpn" id="edit_nomer_bpn" required>
			      <small id="emailHelp" class="form-text text-danger">BPN</small>
			    	<div class="invalid-nomer_bpn">
		        	</div>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputState" class="col-form-label">Tanggal</label>
			      <input type="date" class="form-control error_tgl_bpn" value="<?php echo e($data->tgl_bpn); ?>" name="tgl_bpn" id="edit_tgl_bpn" required>
			      <small id="emailHelp" class="form-text text-danger">BPN</small>
			    	<div class="invalid-tgl_bpn">
		        	</div>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-12">
			      <label for="inputCity" class="col-form-label">Catatan</label>
    				<textarea class="form-control error_notes" rows="3" id="edit_notes"><?php echo e($data->notes); ?></textarea>
			    	<div class="invalid-notes">
		        	</div>
			    </div>
			  </div>
              <div class="form-row">
                <?php echo e(csrf_field()); ?>

                <div class="form-group col-md-12">
    	  		  <div class="option">
    	  	        <button type="button" class="btn btn-outline-primary btn-sm btn-block edit">Ubah</button>
    	  		  </div>
                </div>
              </div>
              <hr>
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
    // Tambah Data
    var id = $('#edit_id').val();
    $('.option').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: '/tanah/tanahedit/' + id,
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                // 'id': id,
                'penjual_id': $('#edit_penjual_id').val(),
                'nama': $('#edit_nama').val(),
                'sppt': $('#edit_sppt').val(),
                'gps': $('#edit_gps').val(),
                'luas_terbayar': $('#edit_luas_terbayar').val(),
                'desa_id': $('#edit_desa_id').val(),
                'blok_id': $('#edit_blok_id').val(),
                'sppt_id': $('#edit_sppt_id').val(),
                'nomer_sph': $('#edit_nomer_sph').val(),
                'tgl_sph': $('#edit_tgl_sph').val(),
                'stat_id': $('#edit_stat_id').val(),
                'nomer_bpn': $('#edit_nomer_bpn').val(),
                'tgl_bpn': $('#edit_tgl_bpn').val(),
                'notes': $('#edit_notes').val(),
                'tgl_pembuatan': $('#tgl_pembuatan').val()
            },
            success: function(data) {
                $('.invalid-nama').addClass('hidden');
                // console.log(data);
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

                    if (data.errors.sppt) {
                        $('.error_sppt').addClass('is-invalid');
                        $('.invalid-sppt').addClass('invalid-feedback');
                        $('.invalid-sppt').removeClass('hidden');
                        $('.invalid-sppt').text(data.errors.sppt);
                    } 

                    if (data.errors.gps) {
                        $('.error_gps').addClass('is-invalid');
                        $('.invalid-gps').addClass('invalid-feedback');
                        $('.invalid-gps').removeClass('hidden');
                        $('.invalid-gps').text(data.errors.gps);
                    } 

                    if (data.errors.luas_terbayar) {
                        $('.error_luas_terbayar').addClass('is-invalid');
                        $('.invalid-luas_terbayar').addClass('invalid-feedback');
                        $('.invalid-luas_terbayar').removeClass('hidden');
                        $('.invalid-luas_terbayar').text(data.errors.luas_terbayar);
                    } 

                    if (data.errors.desa_id) {
                        $('.error_letak').addClass('is-invalid');
                        $('.invalid-desa_id').addClass('invalid-feedback');
                        $('.invalid-desa_id').removeClass('hidden');
                        $('.invalid-desa_id').text(data.errors.desa_id);
                    } 

                    if (data.errors.blok_id) {
                        $('.error_blok').addClass('is-invalid');
                        $('.invalid-blok_id').addClass('invalid-feedback');
                        $('.invalid-blok_id').removeClass('hidden');
                        $('.invalid-blok_id').text(data.errors.blok_id);
                    } 

                    if (data.errors.sppt_id) {
                        $('.error_sppt_id').addClass('is-invalid');
                        $('.invalid-sppt_id').addClass('invalid-feedback');
                        $('.invalid-sppt_id').removeClass('hidden');
                        $('.invalid-sppt_id').text(data.errors.sppt_id);
                    } 

                    if (data.errors.nomer_sph) {
                        $('.error_nomer_sph').addClass('is-invalid');
                        $('.invalid-nomer_sph').addClass('invalid-feedback');
                        $('.invalid-nomer_sph').removeClass('hidden');
                        $('.invalid-nomer_sph').text(data.errors.nomer_sph);
                    } 

                    if (data.errors.tgl_sph) {
                        $('.error_tgl_sph').addClass('is-invalid');
                        $('.invalid-tgl_sph').addClass('invalid-feedback');
                        $('.invalid-tgl_sph').removeClass('hidden');
                        $('.invalid-tgl_sph').text(data.errors.tgl_sph);
                    } 

                    if (data.errors.stat_id) {
                        $('.error_stat_id').addClass('is-invalid');
                        $('.invalid-stat_id').addClass('invalid-feedback');
                        $('.invalid-stat_id').removeClass('hidden');
                        $('.invalid-stat_id').text(data.errors.stat_id);
                    } 

                    if (data.errors.nomer_bpn) {
                        $('.error_nomer_bpn').addClass('is-invalid');
                        $('.invalid-nomer_bpn').addClass('invalid-feedback');
                        $('.invalid-nomer_bpn').removeClass('hidden');
                        $('.invalid-nomer_bpn').text(data.errors.nomer_bpn);
                    } 

                    if (data.errors.tgl_bpn) {
                        $('.error_tgl_bpn').addClass('is-invalid');
                        $('.invalid-tgl_bpn').addClass('invalid-feedback');
                        $('.invalid-tgl_bpn').removeClass('hidden');
                        $('.invalid-tgl_bpn').text(data.errors.tgl_bpn);
                    } 

                    if (data.errors.notes) {
                        $('.error_notes').addClass('is-invalid');
                        $('.invalid-notes').addClass('invalid-feedback');
                        $('.invalid-notes').removeClass('hidden');
                        $('.invalid-notes').text(data.errors.notes);
                    } 
                } else {
                    toastr.success('Ubah Data Berhasil!', 'Success', {timeOut: 5000});
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 5000);
                    // $('.col').each(function (index) {
                    //     $(this).html(index+1);
                    // });
                }
            },
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>